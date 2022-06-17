<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChargesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        for_trainer','for_admin
        DB::Table('charges')->insert([
//            1
            [
                'location' => '1',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
            [
                'location' => '1',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',
            ],

//            2
            [
                'location' => '2',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '2',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            3
            [
                'location' => '3',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '3',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            4
            [
                'location' => '4',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '4',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            5
            [
                'location' => '5',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '5',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            6
            [
                'location' => '6',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '6',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            7
            [
                'location' => '7',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '7',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            8
            [
                'location' => '8',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '8',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            9
            [
                'location' => '9',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '9',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//             10
            [
                'location' => '10',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '10',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//             11
            [
                'location' => '11',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '11',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//             12
            [
                'location' => '12',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '12',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            13
            [
                'location' => '13',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '13',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            14
            [
                'location' => '14',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '14',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            15
            [
                'location' => '15',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '15',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            16
            [
                'location' => '16',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '16',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            17
            [
                'location' => '17',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '17',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            18
            [
                'location' => '18',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '18',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            19
            [
                'location' => '19',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '19',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            20
            [
                'location' => '20',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '20',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            21

            [
                'location' => '21',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '21',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            22
            [
                'location' => '22',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '22',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            23
            [
                'location' => '23',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '23',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            24
            [
                'location' => '24',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '24',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            25
            [
                'location' => '25',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '25',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            26
            [
                'location' => '26',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '26',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            27
            [
                'location' => '27',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '27',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            28
            [
                'location' => '28',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '28',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            29
            [
                'location' => '29',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '29',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            30
            [
                'location' => '30',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '30',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            31
            [
                'location' => '31',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '31',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            32
            [
                'location' => '32',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '32',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            33
            [
                'location' => '33',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '33',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            34
            [
                'location' => '34',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '34',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            35
            [
                'location' => '35',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '35',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            36
            [
                'location' => '36',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '36',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            37
            [
                'location' => '37',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '37',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            38
            [
                'location' => '38',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '38',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            39
            [
                'location' => '39',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '39',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            40
            [
                'location' => '40',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '40',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            41
            [
                'location' => '41',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '41',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            42
            [
                'location' => '42',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '42',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            43
            [
                'location' => '43',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '43',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            44
            [
                'location' => '44',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '44',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            45
            [
                'location' => '45',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '45',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            46
            [
                'location' => '46',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '46',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            47
            [
                'location' => '47',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '47',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            48
            [
                'location' => '48',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '48',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            49
            [
                'location' => '49',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '49',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            50
            [
                'location' => '50',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '50',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//51
            [
                'location' => '51',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '51',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//    52
            [
                'location' => '52',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '52',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//        53
            [
                'location' => '53',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '53',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//           54
            [
                'location' => '54',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '54',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            55
            [
                'location' => '55',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '55',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            56
            [
                'location' => '56',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],

            [
                'location' => '56',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            57
            [
                'location' => '57',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '57',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            58
            [
                'location' => '58',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '58',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            59
            [
                'location' => '59',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '59',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            60
            [
                'location' => '60',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '60',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            61
            [
                'location' => '61',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '61',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            62
            [
                'location' => '62',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '62',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//    63
            [
                'location' => '63',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '63',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            64
            [
                'location' => '64',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '64',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            65
            [
                'location' => '65',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '65',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            66
            [
                'location' => '66',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '66',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            67
            [
                'location' => '67',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '67',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            68
            [
                'location' => '68',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '68',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            69
            [
                'location' => '69',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '69',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            70
            [
                'location' => '70',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '70',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            71
            [
                'location' => '71',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '71',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            72
            [
                'location' => '72',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '72',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            73
            [
                'location' => '73',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '73',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            74
            [
                'location' => '74',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '74',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            75
            [
                'location' => '75',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '75',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            76
            [
                'location' => '76',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '76',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            77
            [
                'location' => '77',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '77',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            78
            [
                'location' => '78',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '78',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//    79
            [
                'location' => '79',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '79',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            80
            [
                'location' => '80',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '80',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            81
            [
                'location' => '81',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '81',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            82
            [
                'location' => '82',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '82',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            83
            [
                'location' => '83',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '83',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            84
            [
                'location' => '84',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '84',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            85
            [
                'location' => '85',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '85',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            86
            [
                'location' => '86',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '86',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            87
            [
                'location' => '87',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '87',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            88
            [
                'location' => '88',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '88',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            89
            [
                'location' => '89',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '89',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            90
            [
                'location' => '90',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '90',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            91
            [
                'location' => '91',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '91',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            92
            [
                'location' => '92',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '92',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            93
            [
                'location' => '93',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '93',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            94
            [
                'location' => '94',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '94',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            95
            [
                'location' => '95',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '95',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            96
            [
                'location' => '96',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '96',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            97
            [
                'location' => '97',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '97',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            98
            [
                'location' => '98',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '98',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            99
            [
                'location' => '99',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '99',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            100
            [
                'location' => '100',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '100',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//             101
            [
                'location' => '101',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '101',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            102
            [
                'location' => '102',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '102',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            103
            [
                'location' => '103',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '103',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            104
            [
                'location' => '104',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '104',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            105
            [
                'location' => '105',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '105',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            106
            [
                'location' => '106',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '106',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            107
            [
                'location' => '107',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '107',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            108
            [
                'location' => '108',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '108',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            109
            [
                'location' => '109',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '109',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            110
            [
                'location' => '110',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '110',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            111
            [
                'location' => '111',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '111',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            112
            [
                'location' => '112',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '112',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            113
            [
                'location' => '113',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '113',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            114
            [
                'location' => '114',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '114',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            115
            [
                'location' => '115',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '115',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            116
            [
                'location' => '116',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '116',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            117
            [
                'location' => '117',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '117',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            118
            [
                'location' => '118',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '118',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            119
            [
                'location' => '119',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '119',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            120
            [
                'location' => '120',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '120',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            121
            [
                'location' => '121',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '121',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            122
            [
                'location' => '122',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '122',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            123
            [
                'location' => '123',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '123',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            124
            [
                'location' => '124',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '124',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            125
            [
                'location' => '125',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '125',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            126
            [
                'location' => '126',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '126',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            127
            [
                'location' => '127',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '127',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            128
            [
                'location' => '128',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '128',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            129
            [
                'location' => '129',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '129',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            130
            [
                'location' => '130',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '130',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            131
            [
                'location' => '131',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '131',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            132
            [
                'location' => '132',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '132',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            133
            [
                'location' => '133',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '133',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            134
            [
                'location' => '134',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '134',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            135
            [
                'location' => '135',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '135',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            136
            [
                'location' => '136',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '136',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            137
            [
                'location' => '137',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '137',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            138
            [
                'location' => '138',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '138',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            139
            [
                'location' => '139',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '139',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            140
            [
                'location' => '140',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '140',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            141
            [
                'location' => '141',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '141',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            142
            [
                'location' => '142',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '142',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            143
            [
                'location' => '143',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '143',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            144
            [
                'location' => '144',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '144',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            145
            [
                'location' => '145',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '145',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            146
            [
                'location' => '146',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '146',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            147
            [
                'location' => '147',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '147',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            148
            [
                'location' => '148',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '148',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            149
            [
                'location' => '149',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '149',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            150
            [
                'location' => '150',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '150',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            151
            [
                'location' => '151',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '151',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            152
            [
                'location' => '152',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '152',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            153
            [
                'location' => '153',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '153',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            154
            [
                'location' => '154',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '154',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            155
            [
                'location' => '155',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '155',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            156
            [
                'location' => '156',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '156',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            157
            [
                'location' => '157',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '157',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            158
            [
                'location' => '158',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '158',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            159
            [
                'location' => '159',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '159',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            160
            [
                'location' => '160',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '160',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            161
            [
                'location' => '161',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '161',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            162
            [
                'location' => '162',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '162',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            163
            [
                'location' => '163',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '163',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            164
            [
                'location' => '164',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '164',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            165
            [
                'location' => '165',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '165',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            166
            [
                'location' => '166',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '166',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            167
            [
                'location' => '167',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '167',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            168
            [
                'location' => '168',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '168',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            169
            [
                'location' => '169',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '169',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            170
            [
                'location' => '170',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '170',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            171
            [
                'location' => '171',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '171',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            172
            [
                'location' => '172',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '172',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//        173
            [
                'location' => '173',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '173',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            174
            [
                'location' => '174',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '174',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            175
            [
                'location' => '175',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '175',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            176
            [
                'location' => '176',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '176',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            177
            [
                'location' => '177',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '177',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            178
            [
                'location' => '178',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '178',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            179
            [
                'location' => '179',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '179',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            180
            [
                'location' => '180',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '180',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            181
            [
                'location' => '181',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '181',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            182
            [
                'location' => '182',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '182',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            183
            [
                'location' => '183',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '183',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            184
            [
                'location' => '184',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '184',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            185
            [
                'location' => '185',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '185',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            186
            [
                'location' => '186',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '186',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            187
            [
                'location' => '187',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '187',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            188
            [
                'location' => '188',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '188',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            189
            [
                'location' => '189',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '189',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            190
            [
                'location' => '190',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '190',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            191
            [
                'location' => '191',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '191',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            192
            [
                'location' => '192',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '192',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            193
            [
                'location' => '193',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '193',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            194
            [
                'location' => '194',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '194',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            195
            [
                'location' => '195',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '195',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            196
            [
                'location' => '196',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '196',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            197
            [
                'location' => '197',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '197',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            198
            [
                'location' => '198',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '198',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            199
            [
                'location' => '199',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '199',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            200
            [
                'location' => '200',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '200',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            201
            [
                'location' => '201',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '201',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            202
            [
                'location' => '202',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '202',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            203
            [
                'location' => '203',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '203',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            204
            [
                'location' => '204',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '204',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            205
            [
                'location' => '205',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '205',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            206
            [
                'location' => '206',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '206',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            207
            [
                'location' => '207',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '207',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            208
            [
                'location' => '208',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '208',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            209
            [
                'location' => '209',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '209',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            210
            [
                'location' => '210',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '210',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            211
            [
                'location' => '211',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '211',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            212
            [
                'location' => '212',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '212',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            213
            [
                'location' => '213',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '213',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            214
            [
                'location' => '214',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '214',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            215
            [
                'location' => '215',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '215',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            216
            [
                'location' => '216',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '216',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            217
            [
                'location' => '217',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '217',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            218
            [
                'location' => '218',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '218',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            219
            [
                'location' => '219',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '219',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            220
            [
                'location' => '220',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '220',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            221
            [
                'location' => '221',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '221',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],
//            222
            [
                'location' => '222',
                'user_type' => 'for_admin',
                'one_on_1_training_charge' => '10',
                'one_on_1_training_charge_sales_tax' => '1.3',
                'two_on_1_training_charge' => '20',
                'two_on_1_training_charge_sales_tax' => '2.6',

            ],
            [
                'location' => '222',
                'user_type' => 'for_trainer',
                'one_on_1_training_charge' => '40',
                'one_on_1_training_charge_sales_tax' => '5.20',
                'two_on_1_training_charge' => '80',
                'two_on_1_training_charge_sales_tax' => '10.40',
            ],

        ]);
    }
}
