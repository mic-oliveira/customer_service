<?php

namespace App\Actions\Person;

use App\Models\Person;
use Illuminate\Contracts\Pagination\Paginator;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PaginatePeople
{
    use AsAction;

    public function handle(): Paginator
    {
        return QueryBuilder::for(Person::class)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::partial('document', 'documents.document')
            ])
            ->orderBy('name')
            ->with(['addresses', 'addresses.neighborhood', 'addresses.neighborhood.city', 'documents']
            )->simplePaginate();
    }
}
