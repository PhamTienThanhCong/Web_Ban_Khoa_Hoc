<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');
        for ($i = 1; $i < 5001; $i++) {
            $total = $faker->numberBetween(10,20);
            $true = $faker->numberBetween(0,$total);
            $false = $total - $true;
            DB::table('results')->insert([
                'questions_id' => $i,
                'number_true' => $true,
                'number_false' => $false,
            ]);
        }
    }
}
