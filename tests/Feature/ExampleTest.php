<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('index');
    }

    public function test_accommodation_page_is_accessible(): void
    {
        $response = $this->get('/accommodation');

        $response->assertStatus(200);
        $response->assertViewIs('accommodation.index');
    }
}
