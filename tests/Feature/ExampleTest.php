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

    public function test_directorate_of_research_and_graduate_studies_page_is_accessible(): void
    {
        $response = $this->get('/directorate-of-research-and-graduate-studies');

        $response->assertStatus(200);
        $response->assertViewIs('directorate-of-research-and-graduate-studies');
    }

    public function test_management_page_is_accessible(): void
    {
        $response = $this->get('/management');

        $response->assertStatus(200);
        $response->assertViewIs('management');
    }

    public function test_university_partners_page_is_accessible(): void
    {
        $response = $this->get('/university-partners');

        $response->assertStatus(200);
        $response->assertViewIs('university-partners');
    }
}
