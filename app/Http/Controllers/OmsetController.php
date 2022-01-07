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
use GrahamCampbell\ResultType\Result;

class OmsetController extends Controller
{
    public function omset(Campaign $campaign, Product $product, User $user){

        // $month = Carbon::now()->format('Y-m');
        // ambil bulan sebelumnya
        $month = date('n', strtotime('-1 month'));
        // jika bulan sebelumnya adalah bulan 12, tahun -1
        if($month == 12){
            $year = date('Y', strtotime('-1 year'));
        }else{
            $year = date('Y');
        }
        // get omset cs per product per month
        $omset = Lead::where('campaign_id', $campaign->id)->where('product_id', $product->id)
            ->where('operator_id',$user->operator->implode('id'))->where('status_id', 5)
            ->whereMonth('updated_at', $month)->whereYear('updated_at', $year)
            ->sum('total_price');
        // get max omset per product per month
        $max_omset = DB::table('omsets')->whereMonth('updated_at', $month)->whereYear('updated_at', $year)->max('omset');
        if(is_null($max_omset)){
            $max_omset = $omset;
        }else{
            $max_omset = $max_omset;
        }
        DB::table('omsets')->updateOrInsert([
            'user_id'       => $user->id,
            'product_id'    => $product->id,
            'omset'         => $omset,
            'created_at'  => date('Y-m-d', strtotime('- 1 month')),
            'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
        ]);

        DB::table('omsets')->where('user_id' , $user->id)->update([
            'omset_point'   => $omset / $max_omset ,
            'created_at'  => date('Y-m-d', strtotime('- 1 month')),
            'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
        ]);
        // return $omset;

        return response()->json($omset/$max_omset);

        // return date('Y-m-d', strtotime('- 1 month'));
    }
    public function all_omset(){

        // $month = Carbon::now()->format('Y-m');
        // ambil bulan sebelumnya
        $month = date('n', strtotime('-1 month'));
        // jika bulan sebelumnya adalah bulan 12, tahun -1
        if($month == 12){
            $year = date('Y', strtotime('-1 year'));
        }else{
            $year = date('Y');
        }
        // get omset cs per product per month
        $x=array('');
        for($product_id=1; $product_id<=5; $product_id++){
            $x = array_push($product_id);

        }
        return $x;
        // $omset = DB::table('leads as l')->join('operators as o', 'l.operator_id', '=', 'o.id')->where('product_id', $product_id)
        //             // ->where('l.operator_id',$user->operator->implode('id'))
        //             ->where('status_id', 5)
        //             ->whereMonth('l.updated_at', $month)->whereYear('l.updated_at', $year)
        //             ->sum('total_price');

                    // DB::table('omsets')->updateOrInsert([
                    //     'user_id'       => $user_id,
                    //     'product_id'    => $product_id,
                    //     'omset'         => $omset,
                    //     'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                    //     'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                    // ]);
        // get max omset per product per month
        // $max_omset = DB::table('omsets')->whereMonth('updated_at', $month)->whereYear('updated_at', $year)->max('omset');
        // if(is_null($max_omset)){
        //     $max_omset = $omset;
        // }else{
        //     $max_omset = $max_omset;
        // }
        

        // DB::table('omsets')->where('user_id' , $user_id)->update([
        //     'omset_point'   => $omset / $max_omset ,
        //     'created_at'  => date('Y-m-d', strtotime('- 1 month')),
        //     'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
        // ]);
        // return $omset;

        // return response()->json($omset/$max_omset);

        // return date('Y-m-d', strtotime('- 1 month'));
    }
}
