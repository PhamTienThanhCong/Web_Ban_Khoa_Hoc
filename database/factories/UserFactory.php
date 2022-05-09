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
            'name' => $this->faker->firstName() ." ". $this->faker->lastName(),
            'email' => $this->faker->email(),
            'password' => Hash::make('cong'),
            'token' => bin2hex(random_bytes(16)),
        ];
    }
}
