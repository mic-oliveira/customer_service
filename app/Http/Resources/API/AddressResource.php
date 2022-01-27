<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            "public_place" => $this->public_place,
            "address_type" => $this->address_type,
            "number" => $this->number,
            "complement" => $this->complement,
            "zipcode" => $this->zipcode,
            "neighborhood" => $this->neighborhood->name,
            "city" => $this->neighborhood->city->city_name,
            "state" => $this->neighborhood->city->state->name
        ];
    }
}
