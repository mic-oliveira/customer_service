<?php

namespace Tests\Unit\Actions\Address;

use App\Actions\Address\UpdateOrCreateAddresses;
use App\Models\Address;
use App\Models\Neighborhood;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdatedOrCreateAddressesTest extends TestCase
{

    use RefreshDatabase;

    public function test_should_create_addresses()
    {
        $person_id = Person::factory()->create()->id;
        $address = array_merge(
            Address::factory()->state(['public_place' => 'teste', 'neighborhood_id' => null])->make()->toArray(),
            ['neighborhood' => Neighborhood::factory()->create()->toArray()]
        );
        $addresses = [$address];
        $result = UpdateOrCreateAddresses::run($addresses, $person_id);
        $this->assertEquals('teste', $result[0]->public_place);
        $this->assertEquals(1, $result[0]->neighborhood_id);
    }

    public function test_should_nto_create_address()
    {
        $person_id = Person::factory()->create()->id;
        $address = array_merge(
            Address::factory()->state(['public_place' => 'teste', 'neighborhood_id' => null])->make()->toArray(),
        );
        $addresses = [$address];
        $this->expectException(\Exception::class);
        UpdateOrCreateAddresses::run($addresses, $person_id);
    }

    public function test_should_update_addresses()
    {
        $person_id = Person::factory()->create()->id;
        $address_id = Address::factory()->state(['public_place' => 'teste', 'person_id' => $person_id])->create()->id;
        $address = [
            'id' => $address_id,
            'public_place' => 'Toca da Marmota',
            'zipcode' => 999999999
        ];
        $addresses = [$address];
        $result = UpdateOrCreateAddresses::run($addresses, $person_id);
        $this->assertEquals($address['id'], $result[0]->id);
        $this->assertEquals($address['public_place'], $result[0]->public_place);
        $this->assertEquals($address['zipcode'], $result[0]->zipcode);
    }
}
