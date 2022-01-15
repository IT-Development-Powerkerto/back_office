<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
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
        if($request->image == null){
            return redirect('/register')->with('danger', 'Register Failed!!');
        }else{
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
            $user->paket_id = $request->paket_id;
            $user->exp = 0;
            $user->remember_token = Str::random(10);
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->updated_at = Carbon::now()->toDateTimeString();
            $user->save();

            $user_id = User::orderBy('id', 'DESC')->value('id');
            DB::table('users')->where('id', $user_id)->update([
                'admin_id' => $user_id,
            ]);

            if($request->hasFile('image')){
                $extFile = $request->image->getClientOriginalExtension();
                $namaFile = 'proof-'.time().".".$extFile;
                $path = $request->image->move('public/assets/img/proof',$namaFile);
                $image = $path;
            } else {
                $image = null;
            }

            DB::table('proof_of_payments')->insert([
                'user_id' => $user_id,
                'image' => $image,
                'created_at'   => Carbon::now()->toDateTimeString(),
                'updated_at'   => Carbon::now()->toDateTimeString(),
            ]);
            return redirect('/login')->with('success', 'Register Success!');
        }
        // $requests = $request->all();
        // dd($requests);

        //return redirect('/login')->with('success', 'Register Success!');

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
}
