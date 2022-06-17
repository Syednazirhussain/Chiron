<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_schedules')->insert([
            ['time' => ' 06:00 AM'],
            ['time' => ' 07:00 AM'],
            ['time' => ' 08:00 AM'],
            ['time' => ' 09:00 AM'],
            ['time' => ' 10:00 AM'],
            ['time' => ' 11:00 AM'],
            ['time' => ' 12:00 PM'],
            ['time' => ' 01:00 PM'],
            ['time' => ' 02:00 PM'],
            ['time' => ' 03:00 PM'],
        ]);
    }
}
