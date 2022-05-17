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
            'name' => $this->faker->firstName() ." ". $this->faker->lastName(),
            'email' => $this->faker->email(),
            'description' => $this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'password' => Hash::make('cong'),
            'token' => bin2hex(random_bytes(16)),
            'lever' => $this->faker->boolean(),
        ];
    }
}
