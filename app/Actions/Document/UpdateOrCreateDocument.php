<?php

namespace App\Actions\Document;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdateOrCreateDocument
{
    use AsAction;

    public function handle(array $document, int|string $document_id)
    {
        return match (empty($document_id)) {
            true => CreateDocument::run($document),
            false => UpdateDocument::run($document, $document_id),
        };
    }
}
