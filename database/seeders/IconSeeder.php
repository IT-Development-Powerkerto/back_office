<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD

class icon_seeder extends Seeder
=======
use Illuminate\Support\Facades\DB;

class IconSeeder extends Seeder
>>>>>>> ac402e44482b2a74578500cb3f880667fe7dec6e
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
<<<<<<< HEAD
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
=======
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

>>>>>>> ac402e44482b2a74578500cb3f880667fe7dec6e
        DB::table('icons')->insert($icon);
    }
}
