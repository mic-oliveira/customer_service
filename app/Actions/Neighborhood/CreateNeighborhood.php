<?php

namespace App\Actions\Neighborhood;

use App\Models\City;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateNeighborhood
{
    use AsAction;

    public function handle(array $data)
    {
        $city_id = $data['city_id'] ?? $data['city']['id'];
        $city = City::find($city_id);
        return $city->neighborhoods()->firstOrCreate(collect($data)->only(['name'])->toArray());
    }
}
