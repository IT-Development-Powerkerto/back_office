<?php

namespace App\Http\Controllers;

use App\Models\Campign;
use App\Models\Client;
use Dotenv\Parser\Value;
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

    public function lead(Request $request, $campaign_id){
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
                $clients->whatsapp = $request->whatsapp;
                $clients->status_id = 3;
                $clients->save();
                return response()->json([
                    "message" => "order record created"
                    ], 201);
            }
    }
}
