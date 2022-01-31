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
        
        $this->assertEquals($person->birthdate->format('Y-m-d'), $result->birthdate);
        $this->assertEquals($person->status, $result->status);
    }
}
