<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request) {

        $user_result = collect($request->trxData);
        $payment_result = collect($request->paymentData);

        // $user = User::create([
        //     'name' => $user_result->where('name', 'name')->first()['value'],
        //     'username' => $user_result->where('name', 'username')->first()['value'],
        //     'email' => $user_result->where('name', 'email')->first()['value'],
        //     'phone' => $user_result->where('name', 'phone')->first()['value'],
        //     'password' => Hash::make($user_result->where('name', 'password')->first()['value']),
        //     'paket_id' => $user_result->where('name', 'paket_id')->first()['value'],
        //     'role_id' => 1,
        //     'status' => 1,
        //     'exp' => 0,
        // ]);

        // $payments = Payment::create([
        //     'user_id' => $user->id,
        //     'transaction_id' => $payment_result['transaction_id'],
        //     'transaction_status' => $payment_result['transaction_status'],
        //     'order_id' => $payment_result['order_id'],
        //     'payment_type' => $payment_result['payment_type'],
        //     'gross_amount' => $payment_result['gross_amount'],
        //     'invoice' => '',
        // ]);

        // $user->admin_id = $user->id;
        // $user->save();

        return response()->json("OK", 200);
    }
}

