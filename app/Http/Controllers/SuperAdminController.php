<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Paket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Models\ProofOfPayment;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->date_filter){
        //     // dd($request->date_filter);
        //     $day = Carbon::parse($request->date_filter)->format('Y-m-d');

        //     // dd($day);
        //     $lead = DB::table('leads as l')
        //     ->join('users as u', 'l.admin_id', '=', 'u.admin_id')
        //     ->join('operators as o', 'l.operator_id', '=', 'o.id')
        //     ->join('products as p', 'l.product_id', '=', 'p.id' )
        //     ->join('statuses as s', 'l.status_id', '=', 's.id')
        //     ->join('clients as c', 'l.client_id', '=', 'c.id')
        //     ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
        //     ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at', 'u.name as user_name')
        //     ->where('l.updated_at', $day)
        //     ->orderByDesc('l.id')
        //     ->paginate(5);
        // } else {
        //     $day = Carbon::now()->format('Y-m-d');
        //     $lead = DB::table('leads as l')
        //     ->join('users as u', 'l.admin_id', '=', 'u.admin_id')
        //     ->join('operators as o', 'l.operator_id', '=', 'o.id')
        //     ->join('products as p', 'l.product_id', '=', 'p.id' )
        //     ->join('statuses as s', 'l.status_id', '=', 's.id')
        //     ->join('clients as c', 'l.client_id', '=', 'c.id')
        //     ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
        //     ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at', 'u.name as user_name')
        //     ->where('l.updated_at', $day)
        //     ->orderByDesc('l.id')
        //     ->paginate(5);
        //     // dd($leads);
        // }
        $day = Carbon::now()->format('Y-m-d');
        $user = User::where('role_id', 1)->get();
        $user_expired = User::where('role_id', 1)->value('expired_at');
        if($day >= $user_expired){
            DB::table('users')->where('expired_at', $day)->update([
                'exp' => 0,
                'expired_at' => $day,
            ]);
        }
        if (auth()->user()->admin_id == 1){
            return view('SuperAdmin')->with('user', $user);
        }else{
            return Redirect::back();
        }
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
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users',
            'password' => 'required'
        ]);

        $validated = $validator->validate();

        if(substr(trim($validated['phone']), 0, 1)=='0'){
            $phone = '62'.substr(trim($validated['phone']), 1);
        } else{
            $phone = $validated['phone'];
        }
        $user = new User();
        $user->name = $request->name;
        $user->role_id = 1;
        $user->phone = $phone;
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->status = 1;
        $user->paket_id = $request->paket;
        $user->exp = 0;
        $user->remember_token = Str::random(10);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->updated_at = Carbon::now()->toDateTimeString();
        if($request->hasFile('image')){
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'user-'.time().".".$extFile;
            $path = $request->image->move('public/assets/img',$namaFile);
            $user->image = $path;
        } else {
            $user->image = null;
        }
        $user->save();
        $user_id = User::orderBy('id', 'DESC')->value('id');
        DB::table('users')->where('id', $user_id)->update([
            'admin_id' => $user_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $paket = Paket::all();
        $proof = ProofOfPayment::all();
        return view('DetailAdmin',['admin' => $user])->with('paket', $paket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $paket = Paket::all();
        return view('EditingAdmin',['admin' => $user])->with('paket', $paket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        DB::table('users')->where('id', $user)->update([
            'name'           => $request->name,
            'email'          => $request->email,
            'username'       => $request->username,
            'paket_id'       => $request->paket_id,
        ]);

        DB::table('users')->where('admin_id', $user)->update([
            'paket_id'       => $request->paket_id,
        ]);

        return redirect('/superadmin')->with('success','Successfull! Admin Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function updateAktive($user){
        DB::table('users')->where('admin_id', $user)->update([
            'exp' => 1,
            'expired_at' => date('Y-m-d', strtotime('+1 month')),
        ]);

        // return redirect('/superadmin');
        $email = DB::table('users')->where('admin_id', $user)->value('email');
        return redirect()->route('activation', ['email' => $email]);
    }

    public function updateNonAktive($user){
        $day = Carbon::now()->format('Y-m-d');
        DB::table('users')->where('admin_id', $user)->update([
            'exp' => 0,
            'expired_at' => $day,
        ]);

        return redirect('/superadmin');
    }
}
