<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_property_can_be_created()
    {
        $property = Property::factory()->create();

        $this->assertDatabaseHas('properties', $property->toArray());
    }
}
