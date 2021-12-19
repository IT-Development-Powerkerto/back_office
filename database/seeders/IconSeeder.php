<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class icon_seeder extends Seeder
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
               'icon'  => 'fa fa-genderless text-success fs-1',
            ],
            [
               'icon'  => 'fa fa-genderless text-info fs-1',
            ],
            [
               'icon'  => 'fa fa-genderless text-danger fs-1',
            ],
            [
               'icon'  => 'fa fa-genderless text-primary fs-1',
            ]
        ];
        DB::table('icons')->insert($icon);
    }
}
