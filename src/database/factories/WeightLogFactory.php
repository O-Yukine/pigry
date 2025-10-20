<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-3 month', 'now')->format('y-m-d'),
            'weight' => $this->faker->randomFloat(1, 40, 120),
            'calories' => $this->faker->numberBetween(0, 3000),
            'exercise_time' => $this->faker->time('H:i'),
            'exercise_content' => $this->faker->text()
        ];
    }
}
