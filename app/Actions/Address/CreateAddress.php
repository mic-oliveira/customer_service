<?php

namespace App\Actions\Address;

use App\Models\Address;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateAddress
{
    use AsAction;
    
    public function __construct(private Address $address)
    {
    }

    public function handle(array $address): Address
    {
        $createdAddress = new Address();
        $createdAddress->fill($address)->saveOrFail();
        return $createdAddress;
    }
}
