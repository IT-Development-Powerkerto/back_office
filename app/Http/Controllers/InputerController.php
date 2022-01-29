<?php

namespace App\Http\Controllers;

use App\Exports\InputersExport;
use App\Models\Campaign;
use App\Models\CsInputer;
use Illuminate\Http\Request;
use App\Models\Inputer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->role_id == 10){
            if($request->date_filter){
                $day = Carbon::parse($request->date_filter)->format('Y-m-d');
            } else {
                $day = Carbon::now()->format('Y-m-d');
            }
            $inputers = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('updated_at', $day)->get();
            $operator = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 5)->get();
            $cs = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 5)->get();
            $cs_inputers = DB::table('cs_inputers as i')->join('users as u', 'u.id', '=', 'i.cs_id')->where('i.inputer_id', Auth::user()->id)->where('i.deleted_at', null)->select('i.id as id', 'u.name as name', 'u.email as email', 'u.phone as phone')->get();
            return view('inputer.Inputer', compact(['inputers', 'cs', 'cs_inputers']))->with('operators', $operator);
        }else if(Auth::user()->role_id == 1){
            if($request->date_filter){
                $day = Carbon::parse($request->date_filter)->format('Y-m-d');
            } else {
                $day = Carbon::now()->format('Y-m-d');
            }
            $inputers = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('updated_at', $day)->get();
            $cs = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 5)->get();
            $cs_inputers = DB::table('cs_inputers as i')->join('users as u', 'u.id', '=', 'i.cs_id')->where('i.inputer_id', Auth::user()->id)->where('i.deleted_at', null)->select('i.id as id', 'u.name as name', 'u.email as email', 'u.phone as phone')->get();
            // dd($cs_inputers);
            return view('inputer.Dashboard', compact(['inputers', 'cs', 'cs_inputers']));
        }else{
            return redirect()->back();
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function view($id)
    {
        $inputers = Inputer::findOrFail($id);
        $province_id = $inputers->value('province_id');
        
        if(isset($province_id)){
            $city_id = $inputers->value('city_id');
            $subdistrict_id = $inputers->value('subdistrict_id');
            $province = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/province?id='.$province_id);
            $province = $province['rajaongkir']['results']['province'];
            $city = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/city?id='.$city_id.'&province='.$province_id);
            $city = $city['rajaongkir']['results']['city_name'];
            $subdistrict = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/subdistrict?id='.$subdistrict_id.'&city='.$city_id);
            $subdistrict = $subdistrict['rajaongkir']['results']['subdistrict_name'];
            return view('inputer.viewdata', compact(['inputers', 'province', 'city', 'subdistrict']));
        }
        else{
            return view('inputer.viewdata', compact(['inputers']));
        }
    }
    public function export(Request $request)
    {
        $from_date=$request->from_date;
        $to_date = $request->to_date;
        // dd($from_date);
        return Excel::download(new InputersExport($from_date,$to_date), 'inputer.xlsx', 'Xlsx');
    }
    public function addCS(Request $request){
        $CsExists = CsInputer::where('admin_id', auth()->user()->admin_id)->where('inputer_id', auth()->user()->id)->where('cs_id', $request->cs_id)->exists();
        // dd($CsExists);
        if($CsExists){
            return back()->with('error','Error!, Customer Service already exists');
        }
        CsInputer::create([
            'admin_id' => Auth::user()->admin_id,
            'inputer_id' => Auth::user()->id,
            'cs_id' => $request->cs_id
        ]);
        return back()->with('success','Successull! Customer Service Added');
    }
    public function CS_destroy($id){
        $cs_inputer = CsInputer::find($id);
        $cs_inputer->delete();
        return back()->with('success','Successull! Customer Service Deleted');
    }
}
