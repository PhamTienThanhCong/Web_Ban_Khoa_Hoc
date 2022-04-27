<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
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
            'password' => Hash::make('cong'),
            'token' => bin2hex(random_bytes(16)),
        ];
    }
}
