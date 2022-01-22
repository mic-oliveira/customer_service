<?php

namespace App\Actions\Person;

use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class ListPeople
{
    use AsAction;

    public function handle(): Collection|array
    {
        return Person::with(['addresses', 'addresses.neighborhood', 'addresses.neighborhood.city', 'documents'])->get();
    }
}
