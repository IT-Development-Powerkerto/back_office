<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campign;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('campaign');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('CreateCampaign');

    }

    public function addMorePost(Request $request)
    {
        $rules = [];


        foreach($request->input('operator') as $key => $value) {
            $rules["operator.{$key}"] = 'required';
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator) {


            foreach($request->input('operator') as $key => $value) {
                Campign::create(['operator'=>$value]);
            }


            return response()->json(['success'=>'done']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
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

        // DB::table('campigns')->insert([
        //     'tittle'     => $request->tittle,
        //     'operator'  => $request->operator,
        //     'message'   => $request->tp,
        //     'facebook_pixel'  => $request->fbp,
        //     'event_pixel_id' => 3,
        // ]);
        // return redirect('/campaign')->with('success','Successfull! Campaign Added');

        if($request->ajax())
        {
            $rules = array(
            'first_name.*'  => 'required',
            'last_name.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $first_name = $request->first_name;
            $last_name = $request->last_name;
            for($count = 0; $count < count($first_name); $count++)
            {
                $data = array(
                    'first_name' => $first_name[$count],
                    'last_name'  => $last_name[$count]
                );
                $insert_data[] = $data;
            }

            Campign::insert($insert_data);
            return response()->json([
            'success'  => 'Data Added successfully.'
            ]);
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
}
