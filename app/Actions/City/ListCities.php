<?php

namespace App\Actions\City;

use App\Models\City;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListCities
{
    use AsAction;

    public function handle()
    {
        return QueryBuilder::for(City::class)
            ->allowedFilters([
                AllowedFilter::partial('name')
            ])
            ->orderBy('name')
            ->simplePaginate();
    }
}
