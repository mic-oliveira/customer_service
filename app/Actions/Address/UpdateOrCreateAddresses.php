<?php

namespace App\Actions\Address;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrCreateAddresses
{
    use AsAction;

    public function handle(array $addresses, string|int $person_id)
    {
        $createdOrUpdatedAddresses = collect();
        foreach ($addresses as $address) {
            $createdOrUpdatedAddresses->add(
                UpdateOrCreateAddress::run(array_merge($address, ['person_id' => $person_id]), $address['id'] ?? null)
            );
        }
    }
}