<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsControllerAPI extends Controller
{
    public function index()
    {
        
    }
    public function login(Request $request){
        $data = $request->input();
        // return $data;
        if(Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            $user = Auth::user();
            // $member_role = Member::where('user_id', $user->id)->value('role_id');
            // if ($member_role != 2){
            //     return response()->json(['error'=>'Unauthorised'], 401);
            // }
            // else{

                $success['token'] =  $user->createToken('POS')-> accessToken;
                $success['name'] =  $user->name;

                // $biodata = new Biodata();
                // $biodata->user_id = $user->id;

                return response()->json(['user' => $user ,'success' => $success ]);
            // }
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
}
