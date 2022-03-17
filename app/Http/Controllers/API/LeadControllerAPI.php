<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LeadResource;
use App\Models\Lead;
use App\Models\Operator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadControllerAPI extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if($request->date_filter){
            $day = Carbon::parse($request->date_filter)->format('Y-m-d');
        } else {
            $day = Carbon::now()->format('Y-m-d');
        }
        if($user->role_id == 1){
            $leads = Lead::whereDate('created_at', $day)->get();
        }else if($user->role_id == 5){
            $leads = Lead::whereDate('created_at', $day)->where('user_id', $user->id)->get();
        }else if($user->role_id == 4){
            $leads = Lead::where('advertiser', $user->name)->get();
        }
        return LeadResource::collection($leads);
    }
}
