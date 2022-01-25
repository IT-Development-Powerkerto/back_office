<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Inputer;
use App\Models\Product;
use App\Models\User;
use App\Models\Budgeting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2){
            $day = Carbon::now()->format('Y-m-d');
            $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

            $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->count();
            $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->count();

            //count lead every month
            $lead_jan = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear()->subMonth(11),
            ])->count();
            $lead_feb = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(1),
                Carbon::now()->endOfYear()->subMonth(10),
            ])->count();
            $lead_mar = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(2),
                Carbon::now()->endOfYear()->subMonth(9),
            ])->count();
            $lead_apr = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(3),
                Carbon::now()->endOfYear()->subMonth(8),
            ])->count();
            $lead_may = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(4),
                Carbon::now()->endOfYear()->subMonth(7),
            ])->count();
            $lead_jun = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(5),
                Carbon::now()->endOfYear()->subMonth(6),
            ])->count();
            $lead_jul = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(6),
                Carbon::now()->endOfYear()->subMonth(5),
            ])->count();
            $lead_aug = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(7),
                Carbon::now()->endOfYear()->subMonth(4),
            ])->count();
            $lead_sep = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(8),
                Carbon::now()->endOfYear()->subMonth(3),
            ])->count();
            $lead_okt = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(9),
                Carbon::now()->endOfYear()->subMonth(2),
            ])->count();
            $lead_nov = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(10),
                Carbon::now()->endOfYear()->subMonth(1),
            ])->count();
            $lead_des = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfYear()->addMonth(11),
                Carbon::now()->endOfYear(),
            ])->count();

            //count lead closing every month
            $closing_jan = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear()->subMonth(11),
            ])->count();
            $closing_feb = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(1),
                Carbon::now()->endOfYear()->subMonth(10),
            ])->count();
            $closing_mar = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(2),
                Carbon::now()->endOfYear()->subMonth(9),
            ])->count();
            $closing_apr = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(3),
                Carbon::now()->endOfYear()->subMonth(8),
            ])->count();
            $closing_may = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(4),
                Carbon::now()->endOfYear()->subMonth(7),
            ])->count();
            $closing_jun = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(5),
                Carbon::now()->endOfYear()->subMonth(6),
            ])->count();
            $closing_jul = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(6),
                Carbon::now()->endOfYear()->subMonth(5),
            ])->count();
            $closing_aug = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(7),
                Carbon::now()->endOfYear()->subMonth(4),
            ])->count();
            $closing_sep = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(8),
                Carbon::now()->endOfYear()->subMonth(3),
            ])->count();
            $closing_okt = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(9),
                Carbon::now()->endOfYear()->subMonth(2),
            ])->count();
            $closing_nov = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(10),
                Carbon::now()->endOfYear()->subMonth(1),
            ])->count();
            $closing_des = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear()->addMonth(11),
                Carbon::now()->endOfYear(),
            ])->count();

            $quantity = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->value('quantity');

            $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day);
            $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->get();
            $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->get();
            $lead_all = Lead::where('admin_id', auth()->user()->admin_id)->get();
            $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->sum('total_price');
            $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->sum('total_price');
            $omset1 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(4),
                Carbon::now()->endOfMonth()->subWeek(3),
            ])->get();
            $omset2 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(3),
                Carbon::now()->endOfMonth()->subWeek(2),
            ])->get();
            $omset3 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(2),
                Carbon::now()->endOfMonth()->subWeek(1),
            ])->get();
            $omset4 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subweek(1),
                Carbon::now()->endOfMonth(),
            ])->get();
            $omset_permonth = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->get();
            $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->sum('total_price');
            $omset_all = Inputer::where('admin_id', auth()->user()->admin_id)->get();
            $products = Product::all();
            $adv = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
            $budgeting_adv = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
            $budgeting_nonadv = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', '!=', 4)->get();
            return view('ceo.CEO', compact(['lead_day', 'lead_week', 'lead_month', 'lead_all', 'products', 'omset_day', 'omset_week', 'omset_month', 'omset_all']))->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
            ->with('lead_jan', $lead_jan)->with('lead_feb', $lead_feb)->with('lead_mar', $lead_mar)->with('lead_apr', $lead_apr)->with('lead_may', $lead_may)->with('lead_jun', $lead_jun)
            ->with('lead_jul', $lead_jul)->with('lead_aug', $lead_aug)->with('lead_sep', $lead_sep)->with('lead_okt', $lead_okt)->with('lead_nov', $lead_nov)->with('lead_des', $lead_des)
            ->with('closing_jan', $closing_jan)->with('closing_feb', $closing_feb)->with('closing_mar', $closing_mar)->with('closing_apr', $closing_apr)->with('closing_may', $closing_may)->with('closing_jun', $closing_jun)
            ->with('closing_jul', $closing_jul)->with('closing_aug', $closing_aug)->with('closing_sep', $closing_sep)->with('closing_okt', $closing_okt)->with('closing_nov', $closing_nov)->with('closing_des', $closing_des)
            ->with('adv', $adv)->with('omset1', $omset1)->with('omset2', $omset2)->with('omset3', $omset3)->with('omset4', $omset4)->with('omset_permonth', $omset_permonth)->with('budgeting_adv', $budgeting_adv)->with('budgeting_nonadv', $budgeting_nonadv);
        }else{
            return redirect()->back();
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

    public function approve($id){
        DB::table('budgetings')->where('id', $id)->update([
            'status' => 1,
            'updated_at'   => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        return redirect('/ceo');
    }

    public function reject($id){
        DB::table('budgetings')->where('id', $id)->update([
            'status' => 0,
            'updated_at'   => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        return redirect('/ceo');
    }
}
