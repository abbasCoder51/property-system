<?php

namespace Tests\Feature;

use App\Models\PropertyType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTypeTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_property_type_can_be_created()
    {
        $propertyType = PropertyType::factory()->create();

        $this->assertDatabaseHas('property_Types', $propertyType->toArray());
    }
}
