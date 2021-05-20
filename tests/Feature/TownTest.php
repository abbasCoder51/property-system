<?php

namespace Tests\Feature;

use App\Models\Town;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TownTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_town_can_be_created()
    {
        $town = Town::factory()->create();

        $this->assertDatabaseHas('towns', $town->toArray());
    }
}
