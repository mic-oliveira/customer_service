<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Document;
use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::factory()->count(10)
            ->has(Address::factory()->count(2), 'addresses')
            ->has(Document::factory()->count(2), 'documents')
            ->create();
    }
}
