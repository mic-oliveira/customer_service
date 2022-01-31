<?php

namespace Database\Factories;

use App\Enums\PersonStatus;
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
        return [
            'name' => $this->faker->name(),
            'birthdate' => $this->faker->date(),
            'status' => PersonStatus::class,
        ];
    }
}
