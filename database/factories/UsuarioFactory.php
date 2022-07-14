<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
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
            'person_id'=>rand(1,10),
            'rol_id'=>rand(1,3),
            'username' =>$this->faker->userName(),
            'password'=>bcrypt('123'),
            'email' => $this->faker->email(),
            'status' => $this->faker->randomElement($status)
        ];
    }
}
