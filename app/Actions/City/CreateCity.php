<?php

namespace App\Actions\City;

use App\Models\City;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateCity
{
    use AsAction;

    public function handle()
    {
        $c = new City();
    }
}
