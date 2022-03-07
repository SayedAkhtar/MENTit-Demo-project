<?php

namespace Database\Seeders;

use App\Models\Todo;
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
        $faker = \Faker\Factory::create();
        for($i=0; $i<10; $i++){
            Todo::create([
                'name' => $faker->sentence(5),
            ]);
        }
    }
}
