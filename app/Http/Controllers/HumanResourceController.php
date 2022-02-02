<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class HumanResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $role = Role::all();
        if(auth()->user()->role_id==11){
            return view('hr.hrDept')->with('role', $role)->with('user', $users);
        }elseif (auth()->user()->role_id==1){
            return view('hr.Dashboard')->with('role', $role)->with('user', $users);
        }
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

    public function DailyCheckin()
    {
        $users = User::all();
        if(auth()->user()->role_id==11){
            return view('hr.DailyCheck-in')->with('user', $users);
        }elseif (auth()->user()->role_id==1){
            return view('hr.AdminDailyCheck-in')->with('user', $users);
        }
    }

    public function LeaveApplication()
    {
        $users = User::all();
        if(auth()->user()->role_id==11){
            return view('hr.LeaveApplication')->with('user', $users);
        }elseif (auth()->user()->role_id==1){
            return view('hr.AdminLeaveApplication')->with('user', $users);
        }
    }

    public function Customize()
    {
        $users = User::all();
        if(auth()->user()->role_id==11){
            return view('hr.Customize')->with('user', $users);
        }elseif (auth()->user()->role_id==1){
            return view('hr.AdminCustomize')->with('user', $users);
        }
    }

    
}