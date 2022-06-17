<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([

            ['name' => 'Barrie', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Belleville', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Brampton', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Brant', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Brantford', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Brockville', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Burlington', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Cambridge', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Clarence-Rockland', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Cornwall', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Dryden', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Elliot Lake', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Greater Sudbury', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Guelph', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Haldimand County', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Hamilton', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Kawartha Lakes', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Kenora', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Kingston', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Kitchener', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'London', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Markham', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Mississauga', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Niagara Falls', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Norfolk County', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'North Bay', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Orillia', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Oshawa', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Ottawa', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Owen Sound', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Pembroke', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Peterborough', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Pickering', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Port Colborne', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Prince Edward County', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Quinte West', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Richmond Hill', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Sarnia', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Sault Ste. Marie', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'St. Catharines', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'St. Thomas', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Stratford', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Temiskaming Shores', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Thorold', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Thunder Bay', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Timmins', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Toronto', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Vaughan', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Welland', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Windsor', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
            ['name' => 'Woodstock', 'iso_code2' => 'AF', 'iso_code3' => 'AFG', 'num_code' => '004'],
        ]);

    }
}



