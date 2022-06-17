<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Golpik123@'),
                'name' => 'admin',
                'is_confirmed' => '1',
                'email_verified_at'=> now(),
                'approved' => '1',
                'status' => 'approved',
                'role_id' => '1',
                'experience' => ''
            ]
//             trainer
            , [
                'email' => 'trainer@gmail.com',
                'password' => bcrypt('Golpik123@'),
                'name' => 'trainer',
                'is_confirmed' => '1',
                'email_verified_at'=> now(),
                'approved' => '1',
                'status' => 'approved',
                'role_id' => '2',
                'experience' => ''
            ]
            , [
                'email' => 'trainer2@gmail.com',
                'password' => bcrypt('Golpik123@'),
                'name' => 'trainer002',
                'is_confirmed' => '1',
                'email_verified_at'=> now(),
                'approved' => '1',
                'status' => 'approved',
                'role_id' => '2',
                'experience' => ''
            ]
            , [
                'email' => 'trainer3@gmail.com',
                'password' => bcrypt('Golpik123@'),
                'name' => 'trainer003',
                'is_confirmed' => '1',
                'email_verified_at'=> now(),
                'approved' => '1',
                'status' => 'pending',
                'role_id' => '2',
                'experience' => ''
            ]
//             trainee
            , [
                'email' => 'trainee@gmail.com',
                'password' => bcrypt('Golpik123@'),
                'name' => 'trainee000',
                'is_confirmed' => '1',
                'email_verified_at'=> now(),
                'approved' => '1',
                'status' => 'approved',
                'role_id' => '3',
                'experience' => ''
            ]
            , [
                'email' => 'trainee2@gmail.com',
                'password' => bcrypt('Golpik123@'),
                'name' => 'trainee0002',
                'is_confirmed' => '1',
                'email_verified_at'=> now(),
                'approved' => '1',
                'status' => 'approved',
                'role_id' => '3',
                'experience' => ''
            ]
            , [
                'email' => 'trainee3@gmail.com',
                'password' => bcrypt('Golpik123@'),
                'name' => 'trainee003',
                'is_confirmed' => '1',
                'email_verified_at'=> now(),
                'approved' => '1',
                'status' => 'approved',
                'role_id' => '3',
                'experience' => ''
            ]
            , [
                'email' => 'trainee4@gmail.com',
                'password' => bcrypt('Golpik123@'),
                'name' => 'trainee004',
                'is_confirmed' => '1',
                'email_verified_at'=> now(),
                'approved' => '1',
                'status' => 'approved',
                'role_id' => '3',
                'experience' => ''
            ]
            , [
                'email' => 'trainee5@gmail.com',
                'password' => bcrypt('Golpik123@'),
                'name' => 'trainee005',
                'is_confirmed' => '1',
                'email_verified_at'=> now(),
                'approved' => '1',
                'status' => 'approved',
                'role_id' => '3',
                'experience' => ''
            ]
            , [
                'email' => 'trainee6@gmail.com',
                'password' => bcrypt('Golpik123@'),
                'name' => 'trainee006',
                'is_confirmed' => '1',
                'email_verified_at'=> now(),
                'approved' => '1',
                'status' => 'approved',
                'role_id' => '3',
                'experience' => ''
            ]


        ]);
    }
}
