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
            'names'=>$this->faker->name(),
            'image' => '/storage/images/default.png',
            'identifier' => rand(150,210),
            'classification_id' =>rand(1,2),
            'status' => $this->faker->randomElement($status),
        ];
    }
}
