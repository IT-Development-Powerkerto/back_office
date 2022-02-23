<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('warehouse/Dashboard');
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
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'product-'.time().".".$extFile;
            $path = $request->image->move('public/assets/img/product',$namaFile);
            $image = $path;
        }else{
            $image = null;
        }
        Warehouse::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image,
            'address' => $request->address,
            'status' => $request->status
        ]);
        return view('warehouse.Dashboard')->with('success', 'Successfull! Warehouse Added');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editingwarehouse(){
        return view('warehouse/WarehouseEdit');
    }
}
