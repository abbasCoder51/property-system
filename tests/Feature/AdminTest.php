<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\County;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Town;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

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
    public function can_see_property_create_page()
    {
        $response = $this->get('/admin/properties/create');
        $response->assertStatus(200);
    }

//    /** @test */
//    public function can_create_a_single_property()
//    {
//        $imageUpload = sprintf("%s.png", strtolower(str_replace(" ", "_", $this->faker->name)));
//
//        $data = [
//            'county' => $this->faker->state,
//            'country' => $this->faker->country,
//            'town' => $this->faker->postcode,
//            'postcode' => $this->faker->streetName,
//            'description' => $this->faker->paragraph,
//            'displayable_address' => $this->faker->address,
//            'image_upload' => UploadedFile::fake()->image($imageUpload),
//            'number_of_bedrooms' => 4,
//            'number_of_bathrooms' => 4,
//            'price' => 200000,
//            'property_type' => PropertyType::factory()->create()->title,
//            'contract_type' => 'rent',
//            'created_at' => $this->faker->dateTime
//        ];
//
//        $response = $this->post('/admin/properties', $data);
//        $response->assertRedirect('/admin/properties');
//
//        $this->assertDatabaseHas('properties', $data);
//    }

    /** @test */
    public function can_update_a_single_property()
    {
        $property = Property::factory()->create();

        $data = array_merge($property->attributesToArray(), [
            'county' => $this->faker->state,
            'country' => $this->faker->country,
            'town' => $this->faker->streetName,
            'property_type' => PropertyType::factory()->create()->title,
            'price' => 200000,
            'number_of_bedrooms' => 4
        ]);

        $response = $this->patch('/admin/properties/' . $property->id, $data);
        $response->assertRedirect('/admin/properties/');

        $this->assertDatabaseMissing('properties', $data);
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
