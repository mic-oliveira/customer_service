<?php

namespace Tests\Unit\Actions\Person;

use App\Actions\Person\PaginatePeople;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaginatePersonTest extends TestCase
{
    use RefreshDatabase;

    public function test_shold_list_people()
    {
        Person::factory()->count(3)->create();
        $result = PaginatePeople::run();
        $this->assertCount(3, $result);
        $this->assertArrayHasKey('name', $result[0]);
    }

    public function test_should_has_no_listed_people()
    {
        $result = PaginatePeople::run();
        $this->assertCount(0, $result);
    }
}
