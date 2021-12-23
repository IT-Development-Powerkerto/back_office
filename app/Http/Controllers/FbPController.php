<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(),[
        'campaign_id'      => 'required',
        'name'             => 'required',
        'whatsapp'         => 'required',
        //     'total'               => 'required',
        'status_id'              => 'required',
        ]);
        if ($validateData->fails()) {
            return response($validateData->errors(), 400);
        }else{
            $clients = new Client();
            $clients->campaign_id = $request->campaign_id;
            $clients->name = $request->name;
            $clients->whatsapp = $request->whatsapp;
        //     $order->total = $request->total;
            $clients->status_id = 3;
            $clients->save();
            return response()->json([
                "message" => "order record created"
                ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if($orders = Order::find($id)){
        //     return response($orders, 200);
        // }
        // else{

        //     return response()->json([
        //         "message" => "order not found"
        //         ], 404);
        // }
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
        // if(Order::where('id',$id)->exists()){
        //     $validateData = Validator::make($request->all(),[
        //         'partner'             => 'required',
        //         'date'                => 'required',
        //         'total'               => 'required',
        //         'status'              => 'required',
        //     ]);
        //     if ($validateData->fails()) {
        //         return response($validateData->errors(), 400);
        //     }else{
        //     $order = Order::find($id);
        //     $order->partner = $request->partner;
        //     $order->date = $request->date;
        //     $order->total = $request->total;
        //     $order->status = $request->status;
        //     $order->save();
        //     return response()->json([
        //         "message" => "order record updated"
        //         ], 201);
        //     }
        // } else{
        //     return response()->json([
        //         "message" => "order not found"
        //         ], 404);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (Order::where('id', $id)->exists()) {
        //     $order = Order::find($id);
        //     $order->delete();
        //     return response()->json([
        //     "message" => "order record deleted"
        //     ], 201);
        //     } else {
        //         return response()->json([
        //         "message" => "order not found"
        //         ], 404);
        //     }
    }
}
