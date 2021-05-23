<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function can_see_admin_properties_page()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/admin/properties');
        $response->assertStatus(200);
    }
}
