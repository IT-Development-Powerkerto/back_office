<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $icon = [
            [
               'name'  => 'fa fa-genderless text-primary fs-1',
            ],
            [
               'name'  => 'fa fa-genderless text-danger fs-1',
            ],
            [
               'name'  => 'fa fa-genderless text-success fs-1',
            ],
            [
               'name'  => 'fa fa-genderless text-info fs-1',
            ],
        ];

        DB::table('icons')->insert($icon);
    }
}
