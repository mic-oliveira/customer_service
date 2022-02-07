<?php

namespace App\Actions\Address;

use App\Actions\Neighborhood\CreateNeighborhood;
use App\Models\Address;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrCreateAddress
{
    use AsAction;

    public function handle(array $address, string|int $address_id = null): Address
    {
        try {
            $neighborhood = CreateNeighborhood::run($address['neighborhood']);
            $address = array_merge($address, ['neighborhood_id' => $neighborhood->id]);
            return match (empty($address_id)) {
                true => CreateAddress::run($address),
                false => UpdateAddress::run($address, $address_id)
            };
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
