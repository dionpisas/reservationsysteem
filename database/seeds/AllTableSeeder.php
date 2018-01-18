<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AllTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles
        DB::table('roles')->insert([
            'name' => "User"
        ]);

        DB::table('roles')->insert([
            'name' => "Admin"
        ]);

        //Statustypes
        DB::table('status_types')->insert([
            'name' => "user",
            'type'=> 1
        ]);

        DB::table('status_types')->insert([
            'name' => "appointment",
            'type'=> 2
        ]);

        // Statussen
        DB::table('statuses')->insert([
            'name' => "Beschikbaar",
            'status_types_id'=>  "1",
        ]);

        DB::table('statuses')->insert([
            'name' => "Niet beschikbaar",
            'status_types_id'=> 1,
        ]);

        DB::table('statuses')->insert([
            'name' => "actief",
            'status_types_id'=> 2,
        ]);

        DB::table('statuses')->insert([
            'name' => "Niet actief",
            'status_types_id'=> 2,
        ]);


        // Users
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'roles_id' => 1,
            'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'roles_id' => 1,
            'password' => bcrypt('secret')
        ]);


        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'roles_id' => 2,
            'password' => bcrypt('admin123')
        ]);

        DB::table('users')->insert([
            'name' => 'dion',
            'email' => 'dion@email.nl',
            'roles_id' => 1,
            'password' => bcrypt('dion123')
        ]);


        // Appointments
        DB::table('appointments')->insert([
            'user_id'=> null,
            'statuses_id' => 1,
            'date' => date("Y-m-d"),
            'start_time' => date("Y-m-d H:i:s"),
            'end_time' => date("Y-m-d H:i:s")
        ]);
    }
}
