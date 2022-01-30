<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
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
            'id' => $this->id,
            'document' => $this->document,
            'type' => $this->type,
            'emission_date' => $this->emission_date,
            'verified' => $this->verified,
            'verified_at' => $this->verified_at,
        ];
    }
}
