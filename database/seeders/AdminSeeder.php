<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'description' => Str::random(20),
            'token' => bin2hex(random_bytes(16)),
            'password' => Hash::make('password'),
        ]);
    }
}
