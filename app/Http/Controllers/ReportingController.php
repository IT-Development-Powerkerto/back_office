<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Announcement;

class ReportingController extends Controller
{
    public function index(){
        $lead = Lead::all();
        $announcement = Announcement::all();
        if(auth()->user()->role_id==1){
            return view('reporting.AdminReporting')->with('leads', $lead)->with('announcements', $announcement);
        }elseif (auth()->user()->role_id==12){
            return view('reporting.Reporting')->with('leads', $lead)->with('announcements', $announcement);
        }
    }
}
