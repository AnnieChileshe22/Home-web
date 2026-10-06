<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DepartmentShowTest extends TestCase
{
    public function test_department_page_displays_its_hod_and_programmes(): void
    {
        config(['services.ecms.base_url' => 'https://ecms.example']);
        Http::fake([
            'https://ecms.example/api/departments/science' => Http::response([
                'name' => 'Computer Science',
                'description' => 'Study computing and technology.',
                'hod' => ['name' => 'Jane Banda'],
                'programs' => [[
                    'id' => 'computing',
                    'name' => 'Computing',
                    'qualification_type' => 'BSc',
                    'duration' => 4,
                ]],
            ]),
        ]);

        $this->get('http://localhost/departments/science')
            ->assertOk()
            ->assertSee('Computer Science')
            ->assertSee('Head of Department')
            ->assertSee('Jane Banda')
            ->assertSee('Bachelor of Science in Computing')
            ->assertSee(route('programs.show', 'computing'));
    }

    public function test_department_page_handles_missing_hod_and_programmes(): void
    {
        Http::fake(['*' => Http::response(['name' => 'Mathematics'])]);

        $this->get('http://localhost/departments/mathematics')
            ->assertOk()
            ->assertSee('Not assigned')
            ->assertSee('No programmes are currently listed for this department.');
    }
}
