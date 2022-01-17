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
            'number' => $this->faker->numerify('############'),
            'type' => $this->faker->numberBetween(1,3),
            'emisison_date' => $this->faker->date(null, '-10 years'),
            'verified' => false,
        ];
    }
}
