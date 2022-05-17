<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lessons_id' => $this->faker->numberBetween(1,3011),
            'question' => $this->faker->name() . " là ai ?",
            'type' => 2,
        ];
    }
}
