<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Announcement;
use App\Models\Campaign;
use App\Models\Client;
use App\Models\CRM;
use App\Models\Role;
use App\Models\Icon;
use App\Models\Lead;
use App\Models\Operator;
use App\Models\Product;
use App\Models\Inputer;
use App\Models\Budgeting;
use App\Events\MessageCreated;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ReportingController extends Controller
{
    public function index(){
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();
        $user = User::where('admin_id', auth()->user()->admin_id)->get();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->where('created_at', $day)->count();

        //lead this day
        $lead_day_count = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->count();
        //count lead every day
        $lead_mo = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $lead_tu = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $lead_we = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $lead_th = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $lead_fr = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $lead_sa = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $lead_su = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();

        //count lead closing every month
        $closing_mo = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $closing_tu = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $closing_we = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $closing_th = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $closing_fr = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $closing_sa = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $closing_su = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();

        //omset this day
        $omset_day_count = Inputer::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->sum('product_promotion');
        //count omset every month
        $omset_mo = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $omset_tu = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $omset_we = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $omset_th = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $omset_fr = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $omset_sa = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $omset_su = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();

        //advertising cost this day
        $advertising_day_count = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->where('updated_at', $day)->sum('requirement');
        //count advertising cost every month
        $advertising_mo = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->sum('requirement');
        $advertising_tu = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->sum('requirement');
        $advertising_we = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->sum('requirement');
        $advertising_th = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->sum('requirement');
        $advertising_fr = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->sum('requirement');
        $advertising_sa = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->sum('requirement');
        $advertising_su = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');

        $quantity = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->where('created_at', $day)->sum('quantity');
        $lead = Lead::where('admin_id', auth()->user()->admin_id)->get();
        $announcement = Announcement::where('admin_id', auth()->user()->admin_id)->get();
        $inputer = Inputer::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->get();
        $product = Product::where('admin_id', auth()->user()->admin_id)->get();

        if(auth()->user()->role_id==1){
            return view('reporting.AdminReporting')->with('leads', $lead)->with('announcements', $announcement)
            ->with('product', $product)->with('day', $day)->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
            ->with('lead_su', $lead_su)->with('lead_mo', $lead_mo)->with('lead_tu', $lead_tu)->with('lead_we', $lead_we)->with('lead_th', $lead_th)->with('lead_fr', $lead_fr)->with('lead_sa', $lead_sa)
            ->with('closing_su', $closing_su)->with('closing_mo', $closing_mo)->with('closing_tu', $closing_tu)->with('closing_we', $closing_we)->with('closing_th', $closing_th)->with('closing_fr', $closing_fr)->with('closing_sa', $closing_sa)
            ->with('omset_su', $omset_su)->with('omset_mo', $omset_mo)->with('omset_tu', $omset_tu)->with('omset_we', $omset_we)->with('omset_th', $omset_th)->with('omset_fr', $omset_fr)->with('omset_sa', $omset_sa)
            ->with('advertising_su', $advertising_su)->with('advertising_mo', $advertising_mo)->with('advertising_tu', $advertising_tu)->with('advertising_we', $advertising_we)->with('advertising_th', $advertising_th)->with('advertising_fr', $advertising_fr)->with('advertising_sa', $advertising_sa)
            ->with('lead_day_count', $lead_day_count)->with('omset_day_count', $omset_day_count)->with('advertising_day_count', $advertising_day_count)->with('user', $user);
        }elseif (auth()->user()->role_id==12){
            return view('reporting.Reporting')->with('leads', $lead)->with('announcements', $announcement)
            ->with('product', $product)->with('day', $day)->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
            ->with('lead_su', $lead_su)->with('lead_mo', $lead_mo)->with('lead_tu', $lead_tu)->with('lead_we', $lead_we)->with('lead_th', $lead_th)->with('lead_fr', $lead_fr)->with('lead_sa', $lead_sa)
            ->with('closing_su', $closing_su)->with('closing_mo', $closing_mo)->with('closing_tu', $closing_tu)->with('closing_we', $closing_we)->with('closing_th', $closing_th)->with('closing_fr', $closing_fr)->with('closing_sa', $closing_sa)
            ->with('omset_su', $omset_su)->with('omset_mo', $omset_mo)->with('omset_tu', $omset_tu)->with('omset_we', $omset_we)->with('omset_th', $omset_th)->with('omset_fr', $omset_fr)->with('omset_sa', $omset_sa)
            ->with('advertising_su', $advertising_su)->with('advertising_mo', $advertising_mo)->with('advertising_tu', $advertising_tu)->with('advertising_we', $advertising_we)->with('advertising_th', $advertising_th)->with('advertising_fr', $advertising_fr)->with('advertising_sa', $advertising_sa)
            ->with('lead_day_count', $lead_day_count)->with('omset_day_count', $omset_day_count)->with('advertising_day_count', $advertising_day_count)->with('user', $user);
        }
    }

    public function weeklyReporting(){
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();

        //lead this week
        $lead_week_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();
        //count lead every week
        $lead_week1 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $lead_week2 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $lead_week3 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $lead_week4 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();
        $lead_week_max = max($lead_week1->count(), $lead_week2->count(), $lead_week3->count(), $lead_week4->count());

        //count lead closing every week
        $closing_week1 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $closing_week2 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $closing_week3 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $closing_week4 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();
        $closing_week_max = max($closing_week1->count(), $closing_week2->count(), $closing_week3->count(), $closing_week4->count());

        //omset this week
        $omset_week_count = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('product_promotion');
        //count omset every week
        $omset_week1 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $omset_week2 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $omset_week3 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $omset_week4 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();

        //advertising cost this week
        $advertising_week_count = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');
        //count advertising cost every week
        $advertising_week1 = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->sum('requirement');
        $advertising_week2 = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->sum('requirement');
        $advertising_week3 = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->sum('requirement');
        $advertising_week4 = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->sum('requirement');

        $quantity = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('quantity');

        $all_leads = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->get();
        $all_spam  = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 6)->where('created_at', $day)->get();

        $icons = Icon::all();
        $product = Product::where('admin_id', auth()->user()->admin_id)->get();

        $client = Client::where('admin_id', auth()->user()->admin_id)->get();
        $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
        $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
        $inputer = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get();
        $announcement = Announcement::where('admin_id', auth()->user()->admin_id)->get();
        $leads = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->get();

        if(auth()->user()->role_id==1){
            return view('reporting.AdminReportingWeekly')->with('announcements', $announcement)->with('leads', $leads)
            ->with('product', $product)->with('day', $day)->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
            ->with('lead_week1', $lead_week1)->with('lead_week2', $lead_week2)->with('lead_week3', $lead_week3)->with('lead_week4', $lead_week4)
            ->with('closing_week1', $closing_week1)->with('closing_week2', $closing_week2)->with('closing_week3', $closing_week3)->with('closing_week4', $closing_week4)
            ->with('omset_week1', $omset_week1)->with('omset_week2', $omset_week2)->with('omset_week3', $omset_week3)->with('omset_week4', $omset_week4)
            ->with('advertising_week1', $advertising_week1)->with('advertising_week2', $advertising_week2)->with('advertising_week3', $advertising_week3)->with('advertising_week4', $advertising_week4)
            ->with('lead_week_count', $lead_week_count)->with('omset_week_count', $omset_week_count)->with('advertising_week_count', $advertising_week_count)
            ->with('closing_week_max', $closing_week_max)->with('lead_week_max', $lead_week_max);
        }elseif (auth()->user()->role_id==12){
            return view('reporting.ReportingWeekly')->with('announcements', $announcement)->with('leads', $leads)
            ->with('product', $product)->with('day', $day)->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
            ->with('lead_week1', $lead_week1)->with('lead_week2', $lead_week2)->with('lead_week3', $lead_week3)->with('lead_week4', $lead_week4)
            ->with('closing_week1', $closing_week1)->with('closing_week2', $closing_week2)->with('closing_week3', $closing_week3)->with('closing_week4', $closing_week4)
            ->with('omset_week1', $omset_week1)->with('omset_week2', $omset_week2)->with('omset_week3', $omset_week3)->with('omset_week4', $omset_week4)
            ->with('advertising_week1', $advertising_week1)->with('advertising_week2', $advertising_week2)->with('advertising_week3', $advertising_week3)->with('advertising_week4', $advertising_week4)
            ->with('lead_week_count', $lead_week_count)->with('omset_week_count', $omset_week_count)->with('advertising_week_count', $advertising_week_count)
            ->with('closing_week_max', $closing_week_max)->with('lead_week_max', $lead_week_max);
        }
    }

    public function monthlyReporting(){
        $lead = Lead::all();
        $announcement = Announcement::all();
        $inputer = Inputer::where('admin_id', auth()->user()->admin_id)->get();
        $product = Product::where('admin_id', auth()->user()->admin_id)->get();

        if(auth()->user()->role_id==1){
            return view('reporting.AdminReportingMonthly')->with('leads', $lead)->with('announcements', $announcement)
            ->with('product', $product)->with('day', $day)->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
            ->with('lead_su', $lead_su)->with('lead_mo', $lead_mo)->with('lead_tu', $lead_tu)->with('lead_we', $lead_we)->with('lead_th', $lead_th)->with('lead_fr', $lead_fr)->with('lead_sa', $lead_sa)
            ->with('closing_su', $closing_su)->with('closing_mo', $closing_mo)->with('closing_tu', $closing_tu)->with('closing_we', $closing_we)->with('closing_th', $closing_th)->with('closing_fr', $closing_fr)->with('closing_sa', $closing_sa)
            ->with('omset_su', $omset_su)->with('omset_mo', $omset_mo)->with('omset_tu', $omset_tu)->with('omset_we', $omset_we)->with('omset_th', $omset_th)->with('omset_fr', $omset_fr)->with('omset_sa', $omset_sa)
            ->with('advertising_su', $advertising_su)->with('advertising_mo', $advertising_mo)->with('advertising_tu', $advertising_tu)->with('advertising_we', $advertising_we)->with('advertising_th', $advertising_th)->with('advertising_fr', $advertising_fr)->with('advertising_sa', $advertising_sa)
            ->with('lead_day_count', $lead_day_count)->with('omset_day_count', $omset_day_count)->with('advertising_day_count', $advertising_day_count);
        }elseif (auth()->user()->role_id==12){
            return view('reporting.ReportingMonthly')->with('leads', $lead)->with('announcements', $announcement)
            ->with('product', $product)->with('day', $day)->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
            ->with('lead_su', $lead_su)->with('lead_mo', $lead_mo)->with('lead_tu', $lead_tu)->with('lead_we', $lead_we)->with('lead_th', $lead_th)->with('lead_fr', $lead_fr)->with('lead_sa', $lead_sa)
            ->with('closing_su', $closing_su)->with('closing_mo', $closing_mo)->with('closing_tu', $closing_tu)->with('closing_we', $closing_we)->with('closing_th', $closing_th)->with('closing_fr', $closing_fr)->with('closing_sa', $closing_sa)
            ->with('omset_su', $omset_su)->with('omset_mo', $omset_mo)->with('omset_tu', $omset_tu)->with('omset_we', $omset_we)->with('omset_th', $omset_th)->with('omset_fr', $omset_fr)->with('omset_sa', $omset_sa)
            ->with('advertising_su', $advertising_su)->with('advertising_mo', $advertising_mo)->with('advertising_tu', $advertising_tu)->with('advertising_we', $advertising_we)->with('advertising_th', $advertising_th)->with('advertising_fr', $advertising_fr)->with('advertising_sa', $advertising_sa)
            ->with('lead_day_count', $lead_day_count)->with('omset_day_count', $omset_day_count)->with('advertising_day_count', $advertising_day_count);
        }
    }
}
