<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    private string $apiKey = '3NLTTNlXsi6rBWl7nYGluOdkl2htFHug';

    /** @test */
    public function an_api_call_to_retrieve_a_single_record_to_save_data_into_the_database()
    {
        $this->get(sprintf('/api/properties?%s&%s&%s',
            'page[number]=1',
            'page[size]=1',
            'api_key=' . $this->apiKey
        ));

        $this->assertDatabaseCount('counties', 1);
        $this->assertDatabaseCount('countries', 1);
        $this->assertDatabaseCount('towns', 1);
        $this->assertDatabaseCount('property_types', 1);
        $this->assertDatabaseCount('properties', 1);
    }

    /** @test */
    public function an_api_call_to_retrieve_ten_records_to_save_data_into_the_database()
    {
        $response = $this->get(sprintf('/api/properties?%s&%s&%s',
            'page[number]=1',
            'page[size]=10',
            'api_key=' . $this->apiKey
        ));

        $data = [
            'counties' => [],
            'countries' => [],
            'towns' => [],
            'property_types' => [],
            'properties' => []
        ];

        foreach ($response['data'] as $properties) {
            $data['counties'][] = $properties['county'];
            $data['countries'][] = $properties['country'];
            $data['towns'][] = $properties['town'];
            $data['property_types'][] = $properties['property_type_id'];
            $data['properties'][] = $properties['uuid'];
        }

        $this->assertDatabaseCount('counties', count(array_unique($data['counties'])));
        $this->assertDatabaseCount('countries', count(array_unique($data['countries'])));
        $this->assertDatabaseCount('towns', count(array_unique($data['towns'])));
        $this->assertDatabaseCount('property_types', count(array_unique($data['property_types'])));
        $this->assertDatabaseCount('properties', count(array_unique($data['properties'])));
    }
}
