<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class HomeCarouselTest extends TestCase
{
    public function test_homepage_resolves_thumbnails_and_initializes_separate_carousels(): void
    {
        config(['services.ecms.base_url' => 'https://ecms.example']);
        Http::fake([
            'https://ecms.example/api/schools' => Http::response([
                ['id' => 1, 'name' => 'Science', 'thumbnail' => 'schools/science.jpg'],
                ['id' => 2, 'name' => 'Education', 'thumbnail' => '/storage/schools/education.jpg'],
                ['id' => 3, 'name' => 'Business', 'thumbnail' => 'https://cdn.example/business.jpg'],
                ['id' => 4, 'name' => 'Other', 'thumbnail' => null],
            ]),
            'https://ecms.example/api/programs' => Http::response([
                ['id' => 1, 'name' => 'Computing', 'thumbnail' => 'programs/computing.jpg'],
            ]),
        ]);

        $response = $this->get('http://localhost/');

        $response->assertOk()->assertSee('data-program-prev')->assertSee('api-section-loaded');
        Http::assertNothingSent();

        $this->get('http://localhost/data/home/schools')->assertOk()
            ->assertSee('https://ecms.example/storage/schools/science.jpg')
            ->assertSee('https://ecms.example/storage/schools/education.jpg')
            ->assertSee('https://cdn.example/business.jpg')
            ->assertSee(asset('images/Mukuba-Hero.jpg'));
        $this->get('http://localhost/data/home/programs')->assertOk()
            ->assertSee('https://ecms.example/storage/programs/computing.jpg');

        $this->assertSame(1, substr_count($response->getContent(), 'const setupCarousel'));
    }

    public function test_homepage_renders_empty_carousels(): void
    {
        Http::fake(['*' => Http::response([])]);

        $this->get('http://localhost/')->assertOk()->assertSee('if (!cards.length)', false);
    }
}

