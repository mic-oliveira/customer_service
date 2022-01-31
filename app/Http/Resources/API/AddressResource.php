<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "public_place" => $this->public_place,
            "address_type" => $this->address_type,
            "number" => $this->number,
            "complement" => $this->complement,
            "zipcode" => $this->zipcode,
            "neighborhood" => $this->neighborhood->name,
            "neighborhood_id" => $this->neighborhood_id,
            "city" => $this->neighborhood->city->name,
            "state" => $this->neighborhood->city->state->name
        ];
    }
}
