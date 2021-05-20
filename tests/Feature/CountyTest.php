<?php

namespace Tests\Feature;

use App\Models\County;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountyTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_county_can_be_created()
    {
        $county = County::factory()->create();

        $this->assertDatabaseHas('counties', $county->toArray());
    }
}
