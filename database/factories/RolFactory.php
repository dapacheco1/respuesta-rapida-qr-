<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rols = ['Administrator','Guest','Client'];
        $status = ['I','A'];
        return [
            'name'=>$this->faker->randomElement($rols),
            'status' => $this->faker->randomElement($status)
        ];
    }
}
