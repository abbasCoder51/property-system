<?php

namespace Tests\Unit;

use App\Models\Country;
use App\Models\County;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Town;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function has_a_county()
    {
        $property = Property::factory()->create();

        $this->assertInstanceOf(County::class, $property->county);
    }

    /** @test */
    public function has_a_country()
    {
        $property = Property::factory()->create();

        $this->assertInstanceOf(Country::class, $property->country);
    }

    /** @test */
    public function has_a_town()
    {
        $property = Property::factory()->create();

        $this->assertInstanceOf(Town::class, $property->town);
    }

    /** @test */
    public function has_a_property_type()
    {
        $property = Property::factory()->create();

        $this->assertInstanceOf(PropertyType::class, $property->propertyType);
    }
}
