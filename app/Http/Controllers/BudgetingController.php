<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BudgetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 9){
            $lead1 = Lead::whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(4),
                Carbon::now()->endOfMonth()->subWeek(3),
            ])->get();
            $lead2 = Lead::whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(3),
                Carbon::now()->endOfMonth()->subWeek(2),
            ])->get();
            $lead3 = Lead::whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(2),
                Carbon::now()->endOfMonth()->subWeek(1),
            ])->get();
            $lead4 = Lead::whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subweek(1),
                Carbon::now()->endOfMonth(),
            ])->get();
            $lead_week = Lead::whereBetween('updated_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->get();
            $lead_month = Lead::whereBetween('updated_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->get();
            $month = Carbon::now()->format('M');
            $adv = User::where('admin_id', auth()->user()->id)->where('role_id', 4)->get();
            return view('budgeting.BudgetingADV')
            ->with('lead_week', $lead_week)
            ->with('lead_month', $lead_month)
            ->with('lead1', $lead1)
            ->with('lead2', $lead2)
            ->with('lead3', $lead3)
            ->with('lead4', $lead4)
            ->with('month', $month)
            ->with('adv', $adv);
        }else {
            return Redirect::back();
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

    public function ClosingCS()
    {
        return view('budgeting.Closing');
    }

    public function Finance()
    {
        return view('finance.FinanceDept');
    }
}
