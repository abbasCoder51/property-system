<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    private string $apiKey = '3NLTTNlXsi6rBWl7nYGluOdkl2htFHug';

    /** @test */
    public function a_single_property_api_call_saves_data_into_database()
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
}
