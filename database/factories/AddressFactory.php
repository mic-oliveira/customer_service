<?php

namespace Database\Factories;

use App\Models\Neighborhood;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'public_place' => $this->faker->streetName(),
            'address_type' => $this->faker->numberBetween(1,5),
            'number' => $this->faker->numerify('####'),
            'complement' => $this->faker->word(),
            'zipcode' => $this->faker->postcode(),
            'neighborhood_id' => Neighborhood::factory()
        ];
    }
}
