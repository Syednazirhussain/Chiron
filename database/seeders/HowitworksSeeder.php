<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HowitworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('howitworks')->insert([
            [
                'title' => 'Create an Account',
                'file' => '',
                'description' => 'Prior to being authenticated to use the platform you will be required to submit certain documentation and complete a background check  ',
                'type' => 'Trainer',
                'status' => 'Active'
            ],
            [
                'title' => 'Setup Your Profile ',
                'file' => '',
                'description' => 'Here you will be able to create a profile for yourself that will allow you to tell others a little about yourself – what you specialize in, where you train, with what equipment, ideal working hours, if you’re willing to travel to your clients location and why you do what you do',
                'type' => 'Trainer',
                'status' => 'Active'
            ],
            [
                'title' => 'Start Using The Platform ',
                'file' => '',
                'description' => 'Prospective clients will be allowed to message you to establish a relationship in the first instance
You will have the ability to approve or reject bookings for time slots based on your personal availability ',
                'type' => 'Trainer',
                'status' => 'Active'
            ],
//             user steps
            [
                'title' => 'Create an Account ',
                'file' => '',
                'description' => 'Like most online platforms you will have to create an account by providing basic information to begin using the platform ',
                'type' => 'User',
                'status' => 'Active'
            ],
            [
                'title' => 'Search for Trainers and Communicate ',
                'file' => '',
                'description' => 'The platform allows you to search for trainers in your area and communicate with them so you can establish a relationship – this is by the far the most important step
Get to know one another, help the trainers understand your goals, discuss where trainings will be conducted and/or arrange a time to go check out the trainers equipment ',
                'type' => 'User',
                'status' => 'Active'
            ],
            [
                'title' => 'Book a Time ',
                'file' => '',
                'description' => 'Time slots can be booked in 1 hour increments for 1-on-1 training or 2-on-1 training at either the trainers location or your location – hourly rates are set by the platform based on location
After your session is done be sure to rate your trainer',
                'type' => 'User',
                'status' => 'Active'
            ],
        ]);
    }
}
