<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingSessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('training_sessions')->insert([
            [
                'trainee_id' => '5',
                'trainer_id' => '2',
                'date' => date('Y-m-d H:i:s'),
                'start_time' => '06:00AM',
                'training_session' => '06:00AM',
                'location' => 'USA trainer',
                'status' => 'pending',
                'payment_id' => 1,
                'payable_amount' => 58.33,
                'training_session'=>"1 on 1"
            ],
            [
                'trainee_id' => '2',
                'trainer_id' => '2',
                'date' => date('Y-m-d H:i:s'),
                'start_time' => '06:00AM',
                'training_session' => '06:00AM',
                'location' => 'USA trainer',
                'status' => 'pending',
                'payment_id' => 2,
                'payable_amount' => 116.67,
                'training_session'=>"2 on 1"
            ],
            [
                'trainee_id' => '7',
                'trainer_id' => '2',
                'date' => date('Y-m-d H:i:s'),
                'start_time' => '06:00AM',
                'training_session' => '06:00AM',
                'location' => 'USA trainer',
                'status' => 'pending',
                'payment_id' => 3,
                'payable_amount' => 58.33,
                'training_session'=>"1 on 1"
            ],
            [
                'trainee_id' => '5',
                'trainer_id' => '2',
                'date' => date('Y-m-d H:i:s'),
                'start_time' => '06:00AM',
                'training_session' => '06:00AM',
                'location' => 'USA trainer',
                'status' => 'pending',
                'payment_id' => 4,
                'payable_amount' => 58.33,
                'training_session'=>"1 on 1"
            ],

            [
                'trainee_id' => '5',
                'trainer_id' => '2',
                'date' => date('Y-m-d H:i:s'),
                'start_time' => '06:00AM',
                'training_session' => '06:00AM',
                'location' => 'USA trainer',
                'status' => 'pending',
                'payment_id' => 5,
                'payable_amount' => 58.33,
                'training_session'=>"1 on 1"
            ],
            [
                'trainee_id' => '5',
                'trainer_id' => '2',
                'date' => date('Y-m-d H:i:s'),
                'start_time' => '06:00AM',
                'training_session' => '06:00AM',
                'location' => 'USA trainer',
                'status' => 'pending',
                'payment_id' => 6,
                'payable_amount' => 58.33,
                'training_session'=>"1 on 1"
            ],
            [
                'trainee_id' => '5',
                'trainer_id' => '2',
                'date' => date('Y-m-d H:i:s'),
                'start_time' => '06:00AM',
                'training_session' => '06:00AM',
                'location' => 'USA trainer',
                'status' => 'pending',
                'payment_id' => 7,
                'payable_amount' => 58.33,
                'training_session'=>"1 on 1"
            ],
            [
                'trainee_id' => '5',
                'trainer_id' => '2',
                'date' => date('Y-m-d H:i:s'),
                'start_time' => '06:00AM',
                'training_session' => '06:00AM',
                'location' => 'USA trainer',
                'status' => 'pending',
                'payment_id' => 8,
                'payable_amount' => 58.33,
                'training_session'=>"1 on 1"
            ],

            [
                'trainee_id' => '5',
                'trainer_id' => '2',
                'date' => date('Y-m-d H:i:s'),
                'start_time' => '06:00AM',
                'training_session' => '06:00AM',
                'location' => 'USA trainer',
                'status' => 'pending',
                'payment_id' => 9,
                'payable_amount' => 58.33,
                'training_session'=>"1 on 1"
            ],
            [
                'trainee_id' => '5',
                'trainer_id' => '2',
                'date' => date('Y-m-d H:i:s'),
                'start_time' => '06:00AM',
                'training_session' => '06:00AM',
                'location' => 'USA trainer',
                'status' => 'pending',
                'payment_id' => 10,
                'payable_amount' => 58.33,
                'training_session'=>"1 on 1"
            ],

        ]);
    }
}
