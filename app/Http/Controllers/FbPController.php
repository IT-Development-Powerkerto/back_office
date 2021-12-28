<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Client;
use App\Models\CRM;
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
        //
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
                $crm = new CRM();
                $adv_id = DB::table('campaigns')->where('id', $campaign_id)->value('user_id');
                $adv_name = DB::table('users')->where('id', $adv_id)->value('name');
                $product_price = DB::table('products')->where('id', $product_id)->value('price');
                $clients->campaign_id = $campaign_id;
                $clients->product_id = $product_id;
                $clients->name = $request->name;
                $clients->whatsapp = $request->whatsapp;
                $clients->status_id = 3;
                $clients->save();

                $crm->advertiser = $adv_name;
                $crm->product_id = $product_id;
                $crm->price = $product_price;
                $crm->status_id = 3;
                $crm->save();
                DB::table('products')->whereid($product_id)->increment('lead');
                return response()->json([
                    "message" => "order record created"
                    ], 201);
            }
    }
}
