<?php

namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_country_can_be_created()
    {
        $country = Country::factory()->create();

        $this->assertDatabaseHas('countries', $country->toArray());
    }
}
