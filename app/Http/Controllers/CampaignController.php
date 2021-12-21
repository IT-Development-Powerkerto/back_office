<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campign;
use App\Models\EventPixel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        $campaigns = Campign::all();
        $events = EventPixel::all();
        return view('campaign', ['event'=>$events])->with('campaigns', $campaigns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = EventPixel::all();
        return view ('CreateCampaign',['event'=>$events]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // for ($i = 1; $i < count($request->operator); $i++) {
        //     $operators[] = [
        //         'operator' => $request->operator[$i],
        //     ];
        // }

        DB::table('campigns')->insert([
            'user_id'         => Auth()->user()->id,
            'tittle'          => $request->tittle,
            'message'         => $request->tp,
            'facebook_pixel'  => $request->fbp,
            'event_pixel_id'  => $request->event_id,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect('/campaign')->with('success','Successfull! Campaign Added');
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
    public function update(Request $request, $campaign)
    {
        DB::table('campigns')->where('id', $campaign)->update([
            'user_id'           => Auth()->user()->id,
            'tittle'            => $request->tittle,
            'message'           => $request->tp,
            'facebook_pixel'    => $request->fbp,
            'event_pixel_id'    => $request->event_id,
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
    public function destroy(Campign $campaign)
    {
        //DB::delete('delete from users where id = ?', [$campaign]);
        $campaign->delete();
        return redirect('/campaign')->with('success','Successull! Campaign Deleted');
    }
}
