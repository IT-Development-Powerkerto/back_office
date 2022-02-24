<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::where('admin_id', Auth::user()->admin_id)->get();
        return view('warehouse/Dashboard', compact('warehouses'));
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
            $namaFile = 'warehouse-'.time().".".$extFile;
            $path = $request->image->move('public/assets/img/warehouse',$namaFile);
            $image = $path;
        }else{
            $image = null;
        }
        Warehouse::create([
            'admin_id' => Auth::user()->admin_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image,
            'address' => $request->address,
            'status' => $request->status
        ]);
        return redirect('warehouse')->with('success', 'Successfull! Warehouse Added');
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
        $warehouse = Warehouse::findOrFail($id);
        return view('warehouse.WarehouseEdit', compact('warehouse'));
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
        // dd($id);
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);
        $warehouse = Warehouse::find($id);
        // dd($warehouse);
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'warehouse-'.time().".".$extFile;
            File::delete($warehouse->image);
            $path = $request->image->move('public/assets/img/warehouse',$namaFile);
            $image = $path;
        }
        else{
            $image = Warehouse::where('id', $id)->value('image');
        }
        Warehouse::where('id', $id)->update([
            'admin_id' => Auth::user()->admin_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image,
            'address' => $request->address,
            'status' => $request->status
        ]);
        return redirect('warehouse')->with('success', 'Successfull! Warehouse Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return 'ok';
        $warehouse = Warehouse::find($id);
        File::delete($warehouse->image);
        $warehouse->delete();
        return redirect()->back()->with('success','Successull! Product Deleted');;
    }

    public function editingwarehouse(){
        return view('warehouse/WarehouseEdit');
    }
}
