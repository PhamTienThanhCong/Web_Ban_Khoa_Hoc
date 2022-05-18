<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id'      => $this->faker->numberBetween(1,1199),
            'courses_id'    => $this->faker->numberBetween(1,201),
            'price_buy'     => $this->faker->numberBetween(50000, 1000000),
            'rate'          => $this->faker->numberBetween(1, 5),
            'comment'       => $this->faker->name() . " đã mua và trải nghiệm",
        ];
    }
}
