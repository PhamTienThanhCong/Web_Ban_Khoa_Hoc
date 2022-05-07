<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_admin' => $this->faker->numberBetween(2,50),
            'name' => $this->faker->name(),
            // 'image' => $this->faker->imageUrl(640,480,'cats',true,null,false),
            'image' => "1651426015.jpg",
            'price' => $this->faker->numberBetween(50000, 1000000),
            'type' => $this->faker->numberBetween(1,2),
            'description' => $this->faker->paragraph(4,true),
        ];
    }
}
