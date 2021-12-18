<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        $validateData = $request ->validate([
            'name'      => 'required|max:255',
            'role_id'   => 'required',
            'phone'     => 'required|min:11|max:13',
            'username'  => 'required|min:3|max:255|unique:users',
            'email'     => 'required|email:dns|unique:users',
            'password'  => 'required|min:4|max:255',
            'image'     => 'required|image|mimes:jpeg,png,jpg,',
            'status_id' => 'required',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validateData['password'] = Hash::make($validateData['password']);
        // $validateData['status_id'] = 1;

        $user = new User();
        $user->name = $validateData['name'];
        $user->role_id = $validateData['role_id'];
        $user->phone = $validateData['phone'];
        $user->username = $validateData['username'];
        $user->email = $validateData['email'];
        $user->password = Hash::make($validateData['password']);
        $user->status_id = 1;

        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'user-'.time().".".$extFile;
            $path = $request->image->move('assets/images',$namaFile);
            $user->image = $path;
        }
        $user->save();

        //User::create($validatedData);
        // $request->session()->flash('success','Registration Successfull! Please Login');
        return redirect('/dashboard')->with('success','Successull! User Added');
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
        $result = User::findOrFail($id);
        return view('editing',['user' => $result]);
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
            $path = $request->image->move('assets/images',$namaFile);
            $image = $path;
        }

        DB::table('users')->where('id', $user)->update([
            'name'      => $request->name,
            // 'role_id'   => $request->role_id,
            'phone'     => $request->phone,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'image'     => $image,
            'status_id' => 1,
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

        return redirect('/dashboard')->with('success','Successull! User Deleted');
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
