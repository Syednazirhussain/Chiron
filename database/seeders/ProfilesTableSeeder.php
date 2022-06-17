<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
//          trainer','trainee
            [
                'user_id' => '2',
                'user_type' => 'trainer',
                'about' => 'hey I am a trainer',
                'specialties' => '["Gym","Sports"]',
                'insta' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://www.facebook.com/',
            ],
            [
                'user_id' => '3',
                'user_type' => 'trainer',
                'about' => 'hey I am a Sports trainer',
                'specialties' => '["Gym","Sports","Swimming","OutDoor Games"]',
                'insta' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://www.facebook.com/',
            ],
            [
                'user_id' => '4',
                'user_type' => 'trainer',
                'about' => 'hey I am a Swimming trainer',
                'specialties' => '["Gym","Sports","Swimming"]',
                'insta' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://www.facebook.com/',
            ],

            [
                'user_id' => '5',
                'user_type' => 'trainee',
                'about' => 'hey I am a Trainee I am here to learn',
                'specialties' => '["Sports"]',
                'insta' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://www.facebook.com/',
            ],
            [
                'user_id' => '6',
                'user_type' => 'trainee',
                'about' => 'hey I am a Trainee I am here to learn',
                'specialties' => '["Swimming"]',
                'insta' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://www.facebook.com/',
            ],
            [
                'user_id' => '7',
                'user_type' => 'trainee',
                'about' => 'hey I am a Trainee I am here to learn',
                'specialties' => '["Sports"]',
                'insta' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://www.facebook.com/',
            ],
            [
                'user_id' => '8',
                'user_type' => 'trainee',
                'about' => 'hey I am a Trainee I am here to learn',
                'specialties' => '["InDoor Sports"]',
                'insta' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://www.facebook.com/',
            ],
            [
                'user_id' => '9',
                'user_type' => 'trainee',
                'about' => 'hey I am a Trainee I am here to learn',
                'specialties' => '["Out Door Sports"]',
                'insta' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://www.facebook.com/',
            ],
            [
                'user_id' => '10',
                'user_type' => 'trainee',
                'about' => 'hey I am a Trainee I am here to learn',
                'specialties' => '["GYM"]',
                'insta' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'facebook' => 'https://www.facebook.com/',
            ],

        ]);
    }
}
