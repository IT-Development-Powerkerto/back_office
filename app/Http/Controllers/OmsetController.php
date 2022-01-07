<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Lead;
use App\Models\Omset;
use App\Models\Campaign;
use App\Models\Product;
use App\Models\User;

class OmsetController extends Controller
{
    public function omset(Campaign $campaign, Product $product, User $user){
        $month = Carbon::now()->format('Y-m');
        $omset = Lead::where('campaign_id', $campaign->id)->where('product_id', $product->id)->where('operator_id',$user->operator->implode('id'))->sum('total_price');

        // $m = Carbon::parse(DB::table('leads as l')->where('l.campaign_id', $campaign->id)->where('l.product_id', $product->id)->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user->id)->value('l.created_at'))->format('Y-m');
        // if($m == $month){
        //     $omset = DB::table('leads as l')->where('l.campaign_id', $campaign->id)->where('l.product_id', $product->id)->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user->id);
        //     $max_omset = DB::table('leads as l')->where('l.campaign_id', $campaign->id)->where('l.product_id', $product->id)->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user->id)->where('l.status_id', 5);
        // }

        DB::table('omsets')->insert([
            'user_id'       => $user->id,
            'product_id'    => $product->id,
            'omset'         => $omset,
        ]);

        $max_omset = Omset::max('omset');

        DB::table('omsets')->where('user_id', $user->id)->insert([
            'user_id'       => $user->id,
            'product_id'    => $product->id,
            'omset'         => $omset,
            'omset_point'   => $omset / $max_omset ,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return response()->json($omset/$max_omset);
    }
}
