<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Lead;

class ClosingRateController extends Controller
{
    public function closing_rate($user_id){
        $day = Carbon::now()->format('Y-m-d');
        $month = Carbon::now()->format('Y-m');

        
        // $month_in_table = DB::table('leads')->value('created_at');
        $m = Carbon::parse(DB::table('leads as l')->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user_id)->value('l.created_at'))->format('Y-m');
        $day_lead = DB::table('leads as l')->join('operators as o', 'o.id', '=', 'l.operator_id')->where('l.created_at', $day)->where('o.user_id', $user_id)->count();
        $day_closing = DB::table('leads as l')->join('operators as o', 'o.id', '=', 'l.operator_id')->where('l.created_at', $day)->where('l.status_id', 5)->where('o.user_id', $user_id)->count();

        if($m == $month){
            $month_lead = DB::table('leads as l')->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user_id)->count();
            $month_closing = DB::table('leads as l')->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user_id)->where('l.status_id', 5)->count();
        }
        DB::table('closing_rates')->where('id', $user_id)->insert([
            'user_id'            => $user_id,
            'day_closing_rate'   => $day_closing / $day_lead,
            'month_closing_rate' => $month_closing / $month_lead,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        // $day_closing_rate = $day_closing/$day_lead;
        // return $day_closing;
    }
}
