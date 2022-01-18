<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\AcceptPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BigFlipCallbackController extends Controller
{
    public function inquiry(){
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $token = isset($_POST['token']) ? $_POST['token'] : null;
        if($token === '$2y$13$FfgWfKXTls05dk4h.tKQPOWqcg0JoLmI3zGMx4pzIlx.m693HhgOq'){
            $decoded_data = json_decode($data, true);
            Inquiry::create([
                'bank_code' => $decoded_data['bank_code'],
                'account_number' => $decoded_data['account_number'],
                'account_holder' => $decoded_data['account_holder'],
                'status' => $decoded_data['status']
            ]);
        }
    }
    public function accept_payment(){
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $token = isset($_POST['token']) ? $_POST['token'] : null;
        if($token === '$2y$13$FfgWfKXTls05dk4h.tKQPOWqcg0JoLmI3zGMx4pzIlx.m693HhgOq'){
            $decoded_data = json_decode($data, true);
            DB::table('accept_payments')->insert([
                'p_id' => $decoded_data['id'],
                'bill_link' => $decoded_data['bill_link'],
                'bill_title' => $decoded_data['bill_title'],
                'sender_name' => $decoded_data['sender_name'],
                'sender_bank' => $decoded_data['sender_bank'],
                'amount' => $decoded_data['amount'],
                'status' => $decoded_data['status'],
                'created_at' => $decoded_data['created_at']
            ]);
        }
    }
}
