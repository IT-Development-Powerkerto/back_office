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
                'phone'     => "089987987987",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "CEO",
                'role_id'   => 2,
                'username'  => "ceo",
                'email'     => "ceo@pwk.com",
                'phone'     => "089098098098",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Manager",
                'role_id'   => 3,
                'username'  => "manager",
                'email'     => "manager@pwk.com",
                'phone'     => "089890890890",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Advertiser",
                'role_id'   => 4,
                'username'  => "advertiser",
                'email'     => "advertiser@pwk.com",
                'phone'     => "089789789789",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Customer Service",
                'role_id'   => 5,
                'username'  => "cs",
                'email'     => "cs@pwk.com",
                'phone'     => "089678678678",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Design Graphic Multimedia",
                'role_id'   => 6,
                'username'  => "dgm",
                'email'     => "dgm@pwk.com",
                'phone'     => "089456456456",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Content Web Marketing",
                'role_id'   => 7,
                'username'  => "cwm",
                'email'     => "cwm@pwk.com",
                'phone'     => "089234234234",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "IT Developer",
                'role_id'   => 8,
                'username'  => "itd",
                'email'     => "itd@pwk.com",
                'phone'     => "089123123123",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Hanif Muslim Azhar",
                'role_id'   => 4,
                'username'  => "hanif",
                'email'     => "hanif30081997@gmail.com",
                'phone'     => "089698268654",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Awal Azwihani",
                'role_id'   => 4,
                'username'  => "awal",
                'email'     => "awal23azwihani@gmail.com",
                'phone'     => "085866313726",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Hutari Trinurcahyani",
                'role_id'   => 5,
                'username'  => "hutari",
                'email'     => "cshutaritrinurcahyani@gmail.com",
                'phone'     => "081389855064",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Rosi Nurjanah",
                'role_id'   => 5,
                'username'  => "rosi",
                'email'     => "csrosinurjanah@gmail.com",
                'phone'     => "082233320833",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Noviana Prastyani",
                'role_id'   => 5,
                'username'  => "noviana",
                'email'     => "csnovianap@gmail.com",
                'phone'     => "081389855087",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Farida Istinganah",
                'role_id'   => 5,
                'username'  => "farida",
                'email'     => "csida08@gmail.com",
                'phone'     => "081326510461",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],
            [
                'name'      => "Intan Ananda Fitria",
                'role_id'   => 5,
                'username'  => "intan",
                'email'     => "csintanananda@gmail.com",
                'phone'     => "081389855052",
                'password'  => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ],

        ];

        DB::table('users')->insert($users);
    }
}
