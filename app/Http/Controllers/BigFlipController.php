<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BigFlipController extends Controller
{
    public function inquiry(){
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $token = isset($_POST['token']) ? $_POST['token'] : null;
        if($token === '$2y$13$FfgWfKXTls05dk4h.tKQPOWqcg0JoLmI3zGMx4pzIlx.m693HhgOq'){
            $decoded_data = json_decode($data);
            print_r($decoded_data);
            //example of what will be printed are listed below
        }
    }
}
