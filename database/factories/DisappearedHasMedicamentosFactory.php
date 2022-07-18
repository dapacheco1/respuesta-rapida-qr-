<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DisappearedHasMedicamentosFactory extends Factory
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
            'medicine_id' =>rand(1,5)
        ];
    }
}
