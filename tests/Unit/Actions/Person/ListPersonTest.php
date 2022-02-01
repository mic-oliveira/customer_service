<?php

namespace Tests\Unit\Actions\Person;

use App\Actions\Person\PaginatePeople;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListPersonTest extends TestCase
{
    use RefreshDatabase;

    public function test_shold_list_people()
    {
        Person::factory()->count(3)->create();
        $result = PaginatePeople::run();
        $this->assertCount(3, $result);
    }
}
