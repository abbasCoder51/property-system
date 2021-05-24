<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function can_see_properties_page()
    {
        $response = $this->get('/admin/properties');
        $response->assertStatus(200);
    }

    /** @test */
    public function can_see_a_single_property_view_page()
    {
        $property = Property::factory()->create();

        $response = $this->get('/admin/properties/' . $property->id);
        $response->assertStatus(200);
    }

    /** @test */
    public function can_see_property_edit_page()
    {
        $property = Property::factory()->create();

        $response = $this->get('/admin/properties/' . $property->id . '/edit');
        $response->assertStatus(200);
    }

    /** @test */
    public function can_delete_a_single_property()
    {
        $property = Property::factory()->create();

        $response = $this->delete('/admin/properties/' . $property->id);
        $response->assertRedirect('/admin/properties');
        $this->assertDatabaseMissing('properties', $property->toArray());
    }
}
