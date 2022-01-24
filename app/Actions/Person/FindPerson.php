<?php

namespace App\Actions\Person;

use App\Models\Person;
use Lorisleiva\Actions\Concerns\AsAction;

class FindPerson
{
    use AsAction;

    public function handle(string|int $person_id)
    {
        return Person::with(['addresses', 'addresses.neighborhood', 'documents'])->findOrFail($person_id);
    }
}
