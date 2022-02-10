<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Announcement;
use App\Models\Product;
use App\Models\Inputer;

class ReportingController extends Controller
{
    public function index(){
        $lead = Lead::all();
        $announcement = Announcement::all();
        $inputer = Inputer::where('admin_id', auth()->user()->admin_id)->get();
        $product = Product::where('admin_id', auth()->user()->admin_id)->get();

        if(auth()->user()->role_id==1){
            return view('reporting.AdminReporting')->with('leads', $lead)->with('announcements', $announcement)
            ->with('inputer', $inputer)->with('product', $product);
        }elseif (auth()->user()->role_id==12){
            return view('reporting.Reporting')->with('leads', $lead)->with('announcements', $announcement);
        }
    }
}
