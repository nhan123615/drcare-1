<?php

namespace Database\Seeders;

use App\Models\DiseaseType;
use Database\Factories\TestingFactory;
use Illuminate\Database\Seeder;



use App\Models\admin\appointment;
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
        $this->call([
            DiseaseTypeSeeder::class,
            DoctorTypeSeeder::class,
            CategorySeeder::class
        ]);
        appointment::factory(20)->create();
    }
}
