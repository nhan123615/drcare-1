<?php

namespace Database\Seeders;

use App\Models\DiseaseType;
use Database\Factories\TestingFactory;
use Illuminate\Database\Seeder;



use App\Models\admin\appointment;
/* use App\Models\Product; */
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
            CategorySeeder::class,
            ImageSeeder::class
        ]);
        appointment::factory(20)->create();
       /*  Product::factory(30)->create(); */
    }
}
