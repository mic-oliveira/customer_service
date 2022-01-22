<?php

namespace App\Actions\Person;

use App\Models\Person;
use Lorisleiva\Actions\Concerns\AsAction;

class FindPerson
{
    use AsAction;

    public function handle(int|string $id)
    {
        return Person::findOrFail($id);
    }
}
