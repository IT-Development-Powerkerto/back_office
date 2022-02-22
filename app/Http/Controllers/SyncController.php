<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyncController extends Controller
{
    public function tableClient()
    {
        // return 'asu';
        $clients = DB::table('clients')->get();
        foreach($clients as $client){
            DB::table('leads')->where('client_id', $client->id)->update([
                'client_name' => $client->name,
                'client_whatsapp' => $client->whatsapp
            ]);
        }
        // return $clients;
    }
}
