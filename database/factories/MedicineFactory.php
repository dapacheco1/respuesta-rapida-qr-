<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['I','A'];
        return [
            'name' => $this->faker->sentence(2),
            'dose' => rand(1,200),
            'status' => $this->faker->randomElement($status),
        ];
    }
}
