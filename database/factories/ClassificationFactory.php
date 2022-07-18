<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['I','A'];
        $type = ['Persona','Mascota'];
        return [
            'type'=> $this->faker->randomElement($type),
            'status' =>$this->faker->randomElement($status)
        ];
    }
}
