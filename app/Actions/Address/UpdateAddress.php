<?php

namespace App\Actions\Address;

use App\Models\Address;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateAddress
{
    use AsAction;

    public function handle(array $address, $id)
    {
        $updatedAddress = Address::findOrFail($id);
        $updatedAddress->fill($address);
        $updatedAddress->save();
        return $updatedAddress->refresh();
    }
}