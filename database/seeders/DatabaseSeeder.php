<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(cmsPagesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(ChargesTableSeeder::class);
        $this->call(SessionTimingsSeeder::class);
        // $this->call(TrainingSessionsTableSeeder::class);
        // $this->call(UserPayments::class);
        $this->call(TimeScheduleTableSeeder::class);
        $this->call(FaqQuestionsSeeder::class);
        $this->call(HowitworksSeeder::class);
    }
}
