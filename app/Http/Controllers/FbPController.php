<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Client;
use App\Models\Lead;
use App\Models\User;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
                $lead = new Lead();
                $adv_id = DB::table('campaigns')->where('id', $campaign_id)->value('user_id');
                $adv_name = DB::table('users')->where('id', $adv_id)->value('name');
                $product_price = DB::table('products')->where('id', $product_id)->value('price');
                $clients->campaign_id = $campaign_id;
                $clients->product_id = $product_id;
                $clients->name = $request->name;
                $clients->whatsapp = $request->whatsapp;
                $clients->status_id = 3;
                $clients->save();

                $lead->advertiser = $adv_name;
                $lead->product_id = $product_id;
                $lead->price = $product_price;
                $lead->status_id = 3;
                $lead->save();
                DB::table('products')->whereid($product_id)->increment('lead');
                // return response()->json([
                //     "message" => "order record created"
                //     ], 201);
                return redirect('http://anakgemukcerdas.com/');
            }
    }

    public function lead_wa($campaign_id, $product_id){
        $text = Campaign::where('id', $campaign_id)->value('auto_text');
        $clients = new Client();
        $clients->campaign_id = $campaign_id;
        $clients->product_id = $product_id;
        $clients->status_id = 3;
        $clients->save();
        
        $lead = new Lead();
        $adv_id = DB::table('campaigns')->where('id', $campaign_id)->value('user_id');
        $adv_name = DB::table('users')->where('id', $adv_id)->value('name');
        $product_price = DB::table('products')->where('id', $product_id)->value('price');
        $lead->advertiser = $adv_name;
        $lead->product_id = $product_id;
        $lead->price = $product_price;
        $lead->status_id = 3;
        $lead->save();
        DB::table('products')->whereid($product_id)->increment('lead');

        // $phone = DB::table('users')
        //     ->join
        return redirect('https://api.whatsapp.com/send/?phone=18336361122&text='.$text);
    }
}
