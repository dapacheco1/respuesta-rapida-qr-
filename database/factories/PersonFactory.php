<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
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
            'dni' => rand(1000000000,999999999),
            'names' =>$this->faker->firstName(),
            'lastnames' => $this->faker->lastName(),
            'address'=>$this->faker->address(),
            'phoneNumber'=>$this->faker->phoneNumber(),
            'status' => $this->faker->randomElement($status),
        ];
    }
}
