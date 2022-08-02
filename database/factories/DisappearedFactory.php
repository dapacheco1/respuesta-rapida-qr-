<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DisappearedFactory extends Factory
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
            'person_id'=>rand(1,5),
            'names'=>$this->faker->name(),
            'identifier' => rand(150,210),
            'status' => $this->faker->randomElement($status),
        ];
    }
}
