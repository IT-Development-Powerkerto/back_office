<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
               'name'  => 'Admin',
            ],
            [
               'name'  => 'CEO',
            ],
            [
               'name'  => 'Manager',
            ],
            [
               'name'  => 'HRD',
            ],
            [
               'name'  => 'Advertise',
            ],
            [
               'name'  => 'Customer Service',
            ],
            [
               'name'  => 'Design Graphic Multimedia',
            ],
            [
               'name'  => 'Content Web Marketing',
            ],
            [
               'name'  => 'IT Developer',
            ],
        ];

        DB::table('roles')->insert($role);
    }
}
