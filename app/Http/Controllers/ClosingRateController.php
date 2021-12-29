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

        $month_in_table = DB::table('leads')->value('created_at');
        $m = Carbon::parse(DB::table('leads')->where('operator', $user_id)->value('created_at'))->format('Y-m');
        $day_lead = Lead::where('created_at', $day)->where('operator', $user_id)->count();
        $day_closing = Lead::where('created_at', $day)->where('status_id', 5)->count();

        if($m == $month){
            $month_lead = Lead::where('operator', $user_id)->count();
            $month_closing = Lead::where('operator', $user_id)->where('status_id', 5)->count();
        }
        DB::table('closing_rates')->where('id', $user_id)->insert([
            'user_id'            => $user_id,
            'day_closing_rate'   => $day_closing / $day_lead,
            'month_closing_rate' => $month_closing / $month_lead,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
