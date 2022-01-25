<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use App\Models\Budgeting;
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
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 4){
            $day = Carbon::now()->format('Y-m-d');
            $day_output = Carbon::now()->format('Y-M-d');
            $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->where('updated_at', $day)->get();
            $lead1 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(4),
                Carbon::now()->endOfMonth()->subWeek(3),
            ])->get();
            $lead2 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(3),
                Carbon::now()->endOfMonth()->subWeek(2),
            ])->get();
            $lead3 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(2),
                Carbon::now()->endOfMonth()->subWeek(1),
            ])->get();
            $lead4 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subweek(1),
                Carbon::now()->endOfMonth(),
            ])->get();
            $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->get();
            $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->get();
            $month = Carbon::now()->format('M');
            $adv = User::where('admin_id', auth()->user()->id)->where('role_id', 4)->get();
            $budgeting = Budgeting::where('admin_id', auth()->user()->admin_id)->get();
            return view('budgeting.BudgetingADV')
            ->with('lead_day', $lead_day)
            ->with('day_output', $day_output)
            ->with('lead_week', $lead_week)
            ->with('lead_month', $lead_month)
            ->with('lead1', $lead1)
            ->with('lead2', $lead2)
            ->with('lead3', $lead3)
            ->with('lead4', $lead4)
            ->with('month', $month)
            ->with('adv', $adv)
            ->with('budgeting', $budgeting);
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
        // dd($request->all());
        DB::table('budgetings')->insert([
            'admin_id'     => auth()->user()->admin_id,
            'user_id'      => auth()->user()->id,
            'user_name'    => auth()->user()->name,
            'role_id'      => auth()->user()->role_id,
            'reason'       => 'Biaya Iklan',
            'requirement'  => $request->requirement,
            'target'       => $request->target,
            'status'       => 2,
            'created_at'   => Carbon::now()->format('Y-m-d'),
            'updated_at'   => Carbon::now()->format('Y-m-d'),
        ]);

        return redirect('/dashboard')->with('success','Successull! Budgeting Added');
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

    public function BudgetingReq()
    {
        return view('budgeting.BudgetingReq');
    }

    public function BudgetingRel()
    {
        return view('budgeting.BudgetingRel');
    }
}
