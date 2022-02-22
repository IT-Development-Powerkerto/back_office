<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\WaitingListResource;


class DashboardSuperAdminController extends Controller
{
    public function waiting_list(){
        $data = User::where('role_id', 1)->where('expired_at', null);

        return response()->json([WaitingListResource::collection($data->get()), 'Programs fetched.']);
    }
}
