<?php

namespace App\Http\Controllers;

use App\Exports\LeadsExport;
use App\Models\Client;
use App\Models\Lead;
use App\Models\Promotion;
use App\Models\Inputer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use File;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $lead = Lead::findOrFail($id);
        $lead = DB::table('leads as l')
            ->join('operators as o', 'l.operator_id', '=', 'o.id')
            ->join('products as p', 'l.product_id', '=', 'p.id' )
            ->join('statuses as s', 'l.status_id', '=', 's.id')
            ->join('clients as c', 'l.client_id', '=', 'c.id')
            ->join('campaigns as cp', 'l.campaign_id', '=', 'cp.id')
            ->select('l.id as id', 'advertiser', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.name as client_name', 'c.whatsapp as client_wa', 'c.created_at as client_created_at', 'c.updated_at as client_updated_at', 'cp.cs_to_customer as cs_to_customer', 's.name as status_name')
            ->where('l.id', $id)
            ->where('l.admin_id', auth()->user()->admin_id);
        $inputer = DB::table('inputers as i')
            ->join('leads as l', 'i.lead_id', '=', 'l.id')
            ->select('i.customer_address as address', 'i.payment_method as payment_method', 'i.warehouse as warehouse', 'i.courier as courier', 'i.payment_proof as image', 'i.product_weight as product_weight', 'i.product_promotion as product_promotion', 'i.shipping_promotion as shipping promotion', 'i.province_id as province', 'i.total_price as total_price', 'i.promotion_id as promotion_id', 'i.shipping_price as shipping_price', 'i.total_payment as total_payment', 'i.province_id as province_id', 'i.city_id as city_id', 'i.subdistrict_id as subdistrict_id')
            ->where('l.id', $id)
            ->where('l.admin_id', auth()->user()->admin_id);
        $promotion = Promotion::where('admin_id', auth()->user()->admin_id)->get();
        // return view('EditingLT', compact('lead'));
        $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/province');
        $response = json_decode($response, true);
        $all_province = $response['rajaongkir']['results'];
        $province_id = DB::table('inputers as i')
        ->join('leads as l', 'i.lead_id', '=', 'l.id')
        ->where('l.id', $id)
        ->where('l.admin_id', auth()->user()->admin_id)
        ->value('i.province_id');
        if(isset($province_id)){

            $all_city = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/city?&province='.$province_id);
            $all_city = json_decode($all_city, true);
            $all_city = $all_city['rajaongkir']['results'];
            $city_id = DB::table('inputers as i')
            ->join('leads as l', 'i.lead_id', '=', 'l.id')
            ->where('l.id', $id)
            ->where('l.admin_id', auth()->user()->admin_id)
            ->value('i.city_id');
            $all_subdistrict = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/subdistrict?city='.$city_id);
            $all_subdistrict = json_decode($all_subdistrict, true);
            $all_subdistrict = $all_subdistrict['rajaongkir']['results'];

            if(Auth::user()->role_id == 1){
                return view('EditingLT')->with('lead', $lead)->with('inputer', $inputer)->with('all_province', $all_province)->with('promotion', $promotion)->with('all_city', $all_city)->with('all_subdistrict', $all_subdistrict);
            }else if(Auth::user()->role_id == 4){
                return view('EditingLTADV')->with('lead', $lead)->with('inputer', $inputer)->with('all_province', $all_province)->with('promotion', $promotion)->with('all_city', $all_city)->with('all_subdistrict', $all_subdistrict);
            }else if(Auth::user()->role_id == 5){
                return view('EditingLTCS')->with('lead', $lead)->with('inputer', $inputer)->with('all_province', $all_province)->with('promotion', $promotion)->with('all_city', $all_city)->with('all_subdistrict', $all_subdistrict);
            }
        }else{
            if(Auth::user()->role_id == 1){
                return view('EditingLT')->with('lead', $lead)->with('inputer', $inputer)->with('all_province', $all_province)->with('promotion', $promotion);
            }else if(Auth::user()->role_id == 4){
                return view('EditingLTADV')->with('lead', $lead)->with('inputer', $inputer)->with('all_province', $all_province)->with('promotion', $promotion);
            }else if(Auth::user()->role_id == 5){
                return view('EditingLTCS')->with('lead', $lead)->with('inputer', $inputer)->with('all_province', $all_province)->with('promotion', $promotion);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lead)
    {
        // dd($request->all());
        //$total_price = ($request->price * $request->quantity) - $request->promotion_name;
        //$total_payment = $total_price + $request->shipping_price;

        DB::table('leads')->where('id', $lead)->where('admin_id', auth()->user()->admin_id)->update([
            'quantity'        => $request->quantity,
            'price'           => $request->price,
            'total_price'     => $request->total_price,
            'status_id'       => $request->status_id,
            'updated_at'      => Carbon::now()->toDateTimeString(),
        ]);
        if(substr(trim($request->whatsapp), 0, 1)=='0'){
            $whatsapp = '62'.substr(trim($request->whatsapp), 1);
        } else{
            $whatsapp = $request->whatsapp;
        }
        DB::table('clients')->where('id', $lead)->where('admin_id', auth()->user()->admin_id)->update([
            'name'         => $request->name,
            'whatsapp'     => $whatsapp,
            'updated_at'   => Carbon::now()->toDateTimeString(),
        ]);
        // dd($whatsapp);

        if($request->status_id == 5){
            $inputer = Inputer::where('lead_id', $lead)->exists();
            $lead = Lead::findOrFail($lead);
            if($inputer == true){
                $order_image = Inputer::where('lead_id', $lead->id)->get();
                if($request->hasFile('image')){
                    $extFile = $request->image->getClientOriginalExtension();
                    $namaFile = 'order-'.time().".".$extFile;
                    File::delete($order_image->implode('payment_proof'));
                    $path = $request->image->move('public/assets/img/order',$namaFile);
                    $image = $path;
                } else {
                    $image = null;
                }
                Inputer::where('lead_id', $lead->id)->update([
                    'admin_id'         => $lead->admin_id,
                    'lead_id'          => $lead->id,
                    'adv_name'         => $lead->advertiser,
                    'operator_name'    => $lead->user->name,
                    'customer_name'    => $request->name,
                    'customer_number'  => $whatsapp,
                    'customer_address' => $request->address,
                    'product_name'     => $lead->product->name,
                    'product_weight'   => $request->weight,
                    'product_price'    => $request->price,
                    'quantity'         => $request->quantity,
                    'promotion_id'        => $request->promotion_id,
                    'product_promotion'        => $request->product_promotion,
                    'shipping_promotion'        => $request->shipping_promotion,
                    'total_price'      => $request->total_price,
                    'warehouse'        => $request->warehouse,
                    'province_id'      => $request->province,
                    'city_id'          => $request->city,
                    'subdistrict_id'   => $request->subdistrict,
                    'courier'          => $request->courier,
                    'shipping_price'   => $request->shipping_price,
                    'payment_method'   => $request->payment_method,
                    'total_payment'    => $request->total_payment,
                    'payment_proof'    => $image,
                    // 'updated_at'       => Carbon::now()->format('Y-m-d'),
                ]);
            }
            else{
                if($request->hasFile('image')){
                    $extFile = $request->image->getClientOriginalExtension();
                    $namaFile = 'order-'.time().".".$extFile;
                    $path = $request->image->move('public/assets/img/order',$namaFile);
                    $image = $path;
                } else {
                    $image = null;
                }
                Inputer::create([
                    'admin_id'         => $lead->admin_id,
                    'lead_id'          => $lead->id,
                    'adv_name'         => $lead->advertiser,
                    'operator_name'    => $lead->user->name,
                    'customer_name'    => $request->name,
                    'customer_number'  => $whatsapp,
                    'customer_address' => $request->address,
                    'product_name'     => $lead->product->name,
                    'product_weight'   => $request->weight,
                    'product_price'    => $request->price,
                    'quantity'         => $request->quantity,
                    'promotion_id'     => $request->promotion_id,
                    'product_promotion'        => $request->product_promotion,
                    'shipping_promotion'        => $request->shipping_promotion,
                    'total_price'      => $request->total_price,
                    'warehouse'        => $request->warehouse,
                    'province_id'      => $request->province,
                    'city_id'          => $request->city,
                    'subdistrict_id'   => $request->subdistrict,
                    'courier'          => $request->courier,
                    'shipping_price'   => $request->shipping_price,
                    'payment_method'   => $request->payment_method,
                    'total_payment'    => $request->total_payment,
                    'payment_proof'    => $image,
                //     'created_at'       => Carbon::now()->format('Y-m-d'),
                //     'updated_at'       => Carbon::now()->format('Y-m-d'),
                ]);
            }
        }
        return redirect('/dashboard')->with('success','Successull! Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        // dd($lead);
        $lead->delete();
        $client = Client::whereid($lead->client_id);
        $client->delete();
        DB::table('products')->whereid($lead->product_id)->decrement('lead');
        return redirect('/dashboard')->with('success','Successull! Lead Deleted');
    }
    public function export(Request $request)
    {
        $from_date=$request->from_date;
        $to_date = $request->to_date;
        // dd($from_date);
        return Excel::download(new LeadsExport($from_date,$to_date), 'leads.xlsx', 'Xlsx');
    }
}
