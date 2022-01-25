<?php

namespace App\Actions\Document;

use App\Models\Document;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateDocument
{
    use AsAction;


    public function __construct(private Document $document)
    {
    }

    public function handle(array $document): Document
    {
        $createdDocument = new Document();
        $createdDocument->fill($document)->saveOrFail();
        return $createdDocument->refresh();
    }
}
