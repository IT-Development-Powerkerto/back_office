<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\EventPixel;
use App\Models\EventWa;
use App\Models\Operator;
use App\Models\Product;
use App\Models\User;
use App\Models\Lead;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::all();
        $events = EventPixel::all();
        $eventWa = EventWa::all();
        $product = Product::all();
        return view('campaign', ['eventWa'=>$eventWa])->with('campaigns', $campaigns)->with('products', $product)->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = EventPixel::all();
        $product = Product::all();
        return view ('CreateCampaign',['event'=>$events])->with('products', $product);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campaign_id = DB::table('campaigns')->insertGetId([
            'user_id'         => Auth()->user()->id,
            'title'          => $request->title,
            'product_id'      => $request->product_id,
            'message'         => $request->tp,
            'facebook_pixel'  => $request->fbp,
            'event_pixel_id'  => $request->event_id,
            'event_wa_id'     => $request->event_wa,
            'auto_text'       => $request->auto_text,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        // $campaign_id = $campaign->id;
        DB::table('distribution_counters')->insert([
            'campaign_id' => $campaign_id,
            'counter' => 0
        ]);
        return redirect('/campaign')->with('success','Successfull! Campaign Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($campaign)
    {
        $campaigns = Campaign::find($campaign);
        $product = Product::all();
        return view('campaign',compact($campaigns))->with('products', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaigns = Campaign::findOrFail($id);
        $event = EventPixel::all();
        $eventWa = EventWa::all();
        $product = Product::all();
        return view('EditingCampaign',['campaign' => $campaigns])->with('event', $event)->with('products', $product)->with('eventWa', $eventWa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $campaign)
    {
        DB::table('campaigns')->where('id', $campaign)->update([
            'user_id'           => Auth()->user()->id,
            'title'            => $request->title,
            'product_id'        => $request->product_id,
            'message'           => $request->tp,
            'facebook_pixel'    => $request->fbp,
            'event_pixel_id'    => $request->event_id,
            'event_wa_id'       => $request->event_wa,
            'auto_text'         => $request->auto_text,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/campaign')->with('success','Successull! Campaign Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //DB::delete('delete from users where id = ?', [$campaign]);
        $campaign->delete();
        return redirect('/campaign')->with('success','Successull! Campaign Deleted');
    }

    public function addOperator($id)
    {
        $campaigns = Campaign::findOrFail($id);
        // untuk menampilkan daftar CS di dropdown saat menambah operator
        $operators = User::where('role_id', 5)->get();
        // untuk menampilkan operator berdasarkan campaign
        $operatorCampaigns = Operator::where('campaign_id', $id)->get();
        $lead = Lead::all();
        return view('addOperator', ['campaigns'=>$campaigns])->with('operators', $operators)->with('operatorCampaigns', $operatorCampaigns)->with('lead', $lead);
    }
}
