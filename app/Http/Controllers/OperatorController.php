<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Validator;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = User::where('role_id', 6)->get();
        return view('operator', ['operators'=>$operators]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CreateOperator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // $rules = [];
        // foreach($request->input('user_id') as $key => $value) {
        //     $rules["user_id.{$key}"] = 'required';
        // }
        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->passes()) {
        //     foreach($request->input('user_id') as $key => $value) {
        //         Operator::create(['campaign_id'=>$request->campaign_id,'user_id'=>$value]);
        //     }
        //     return redirect('campaign');
        // }
        // return response()->json(['error'=>$validator->errors()->all()]);
        DB::table('operators')->insert([
            'campaign_id'     => $id,
            'user_id'         => $request->operator_id,
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
