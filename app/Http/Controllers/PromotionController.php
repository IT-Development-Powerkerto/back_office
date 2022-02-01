<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('admin_id', auth()->user()->admin_id)->get();
        $promotion = Promotion::where('admin_id', auth()->user()->admin_id)->get();
        if(auth()->user()->role_id==1){
            return view('CreatePromotion')->with('product', $product)->with('promotion', $promotion);
        }elseif (auth()->user()->role_id==5){
            return view('CreatePromotionCS')->with('product', $product)->with('promotion', $promotion);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total_promotion = $request->promotion_product_price + $request->promotion_shippment_cost;
        DB::table('promotions')->insert([
            'admin_id'                   => auth()->user()->admin_id,
            'promotion_type'             => $request->promotion_type,
            'product_name'               => $request->product_name,
            'promotion_name'             => $request->promotion_name,
            'promotion_product_price'    => $request->promotion_product_price,
            'promotion_shippment_cost'   => $request->promotion_shippment_cost,
            'total_promotion'            => $total_promotion,
            'created_at'                 => Carbon::now()->toDateTimeString(),
            'updated_at'                 => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/promotion')->with('success','Successull! Promotion Added');
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
        $product = Product::where('admin_id', auth()->user()->admin_id)->get();
        $promotion = Promotion::where('admin_id', auth()->user()->admin_id)->whereId($id)->get();
        return view('EditingPromotion', ['promotion' => $promotion])->with('product', $product);
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
        $total_promotion = $request->promotion_product_price + $request->promotion_shippment_cost;
        DB::table('promotions')->where('id', $id)->update([
            'admin_id'                   => auth()->user()->admin_id,
            'promotion_type'             => $request->promotion_type,
            'product_name'               => $request->product_name,
            'promotion_name'             => $request->promotion_name,
            'promotion_product_price'    => $request->promotion_product_price,
            'promotion_shippment_cost'   => $request->promotion_shippment_cost,
            'total_promotion'            => $total_promotion,
            'created_at'                 => Carbon::now()->toDateTimeString(),
            'updated_at'                 => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/promotion')->with('success','Successull! Promotion has been Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect('/promotion')->with('success','Successull! Promotion Deleted');
    }

    public function get_promotion($id){
        $product_promotion = Promotion::where('id', $id)->value('promotion_product_price');
        $shipping_promotion = Promotion::where('id', $id)->value('promotion_shippment_cost');
        $promotion = [
            'product_promotion' => $product_promotion, 
            'shipping_promotion' => $shipping_promotion
        ];
        return json_encode($promotion);
    }
}
