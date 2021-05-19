<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /** @test */
    public function a_json_response_is_received_from_properties_api_call()
    {
        $response = $this->get('/api/properties');

        $response->assertStatus(200);
        $response->assertJson([
            'data' => []
        ]);
    }
}
