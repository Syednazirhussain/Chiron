<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([
//             admin
            [
                'user_id' => '1',
                'address' => 'USA Admin',
                'country_id' => '10',
                'state_id' => '3924',
                'postal_code' => '42815',
                'location' => 'myLocation',
                'training_session' => '1 on 1',
                'status' => '1'
            ],
//             trainer
            [
                'user_id' => '2',
                'address' => 'USA trainer',
                'country_id' => '10',
                'state_id' => '3924',
                'postal_code' => '46907',
                'location' => 'clientlocation',
                'training_session' => '1 on 1',
                'status' => '1'
            ],
            [
                'user_id' => '3',
                'address' => 'united kingdom trainer',
                'country_id' => '12',
                'state_id' => '3866',
                'postal_code' => '42218',
                'location' => 'myLocation',
                'training_session' => '1 on 1',
                'status' => '1'
            ],
            [
                'user_id' => '4',
                'address' => 'united kingdom trainer',
                'country_id' => '12',
                'state_id' => '3927',
                'postal_code' => '43480',
                'location' => 'clientlocation',
                'training_session' => '1 on 1',
                'status' => '1'
            ],
            //            trainee

            [
                'user_id' => '5',
                'address' => 'USA trainee',
                'country_id' => '15',
                'state_id' => '3924',
                'postal_code' => '42815',
                'location' => 'myLocation',
                'training_session' => '2 on 1',
                'status' => '1'
            ],
            [
                'user_id' => '6',
                'address' => 'USA trainee',
                'country_id' => '15',
                'state_id' => '3924',
                'postal_code' => '42815',
                'location' => 'clientlocation',
                'training_session' => '2 on 1',
                'status' => '1'
            ],
            [
                'user_id' => '7',
                'address' => 'united kingdom trainee',
                'country_id' => '17',
                'state_id' => '3866',
                'postal_code' => '42218',
                'location' => 'myLocation',
                'training_session' => '1 on 1',
                'status' => '1'
            ],
            [
                'user_id' => '8',
                'address' => 'united kingdom trainee',
                'country_id' => '17',
                'state_id' => '3866',
                'postal_code' => '42218',
                'location' => 'clientlocation',
                'training_session' => '2 on 1',
                'status' => '1'
            ],
            [
                'user_id' => '9',
                'address' => 'united kingdom trainee',
                'country_id' => '18',
                'state_id' => '3927',
                'postal_code' => '43480',
                'location' => 'myLocation',
                'training_session' => '1 on 1',
                'status' => '1'
            ],
            [
                'user_id' => '10',
                'address' => 'united kingdom trainee',
                'country_id' => '18',
                'state_id' => '3927',
                'postal_code' => '43480',
                'location' => 'clientlocation',
                'training_session' => '2 on 1',
                'status' => '1'
            ]
        ]);
    }
}
