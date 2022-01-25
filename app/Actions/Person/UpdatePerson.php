<?php

namespace App\Actions\Person;

use App\Actions\Address\UpdateOrCreateAddresses;
use App\Actions\Document\UpdateOrCreateDocuments;
use App\Models\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdatePerson
{
    use AsAction;


    public function __construct()
    {
    }

    public function handle(array $person, int|string $id)
    {
        DB::beginTransaction();
        try {
            $updatedPerson = Person::findOrFail($id);
            $updatedPerson->fill($person);
            $updatedPerson->saveOrFail();
            if (array_key_exists('addresses', $person)) {
                UpdateOrCreateAddresses::run($person['addresses'], $updatedPerson->id);
            }
            if (array_key_exists('documents', $person)) {
                UpdateOrCreateDocuments::run($person['documents'], $updatedPerson->id);
            }
            DB::commit();
            return $updatedPerson;
        } catch (\Throwable $exception) {
            DB::rollBack();
            Log::channel('daily')->error($exception);
            throw $exception;
        }
    }
}
