<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Admin',
                'created_at' => '2021-10-07 21:47:52',
                'updated_at' => NULL,
//                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Trainer',
                'created_at' => '2021-10-07 21:47:52',
                'updated_at' => NULL,
//                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Trainee',
                'created_at' => '2021-10-07 21:48:12',
                'updated_at' => NULL,
//                'deleted_at' => NULL,
            ),
        ));


    }
}
