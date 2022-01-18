<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
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
            // return route('inquiry');
        }
    }
}
