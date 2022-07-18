<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DisappearedHasPersonsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'disappeared_id' => rand(1,5),
            'people_id' => rand(1,10)
        ];
    }
}
