<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DisappearedHasDiseasesFactory extends Factory
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
            'disease_id' =>rand(1,5)
        ];
    }
}
