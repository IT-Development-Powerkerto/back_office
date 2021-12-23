<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'product-'.time().".".$extFile;
            $path = $request->image->move('assets/img/product',$namaFile);
            $image = $path;
        }

        DB::table('products')->insert([
            'name'         => $request->name,
            'price'        => $request->price,
            'discount'     => $request->phone,
            'image'        => $image,
            'product_link' => $request->product_link,
            'created_at'   => Carbon::now()->toDateTimeString(),
            'updated_at'   => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/dashboard')->with('success','Successull! Product Added');
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
        {
            $products = Product::findOrFail($id);
            return view('EditingProduct',['product' => $products]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'product-'.time().".".$extFile;
            //File::delete($user->image);
            $path = $request->image->move('assets/img/product',$namaFile);
            $image = $path;
        }

        DB::table('products')->where('id', $product)->update([
            'name'         => $request->name,
            'price'        => $request->price,
            'discount'     => $request->discount,
            'image'        => $image,
            'product_link' => $request->product_link,
            'updated_at'   => Carbon::now()->toDateTimeString(),
        ]);

        //return redirect('/dashboard')->with('success','Successull! User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        //return redirect('/dashboard')->with('success','Successull! User Deleted');
    }
}
