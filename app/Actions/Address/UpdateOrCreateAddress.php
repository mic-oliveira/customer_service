<?php

namespace App\Actions\Address;

use App\Models\Address;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrCreateAddress
{
    use AsAction;

    public function handle(array $address, string|int $address_id = null): Address
    {
        return match (empty($address_id)) {
            true => CreateAddress::run($address),
            false => UpdateAddress::run($address, $address_id)
        };
    }
}