<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('myprofile');
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $result = User::findOrFail($id);
        return view('editing',['user' => $result])->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'user-'.time().".".$extFile;
            File::delete($user->image);
            $path = $request->image->move('public/assets/img',$namaFile);
            $image = $path;
        }
        else{
            $image = DB::table('users')->where('id', $user->id)->implode('image');
        }

        DB::table('users')->where('id', $user->id)->update([
            'name'      => $request->name,
            'role_id'   => $request->role_id,
            'phone'     => $request->phone,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'image'     => $image,
            'status'    => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/dashboard')->with('success','Successull! User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        File::delete($user->image);
        return redirect('/dashboard')->with('success','Successull! User Deleted');
    }

    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
        return redirect()->to('/dashboard');
    }

    public function select(Request $request)
    {
        $roles = [];

        if ($request->has('q')) {
            $search = $request->q;
            $roles = Role::select("id", "name")
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $roles = Role::limit(10)->get();
        }
        return response()->json($roles);
    }
}
