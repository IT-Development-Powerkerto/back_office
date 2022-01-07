<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Campaign;
use App\Models\Product;
use App\Models\User;
use App\Models\Lead;

class UpsellingController extends Controller
{
    public function upselling(Campaign $campaign, Product $product, User $user){
        // $month = Carbon::now()->format('Y-m');
        $quantity = Lead::where('campaign_id', $campaign->id)->where('product_id', $product->id)->where('operator_id',$user->operator->implode('id'))->sum('quantity');
        $month_closing = DB::table('leads as l')->where('l.campaign_id', $campaign->id)->where('l.product_id', $product->id)->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user->id)->where('l.status_id', 5)->count();
        $ups = $quantity/$month_closing;
        // $m = Carbon::parse(DB::table('leads as l')->where('l.campaign_id', $campaign->id)->where('l.product_id', $product->id)->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user->id)->value('l.created_at'))->format('Y-m');
        // if($m == $month){
        //     $upselling = Lead::where('campaign_id', $campaign->id)->where('product_id', $product->id)->where('operator_id',$user->operator->implode('id'))->sum('quantity');
        //     $max_omset = DB::table('leads as l')->where('l.campaign_id', $campaign->id)->where('l.product_id', $product->id)->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user->id)->where('l.status_id', 5);
        // }

        return ($ups-1)/10+0.01;
    }
}
