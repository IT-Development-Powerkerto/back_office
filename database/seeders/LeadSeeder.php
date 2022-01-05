<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n=1;
        for ($i=1; $i<=268; $i++){
            $lead = [
                [
                'advertiser'  => 'Hanif',
                'operator_id' => 1,
                'campaign_id' => 1,
                'client_id'   => $n,
                'product_id'  => 5,
                'quantity'    => null,
                'price'       => 20000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                ],
            ];
            $client = [
                [
                'campaign_id'   => 1,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=1; $i<=142; $i++){
            DB::table('leads')->where('id', $i)->update([
                'status_id'   => 5,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        for ($i=1; $i<=175; $i++){
            $lead = [
                [
                'advertiser'  => 'Hanif',
                'operator_id' => 2,
                'campaign_id' => 1,
                'client_id'   => $n,
                'product_id'  => 5,
                'quantity'    => null,
                'price'       => 20000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                ],
            ];
            $client = [
                [
                'campaign_id'   => 1,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for($i=$n-175; $i<=$n-175+79; $i++){
            DB::table('leads')->where('id', $i)->update([
                'status_id'   => 5,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        for ($i=1; $i<=200; $i++){
            $lead = [
                [
                'advertiser'  => 'Hanif',
                'operator_id' => 4,
                'campaign_id' => 1,
                'client_id'   => $n,
                'product_id'  => 5,
                'quantity'    => null,
                'price'       => 20000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                ],
            ];
            $client = [
                [
                'campaign_id'   => 1,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for ($i=1; $i<=209; $i++){
            $lead = [
                [
                'advertiser'  => 'Hanif',
                'operator_id' => 5,
                'campaign_id' => 1,
                'client_id'   => $n,
                'product_id'  => 5,
                'quantity'    => null,
                'price'       => 20000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                ],
            ];
            $client = [
                [
                'campaign_id'   => 1,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }

        for ($i=1; $i<=193; $i++){
            $lead = [
                [
                'advertiser'  => 'Hanif',
                'operator_id' => 6,
                'campaign_id' => 1,
                'client_id'   => $n,
                'product_id'  => 5,
                'quantity'    => null,
                'price'       => 20000,
                'total_price' => null,
                'status_id'   => 3,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                ],
            ];
            $client = [
                [
                'campaign_id'   => 1,
                'name'          => null,
                'whatsapp'      => null,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
                ],
            ];
            DB::table('leads')->insert($lead);
            DB::table('clients')->insert($client);
            $n+=1;
        }
    }
}
