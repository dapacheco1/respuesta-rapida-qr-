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
        \App\Models\Rol::factory(3)->create();
        \App\Models\Gender::factory(7)->create();
        \App\Models\Person::factory(10)->create();
        \App\Models\User::factory(10)->create();

        //BUSSINESS CORE
        \App\Models\Disease::factory(5)->create();
        \App\Models\Medicine::factory(5)->create();
        \App\Models\Classification::factory(2)->create();
    }
}
