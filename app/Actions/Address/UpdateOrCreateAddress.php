<?php

namespace App\Actions\Address;

use App\Models\Address;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrCreateAddress
{
    use AsAction;

    public function handle(array $address): Address
    {
        return match (array_key_exists('id', $address)) {
            true => UpdateAddress::run($address),
            false => CreateAddress::run($address)
        };
    }
}