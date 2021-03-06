<?php

namespace App\Actions\Person;

use App\Actions\Address\CreateAddresses;
use App\Actions\Address\UpdateOrCreateAddresses;
use App\Actions\Document\UpdateOrCreateDocuments;
use App\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class CreatePerson
{
    use AsAction;

    public function __construct(private Person $person)
    {
    }

    public function handle(array $data): Builder|Model
    {
        DB::beginTransaction();
        try {
            $person = $this->person->fill($data);
            $person->saveOrFail();
            $person->refresh();
            UpdateOrCreateAddresses::run($data['addresses'] ?? [], $person->id);
            UpdateOrCreateDocuments::run($data['documents'] ?? [], $person->id);
            DB::commit();
            return FindPerson::run($person->id);
        } catch (\Throwable $exception) {
            DB::rollBack();
            Log::channel('daily')->error($exception);
            throw $exception;
        }
    }
}
