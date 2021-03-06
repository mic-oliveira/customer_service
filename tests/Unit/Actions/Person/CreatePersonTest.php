<?php

namespace Tests\Unit\Actions\Person;

use App\Actions\Person\CreatePerson;
use App\Enums\PersonStatus;
use App\Models\Person;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreatePersonTest extends TestCase
{
    use DatabaseMigrations;

    public function test_should_create_people()
    {
        $person = Person::factory()->state(['status' => PersonStatus::ACTIVE])->make();
        $result = CreatePerson::run($person->toArray());
        $this->assertEquals($person->name, $result->name);
        $this->assertEquals($person->birthdate, $result->birthdate);
        $this->assertEquals($person->status, $result->status);
        $this->assertDatabaseCount('people', 1);
    }

    public function test_should_not_create_people()
    {
        $this->expectException(\Exception::class);
        CreatePerson::run([]);
    }
}
