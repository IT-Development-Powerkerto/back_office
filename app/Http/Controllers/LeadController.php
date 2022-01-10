<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->select('l.id as id', 'advertiser', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.name as client_name', 'c.whatsapp as client_wa', 'c.created_at as client_created_at', 'c.updated_at as client_updated_at', 'cp.cs_to_customer as cs_to_customer')
            ->where('l.id', $id);
        // return view('EditingLT', compact('lead'));
        return view('EditingLT')->with('lead', $lead);
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
        // dd($request);
        $total_price = $request->price * $request->quantity;
        DB::table('leads')->where('id', $lead)->update([
            'quantity'        => $request->quantity,
            'price'           => $request->price,
            'total_price'     => $total_price,
            'status_id'       => $request->status_id,
            'updated_at'      => Carbon::now()->toDateTimeString(),
        ]);

        DB::table('clients')->where('id', $lead)->update([
            'name'         => $request->name,
            'whatsapp'     => $request->whatsapp,
            'updated_at'   => Carbon::now()->toDateTimeString(),
        ]);

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
}
