<?php

namespace App\Actions\Person;

use App\Models\Person;
use Lorisleiva\Actions\Concerns\AsAction;

class CreatePersonAction
{
    use AsAction;

    public function __construct(private Person $person)
    {
    }

    public function handle(array $data): Person
    {
        $person = $this->person->fill($data);
        $person->save();
        return $person;
    }
}
