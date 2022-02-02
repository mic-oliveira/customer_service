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
        $updatedPerson = UpdatePerson::run(['name' => 'Marmota Mota', 'birthdate' => '2000-01-01'], $id);
        $this->assertEquals('Marmota Mota', $updatedPerson->name);
        $this->assertEquals('2000-01-01', $updatedPerson->birthdate);
    }

    public function test_should_not_update_person()
    {
        $this->expectException(\Exception::class);
        $id = Person::factory()->create()->id;
        UpdatePerson::run(['name' => '', 'birthdate' => '0000-01-01'], $id);
    }

}
