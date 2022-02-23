<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\WaitingListResource;
use App\Http\Resources\AlmostExpiredResource;
use App\Http\Resources\UserPWK;
use Carbon\Carbon;


class DashboardSuperAdminController extends Controller
{
    public function waiting_list(){
        $data = User::where('role_id', 1)->where('expired_at', null);

        return response()->json(WaitingListResource::collection($data->get()));
    }

    public function almost_expired(){
        $day = Carbon::now()->format('Y-m-d');
        $data = User::where('role_id', 1)->where('expired_at', '<=', $day);

        return response()->json(AlmostExpiredResource::collection($data->get()));
    }

    public function updateAktive($user){
        $aktive = User::where('admin_id', $user)->update([
            'exp' => 1,
            'expired_at' => date('Y-m-d', strtotime('+1 month')),
        ]);

        if ($aktive) {
            return response()->json([
                'success' => true,
                'message' => 'User Berhasil Diaktivasi!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User Gagal Diaktivasi!',
            ], 401);
        }

        // return redirect('/superadmin');
        // $data = User::where('admin_id', $user);
        // return redirect()->back();
        // return response()->json([UserPWK::collection($data->get()), 'Programs fetched.']);
    }

    public function updateNonAktive($user){
        $day = Carbon::now()->format('Y-m-d');
        $non_aktive = User::where('admin_id', $user)->update([
            'exp' => 0,
            'expired_at' => $day,
        ]);

        if ($non_aktive) {
            return response()->json([
                'success' => true,
                'message' => 'User Berhasil Dinon-aktivasi!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User Gagal Dinon-aktivasi!',
            ], 401);
        }
    }
}
