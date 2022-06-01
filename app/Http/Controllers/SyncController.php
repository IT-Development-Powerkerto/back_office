<?php

namespace App\Http\Controllers;

use App\Models\Inputer;
use App\Models\User;
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
    public function tableInputer(){
        $advs = User::where('role_id', 4)->get();
        // return $advs;
        foreach($advs as $adv){
            // $adv_name[] = array($adv->name);
            Inputer::where('adv_name', $adv->name)->update([
                'adv_id' => $adv->id,
            ]);
        }
        $cs = User::whereIn('role_id', [5,13])->get();
        foreach($cs as $cs){
            // $adv_name[] = array($adv->name);
            Inputer::where('operator_name', $cs->name)->update([
                'cs_id' => $cs->id,
            ]);
        }
        // $inputer = Inputer::whereIn('adv_name', $adv_name)->limit(5)->get();
    //    $inputer = DB::table('inputers')->limit(5)->get();
        // return $inputer;
        // Inputer::updated([
        //     'adv_name' =>
        // ]);
    }
    public function warehouse()
    {
        $data_closing = Inputer::all();
        foreach ($data_closing as $d) {
            if($d->warehouse == 'Kosambi'){
                Inputer::where('warehouse', 'Kosambi')->update([
                    'warehouse_id' => 4
                ]);
            }
            elseif($d->warehouse == 'Tandes.Sby'){
                Inputer::where('warehouse', 'Tandes.Sby')->update([
                    'warehouse_id' => 3
                ]);
            }
            elseif($d->warehouse == 'Cilacap'){
                Inputer::where('warehouse', 'Cilacap')->update([
                    'warehouse_id' => 1
                ]);
            }
        }
        return 'sync success';
    }
}
