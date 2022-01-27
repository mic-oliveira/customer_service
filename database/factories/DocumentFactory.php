<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'document' => $this->faker->numerify('############'),
            'type' => $this->faker->numberBetween(1, 3),
            'emission_date' => $this->faker->date('Y-m-d', '-10 years'),
            'verified' => false,
        ];
    }
}
