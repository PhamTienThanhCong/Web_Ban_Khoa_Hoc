<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('vi_VN');
        for ($i = 3001; $i < 5001; $i++) {
            // $check = $faker->numberBetween(10,20);
            // if ($check % 2 == 0){
            //     $check = 1;
            //     $kq = " Câu Đúng";
            // }else{
            //     $check = 0;
            //     $kq = " Câu Sai";
            // }
            DB::table('answers')->insert([
                'questions_id' => $i,
                'answer' => "là: ".$faker->name() . " Câu sai",
                'check' => 0,
            ]);
        }
    }
}
