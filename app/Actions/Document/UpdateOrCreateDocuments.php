<?php

namespace App\Actions\Document;

use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrCreateDocuments
{
    use AsAction;

    public function handle(array $documents, int|string $person_id): Collection
    {
        $createdOrUpdatedDocuments = collect();
        foreach ($documents as $document) {
            $createdOrUpdatedDocuments->add(
                UpdateOrCreateDocument::run(
                    array_merge($document, ['person_id' => $person_id]),
                    $document['id'] ?? null
                )
            );
        }
        return $createdOrUpdatedDocuments;
    }
}