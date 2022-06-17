<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        pending', 'approved', 'cancelled
        DB::table('reviews')->insert([
            [
                'user_id' => '6',
                'trainer_id' => '2',
                'rating' => '2',
                'comments' => 'Below Average',
                'status' => 'pending'
            ],
            [
                'user_id' => '6',
                'trainer_id' => '3',
                'rating' => '3',
                'comments' => 'Average',
                'status' => 'approved'
            ],
            [
                'user_id' => '6',
                'trainer_id' => '4',
                'rating' => '5',
                'comments' => 'Excellent',
                'status' => 'pending'
            ],
            [
                'user_id' => '7',
                'trainer_id' => '2',
                'rating' => '5',
                'comments' => 'Excellent',
                'status' => 'approved'
            ],
            [
                'user_id' => '7',
                'trainer_id' => '3',
                'rating' => '2',
                'comments' => 'Below Average',
                'status' => 'pending'
            ],
            [
                'user_id' => '7',
                'trainer_id' => '4',
                'rating' => '4',
                'comments' => 'Above Average',
                'status' => 'pending'
            ],
            [
                'user_id' => '8',
                'trainer_id' => '2',
                'rating' => '5',
                'comments' => 'Excellent',
                'status' => 'pending'
            ],
            [
                'user_id' => '8',
                'trainer_id' => '3',
                'rating' => '4',
                'comments' => 'Above Average',
                'status' => 'approved'
            ],
            [
                'user_id' => '8',
                'trainer_id' => '4',
                'rating' => '3',
                'comments' => 'Average',
                'status' => 'cancelled'
            ],
            [
                'user_id' => '9',
                'trainer_id' => '2',
                'rating' => '5',
                'comments' => 'Excellent',
                'status' => 'pending'
            ],
            [
                'user_id' => '9',
                'trainer_id' => '3',
                'rating' => '2',
                'comments' => 'Below Average',
                'status' => 'cancelled'
            ],
            [
                'user_id' => '9',
                'trainer_id' => '4',
                'rating' => '1',
                'comments' => 'Above Average',
                'status' => 'approved'
            ],
            [
                'user_id' => '10',
                'trainer_id' => '2',
                'rating' => '2',
                'comments' => 'Below Average',
                'status' => 'pending'
            ],
            [
                'user_id' => '10',
                'trainer_id' => '3',
                'rating' => '3',
                'comments' => 'Average',
                'status' => 'pending'
            ],
            [
                'user_id' => '10',
                'trainer_id' => '4',
                'rating' => '4',
                'comments' => 'Above Average',
                'status' => 'cancelled'
            ],
        ]);
    }
}
