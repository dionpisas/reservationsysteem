<?php

use Illuminate\Database\Seeder;

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
            'name' => "user"
        ]);

        DB::table('roles')->insert([
            'name' => "admin"
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
            'roles_id' => 2,
            'password' => bcrypt('secret')
        ]);

        // Dates
        DB::table('dates')->insert([
            'start_date_time' => "2017-12-15 09:00:00",
            'end_date_time'=> "2017-12-15 12:00:00",
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

        // Appointments
        DB::table('appointments')->insert([
            'name' => "user",
            'user_id'=> null,
            'dates_id' => 1,
            'statuses_id' => 1,
        ]);
    }
}
