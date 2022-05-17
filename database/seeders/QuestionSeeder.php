<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');
        for ($i = 1; $i < 3011; $i++) {
            if ($i % 2 == 0) {
                DB::table('questions')->insert([
                    'lessons_id' => $i,
                    'question' => $faker->name() . " ?",
                    'type' => 1,
                ]);
            }
        }
    }
}
