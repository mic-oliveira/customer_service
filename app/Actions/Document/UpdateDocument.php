<?php

namespace App\Actions\Document;

use App\Models\Document;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateDocument
{
    use AsAction;

    public function handle(array $document, int|string $document_id)
    {
        $updatedDocument = Document::findOrFail($document_id);
        $updatedDocument->fill($document)->saveOrFail();
        return $updatedDocument->refresh();
    }
}
