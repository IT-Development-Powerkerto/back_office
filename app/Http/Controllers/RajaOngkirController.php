<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    public function cek(Request $request)
    {
        
        $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])
            ->post('https://pro.rajaongkir.com/api/cost', [
                'origin' => $request->origin,
                'originType' => 'city',
                'destination' => $request->destination,
                'destinationType' => 'city',
                'weight' => $request->weight,
                'courier' => $request->courier,

            ]);
        $ongkir = json_decode($response, true);
        return $ongkir['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        // return $ongkir;
    }
}
