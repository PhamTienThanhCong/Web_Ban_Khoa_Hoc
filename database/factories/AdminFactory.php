<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'image' => $this->faker->imageUrl(640,480,'cats',true,null,false),
            'description' => $this->faker->paragraph(3,true),
            'password' => Hash::make('cong'),
            'token' => bin2hex(random_bytes(16)),
            'lever' => $this->faker->boolean(),
        ];
    }
}
