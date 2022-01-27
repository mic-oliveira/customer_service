<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "status" => $this->status->name,
            "birthdate" => $this->birthdate,
            "addresses" => AddressResource::collection($this->addresses ?? []),
            "documents" => DocumentResource::collection($this->documents ?? []),
            "metadata" => $this->metadata ?? [],
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
