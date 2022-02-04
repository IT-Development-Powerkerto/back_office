<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Nette\Utils\Random;

class AccountsController extends Controller
{
    public function index(){
        return view('resetpwd');
    }
    public function resetPassword(Request $request){
        $user_exists = DB::table('users')->where('email', $request->email)->exists();
        if(!$user_exists){
            return redirect()->back()->with('error_code', 5)->withInput()->with('email','User does not exist');
        }
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Random::generate(60,'0-9a-zA-Z'),
            'created_at' => Carbon::now(),
        ]);
        $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
        $link = env('APP_URL').'/password/reset/'.$tokenData->token.'?email='.urlencode($request->email);
        (new MailController)->resetPassword($request->email, $link);
        return redirect()->back()->with('success', 'Email has been sent');
    }
}
