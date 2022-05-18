<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin;
use App\Models\user;
use App\Models\course;
use App\Models\lesson;
use App\Models\order;
use App\Models\question;

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
        // admin::factory(70)->create();
        // user::factory(1200)->create();
        // lesson::factory(1000)->create();
        // question::factory(2000)->create();
        // order::factory(2000)->create();
        $this->call([
            // QuestionSeeder::class,
            // ResultSeeder::class,
            // AnswerSeeder::class,
            // ViewHistorySeeder::class,
        ]);
    }
}
