<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genders = ['F','M','L','G','B','T','I'];
        $status = ['I','A'];
        return [
            'name'=> $this->faker->randomElement($genders),
            'status' => $this->faker->randomElement($status)
        ];
    }
}
