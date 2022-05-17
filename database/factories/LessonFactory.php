<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'courses_id' => $this->faker->numberBetween(1,201),
            'name' => "Bài học: " . $this->faker->name(),
            'link' => "https://www.youtube.com/embed/8IoM_IjH6BQ",
            'description' => $this->faker->address(), 
        ];
    }
}
