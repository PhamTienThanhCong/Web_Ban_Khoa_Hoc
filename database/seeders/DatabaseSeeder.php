<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin;
use Database\Factories\AdminFactory;

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
        admin::factory(50)->create();
    }
}
