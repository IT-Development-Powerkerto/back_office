<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function resetPassword(Request $request){
        $user_exists = DB::table('users')->where('email', $request->email)->exists();
        if(!$user_exists){
            return redirect()->back()->with('error_code', 5)->withInput()->with('email','User does not exist');
        }
    }
}
