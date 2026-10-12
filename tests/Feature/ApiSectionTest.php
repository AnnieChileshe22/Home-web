<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ApiSectionTest extends TestCase
{
    public function test_pages_render_without_contacting_the_api(): void
    {
        Http::preventStrayRequests();
        foreach (['/', '/schools', '/programs', '/programmes', '/schools/1', '/programs/1', '/departments/1'] as $url) {
            $this->get('http://localhost' . $url)->assertOk()
                ->assertSee('data-api-section')->assertSee('Loading...');
        }
        Http::assertNothingSent();
    }

    public function test_empty_failed_and_invalid_responses_show_no_data(): void
    {
        foreach ([Http::response([]), Http::response([], 503), Http::response('invalid', 200)] as $response) {
            Http::fake(['*' => $response]);
            $this->get('http://localhost/data/schools')->assertOk()->assertSee('No data to show');
        }
    }

    public function test_connection_failure_shows_no_data(): void
    {
        Http::fake(['*' => Http::failedConnection()]);
        $this->get('http://localhost/data/home/programs')->assertOk()->assertSee('No data to show');
        $this->get('http://localhost/data/departments/1')->assertOk()->assertSee('No data to show');
    }

    public function test_sections_are_independent_and_api_credentials_stay_on_server(): void
    {
        config(['services.ecms.api_key' => 'private-test-key']);
        Http::fake(['*' => Http::response([])]);
        $this->get('http://localhost/')->assertDontSee('private-test-key');
        $this->get('http://localhost/data/home/schools')->assertOk();
        Http::assertSentCount(1);
        Http::assertSent(fn ($request) => $request->hasHeader('X-API-KEY', 'private-test-key')
            && str_ends_with($request->url(), '/api/schools'));
        $this->get('http://localhost/data/unknown')->assertNotFound();
    }
}
