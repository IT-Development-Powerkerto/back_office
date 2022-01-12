<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Client;
use App\Models\Lead;
use App\Events\MessageCreated;
use Pusher\Pusher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class FbPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all()->toJson(JSON_PRETTY_PRINT);
        return response($clients, 200);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function lead(Request $request, $campaign_id, $product_id){
        $validateData = Validator::make($request->all(),[
            'name'             => 'required',
            'whatsapp'         => 'required',
        ]);
        if ($validateData->fails()) {
            return response($validateData->errors(), 400);
        }else{
            $clients = new Client();
            $clients->campaign_id = $campaign_id;
            $clients->name = $request->name;
            if(substr(trim($request->whatsapp), 0, 1)=='0'){
                $whatsapp = '62'.substr(trim($request->whatsapp), 1);
            } else{
                $whatsapp = $request->whatsapp;
            }
            $clients->whatsapp = $whatsapp;
            $clients->save();

            $adv_id = DB::table('campaigns')->where('id', $campaign_id)->value('user_id');
            $adv_name = DB::table('users')->where('id', $adv_id)->value('name');
            $product_price = DB::table('products')->where('id', $product_id)->value('price');


            // ambil text untuk dikirim ke WA
            $text = Campaign::where('id', $campaign_id)->value('customer_to_cs');
            // ambil nomer WA CS
            $wa = DB::table('operators')
                ->leftJoin('users', 'operators.user_id', '=', 'users.id')
                ->leftJoin('closing_rates as cr', 'cr.user_id', '=', 'users.id')
                ->where('campaign_id', $campaign_id)
                ->select('users.phone')
                ->orderByDesc('month_closing_rate')
                ->get();
            // menghitung jumlah operator tiap campaign
            $operator_count = DB::table('operators')
                ->leftJoin('users', 'operators.user_id', '=', 'users.id')
                ->where('campaign_id', $campaign_id)
                ->count();

            // menghitung jumlah click tombol WA
            $counter = DB::table('distribution_counters')->where('campaign_id', $campaign_id)->value('counter');
            // rotasi nomer WA
            if($counter == $operator_count-1){
                DB::table('distribution_counters')
                ->where('campaign_id', $campaign_id)
                ->update([
                    'campaign_id' => $campaign_id,
                    'counter' => 0
                ]);
            }else{
                DB::table('distribution_counters')->where('campaign_id', $campaign_id)->increment('counter');
            }
            $user_id = DB::table('users')->where('phone', $wa[$counter]->phone)->value('id');
            $operator_id = DB::table('operators')->where('campaign_id', $campaign_id)->where('user_id', $user_id)->value('id');
            $operator_name = DB::table('operators')->where('campaign_id', $campaign_id)->where('user_id', $user_id)->value('name');
            $product_name = DB::table('products')->where('id', $product_id)->value('name');
            $lead = new Lead();
            $lead->advertiser = $adv_name;
            $lead->operator_id = $operator_id;
            $lead->campaign_id = $campaign_id;
            $lead->client_id  = $clients->id;
            $lead->product_id = $product_id;
            $lead->user_id  = $user_id;
            $lead->price = $product_price;
            $lead->status_id = 3;
            $lead->save();

            DB::table('products')->whereid($product_id)->increment('lead');
            $data_lead = DB::table('leads')->get();

            $options = array(
                        'cluster' => env('PUSHER_APP_CLUSTER'),
                        'encrypted' => true
                    );
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
                );

            $data['message'] = $data_lead;
            $pusher->trigger('message-channel', 'App\\Events\\MessageCreated', $data);

            $message = Campaign::where('id', $campaign_id)->value('message');
            // return redirect('http://127.0.0.1:8080/'.$wa[$counter]->phone.'/'.str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($clients->name, $clients->whatsapp, $operator_name, $product_name), $text).'/'.$message);
            // return redirect('http://orderku.site/'.$wa[$counter]->phone.'/'.str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($clients->name, $clients->whatsapp, $operator_name, $product_name), $text).'/'.$message);
            // $url = 'orderku.site/'..'/'.'/'.$message;
            $wa_text = str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($clients->name, $clients->whatsapp, $operator_name, $product_name), $text);
            $wa_number = $wa[$counter]->phone;
            $FU_text = Campaign::where('id', $campaign_id)->value('cs_to_customer');

            $cs_email = DB::table('users')->where('phone', $wa[$counter]->phone)->value('email');
            return Redirect::route('send', [
                'email' => $cs_email,
                'number' => $wa_number,
                'text' => $wa_text,
                'thanks' => $message,
                'product' => $product_name,
                'client' => $clients->name,
                'client_number' => $clients->whatsapp,
                'FU_text' => $FU_text,
                'operator' => $operator_name
            ]);
        }
    }

    public function lead_wa($campaign_id, $product_id){
        $clients = new Client();
        $clients->campaign_id = $campaign_id;
        $clients->save();

        // ambil text untuk dikirim ke WA
        $text = Campaign::where('id', $campaign_id)->value('customer_to_cs');
        // ambil nomer WA CS
        $wa = DB::table('operators')
            ->leftJoin('users', 'operators.user_id', '=', 'users.id')
            ->leftJoin('closing_rates as cr', 'cr.user_id', '=', 'users.id')
            ->where('campaign_id', $campaign_id)
            ->where('users.status', 1)
            ->select('users.phone')
            ->orderByDesc('month_closing_rate')
            ->get();

        $adv_id = DB::table('campaigns')->where('id', $campaign_id)->value('user_id');
        $adv_name = DB::table('users')->where('id', $adv_id)->value('name');
        $product_price = DB::table('products')->where('id', $product_id)->value('price');

        // menghitung jumlah operator tiap campaign
        $operator_count = DB::table('operators')
            ->leftJoin('users', 'operators.user_id', '=', 'users.id')
            ->where('campaign_id', $campaign_id)
            ->where('users.status', 1)
            ->count();

        // menghitung jumlah click tombol WA
        $counter = DB::table('distribution_counters')->where('campaign_id', $campaign_id)->value('counter');
        // rotasi nomer WA
        if($counter == $operator_count-1){
            DB::table('distribution_counters')
            ->where('campaign_id', $campaign_id)
            ->update([
                'campaign_id' => $campaign_id,
                'counter' => 0
            ]);
        }else{
            DB::table('distribution_counters')->where('campaign_id', $campaign_id)->increment('counter');
        }
        $user_id = DB::table('users')->where('phone', $wa[$counter]->phone)->where('status', 1)->value('id');
        $operator_id = DB::table('operators')->where('campaign_id', $campaign_id)->where('user_id', $user_id)->value('id');
        $operator_name = DB::table('operators')->where('campaign_id', $campaign_id)->where('user_id', $user_id)->value('name');
        $product_name = DB::table('products')->where('id', $product_id)->value('name');
        DB::table('leads')->insert([
            'advertiser' => $adv_name,
            'campaign_id' => $campaign_id,
            'operator_id'   => $operator_id,
            'product_id' => $product_id,
            'client_id'    => $clients->id,
            'user_id'    => $user_id,
            'price'      => $product_price,
            'status_id'  => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->whereid($product_id)->increment('lead');
        $data_lead = DB::table('leads')->get();

        $options = array(
                    'cluster' => env('PUSHER_APP_CLUSTER'),
                    'encrypted' => true
                );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
            );

        $data['message'] = $data_lead;
        $pusher->trigger('message-channel', 'App\\Events\\MessageCreated', $data);

        // return redirect('https://api.whatsapp.com/send/?phone='.$wa[$counter]->phone.'&text='.$text);
        return redirect('https://api.whatsapp.com/send/?phone='.$wa[$counter]->phone.'&text='.'Kode Order: ord-'.$clients->id.'%0A'.str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($clients->name, $clients->whatsapp, $operator_name, $product_name), $text));
    }
}
