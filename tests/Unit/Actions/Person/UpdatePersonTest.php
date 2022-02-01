<?php

namespace Tests\Unit\Actions\Person;

use App\Actions\Person\UpdatePerson;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdatePersonTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_update_person()
    {
        $id = Person::factory()->create()->id;
        $updatedPerson = UpdatePerson::run(['name' => 'Marmota Mota'], $id);
        $this->assertEquals('Marmota Mota', $updatedPerson->name);
    }
}
