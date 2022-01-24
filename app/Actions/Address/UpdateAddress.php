<?php

namespace App\Actions\Address;

use App\Models\Address;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateAddress
{
    use AsAction;

    public function handle(array $address)
    {
        $updatedAddress = Address::where('person_id', $address['person_id'])->findOrFail($address['id']);
        $updatedAddress->fill($address);
        $updatedAddress->save();
        return $updatedAddress->refresh();
    }
}