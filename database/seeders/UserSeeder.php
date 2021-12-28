<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name'      => "Administrator",
        //     'role_id'   => 1,
        //     'username'  => "admin",
        //     'email'     => "admin@admin.com",
        //     'password'  => bcrypt('1234'),
        //     'remember_token' => Str::random(10),
        // ]);
        $users = [
            [
                'name'      => "Administrator",
                'role_id'   => 1,
                'username'  => "admin",
                'email'     => "admin@pwk.com",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "CEO",
                'role_id'   => 2,
                'username'  => "ceo",
                'email'     => "ceo@pwk.com",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Manager",
                'role_id'   => 3,
                'username'  => "manager",
                'email'     => "manager@pwk.com",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Advertiser",
                'role_id'   => 4,
                'username'  => "advertiser",
                'email'     => "advertiser@pwk.com",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Customer Service",
                'role_id'   => 5,
                'username'  => "cs",
                'email'     => "cs@pwk.com",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Design Graphic Multimedia",
                'role_id'   => 6,
                'username'  => "dgm",
                'email'     => "dgm@pwk.com",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Content Web Marketing",
                'role_id'   => 7,
                'username'  => "cwm",
                'email'     => "cwm@pwk.com",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "IT Developer",
                'role_id'   => 8,
                'username'  => "itd",
                'email'     => "itd@pwk.com",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
