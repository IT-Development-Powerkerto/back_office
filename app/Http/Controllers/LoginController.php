<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        // $credentials = $request -> validate([
        //     //terlalu ketat harus gmail 'email' => 'required|email:dns',
        //     'username' => 'required',
        //     'password' => 'required'
        // ]);

        $data = $request->input();
        if(Auth::attempt(['username' => $data['username'], 'password' => $data['password'], 'role_id' => '1'||'2'||'3'||'8'])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        elseif (Auth::attempt(['username' => $data['username'], 'password' => $data['password'], 'role_id' => '4'])){
            $request->session()->regenerate();
            return redirect()->intended('adv');
        }
        elseif (Auth::attempt(['username' => $data['username'], 'password' => $data['password'], 'role_id' => '5'])){
            $request->session()->regenerate();
            return redirect()->intended('cs');
        }
        return back()->with('error', 'Login Failed!');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }
}
