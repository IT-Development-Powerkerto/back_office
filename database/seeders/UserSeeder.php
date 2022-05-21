<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        //     'password'  => Hash::make('1234'),
        //     'remember_token' => Str::random(10),
        // ]);
        $users = [
            [
                'admin_id'  => 1,
                'name'      => "Super Admin",
                'role_id'   => 1,
                'username'  => "super",
                'email'     => "superadmin@pwk.com",
                'phone'     => "6289987987987",
                'paket_id'  => 1,
                'exp'       => 1,
                'password'  => Hash::make('1234'),
                'remember_token' => Str::random(10),
            ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Admin",
            //     'role_id'   => 1,
            //     'username'  => "admin",
            //     'email'     => "itdevelopmentpwk@gmail.com",
            //     'phone'     => "6289987987987",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "CEO",
            //     'role_id'   => 2,
            //     'username'  => "ceo",
            //     'email'     => "ceo@pwk.com",
            //     'phone'     => "6289098098098",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Manager",
            //     'role_id'   => 3,
            //     'username'  => "manager",
            //     'email'     => "manager@pwk.com",
            //     'phone'     => "6289890890890",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Advertiser",
            //     'role_id'   => 4,
            //     'username'  => "advertiser",
            //     'email'     => "advertiser@pwk.com",
            //     'phone'     => "6289789789789",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Customer Service",
            //     'role_id'   => 5,
            //     'username'  => "cs",
            //     'email'     => "cs@pwk.com",
            //     'phone'     => "6289678678678",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Design Graphic Multimedia",
            //     'role_id'   => 6,
            //     'username'  => "dgm",
            //     'email'     => "dgm@pwk.com",
            //     'phone'     => "6289456456456",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Content Web Marketing",
            //     'role_id'   => 7,
            //     'username'  => "cwm",
            //     'email'     => "cwm@pwk.com",
            //     'phone'     => "6289234234234",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "IT Developer",
            //     'role_id'   => 8,
            //     'username'  => "itd",
            //     'email'     => "itd@pwk.com",
            //     'phone'     => "6289123123123",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Hanif Muslim Azhar",
            //     'role_id'   => 4,
            //     'username'  => "hanif",
            //     'email'     => "hanif30081997@gmail.com",
            //     'phone'     => "6289698268654",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Awal Azwihani",
            //     'role_id'   => 4,
            //     'username'  => "awal",
            //     'email'     => "awal23azwihani@gmail.com",
            //     'phone'     => "6285866313726",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Rifan Tri Yulianto",
            //     'role_id'   => 4,
            //     'username'  => "rifan",
            //     'email'     => "rifantriyulianto@gmail.com",
            //     'phone'     => "6287881666931",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Isnan Aditia",
            //     'role_id'   => 4,
            //     'username'  => "isnan",
            //     'email'     => "isnanadit@gmail.com",
            //     'phone'     => "6285601615605",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Jihad Salahudin",
            //     'role_id'   => 4,
            //     'username'  => "jihad",
            //     'email'     => "jihadsalahuddin09@gmail.com",
            //     'phone'     => "6281337595113",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Anggit Hatmaji Adiyoso",
            //     'role_id'   => 4,
            //     'username'  => "anggit",
            //     'email'     => "anggithatma@gmail.com",
            //     'phone'     => "6282217443670",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Alfian Ridho Utama",
            //     'role_id'   => 4,
            //     'username'  => "alfian",
            //     'email'     => "alfianridhoutama.business@gmail.com",
            //     'phone'     => "6281542436395",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Hutari Trinurcahyani",
            //     'role_id'   => 5,
            //     'username'  => "hutari",
            //     'email'     => "cshutaritrinurcahyani@gmail.com",
            //     'phone'     => "6281389855064",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Rosi Nurjanah",
            //     'role_id'   => 5,
            //     'username'  => "rosi",
            //     'email'     => "csrosinurjanah@gmail.com",
            //     'phone'     => "6282233320833",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Noviana Prastyani",
            //     'role_id'   => 5,
            //     'username'  => "noviana",
            //     'email'     => "csnovianap@gmail.com",
            //     'phone'     => "6281389855087",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Farida Istinganah",
            //     'role_id'   => 5,
            //     'username'  => "farida",
            //     'email'     => "csida08@gmail.com",
            //     'phone'     => "6281326510461",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Intan Ananda Fitria",
            //     'role_id'   => 5,
            //     'username'  => "intan",
            //     'email'     => "csintanananda@gmail.com",
            //     'phone'     => "6281389855052",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Ristika Damayanti",
            //     'role_id'   => 2,
            //     'username'  => "ristika",
            //     'email'     => "csristikadamayanti@gmail.com",
            //     'phone'     => "6281389855089",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Nandalita Setiawan",
            //     'role_id'   => 5,
            //     'username'  => "nandalita",
            //     'email'     => "csnandalitasetiawan@gmail.com",
            //     'phone'     => "6281389855068",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Tri Kustini",
            //     'role_id'   => 5,
            //     'username'  => "tri",
            //     'email'     => "cstrikustini@gmail.com",
            //     'phone'     => "6281389855032",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Uswatun Khasanah",
            //     'role_id'   => 5,
            //     'username'  => "uswatun",
            //     'email'     => "uswatunkhcs1@gmail.com",
            //     'phone'     => "6282233320884",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Ukhti Fatayah",
            //     'role_id'   => 5,
            //     'username'  => "ukhti",
            //     'email'     => "csukhticsukhti@gmail.com",
            //     'phone'     => "6281215076244",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Alisa Nur Cahyani",
            //     'role_id'   => 5,
            //     'username'  => "alisa",
            //     'email'     => "csalisa927@gmail.com",
            //     'phone'     => "6281380092881",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Ferra Dita Larasaty",
            //     'role_id'   => 5,
            //     'username'  => "ferra",
            //     'email'     => "csfellac@gmail.com",
            //     'phone'     => "6281311130091",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Fadilatun Nida Rahayu",
            //     'role_id'   => 5,
            //     'username'  => "fadilatun",
            //     'email'     => "csnidarahayu@gmail.com",
            //     'phone'     => "6281311130053",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Septiyani Dwi Putri",
            //     'role_id'   => 5,
            //     'username'  => "septiyani",
            //     'email'     => "csseptiyani@gmail.com",
            //     'phone'     => "6281215075595",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Sukma Indah Sari Limaran",
            //     'role_id'   => 5,
            //     'username'  => "sukma",
            //     'email'     => "Cs.sukmaindah@gmail.com",
            //     'phone'     => "6281380553654",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Nadia Husnadari",
            //     'role_id'   => 5,
            //     'username'  => "nadia",
            //     'email'     => "csnadia1607@gmail.com",
            //     'phone'     => "6281229449475",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Friska",
            //     'role_id'   => 5,
            //     'username'  => "friska",
            //     'email'     => "csfriska@gmail.com",
            //     'phone'     => "6281229449475",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Sovi",
            //     'role_id'   => 5,
            //     'username'  => "sovi",
            //     'email'     => "cssovi@gmail.com",
            //     'phone'     => "6281229449475",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Haya",
            //     'role_id'   => 5,
            //     'username'  => "haya",
            //     'email'     => "cshaya@gmail.com",
            //     'phone'     => "6281229449475",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Nurhayatun",
            //     'role_id'   => 5,
            //     'username'  => "nur",
            //     'email'     => "csnurhay@gmail.com",
            //     'phone'     => "6281389855066",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'admin_id'  => 2,
            //     'name'      => "Riza Maria Indra Dini",
            //     'role_id'   => 5,
            //     'username'  => "riza",
            //     'email'     => "csriza.maria25@gmailcom",
            //     'phone'     => "6281389855070",
            //     'paket_id'  => 1,
            //     'exp'       => 1,
            //     'password'  => Hash::make('1234'),
            //     'remember_token' => Str::random(10),
            // ],

        ];

        DB::table('users')->insert($users);
    }
}
