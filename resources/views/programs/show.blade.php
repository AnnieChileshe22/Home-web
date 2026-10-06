@extends('layouts.app')
    @section('content')
    @php($qualification = \App\Support\Qualification::fullName($program['qualification_type'] ?? null))
    <main class="programme-page">
        <div class="container">
            <header class="top-banner">
                <span>{{ $qualification }}</span>
                <h1>{{ $qualification }} in {{ $program['name'] }}</h1>
            </header>

            <div class="programme-thumbnail">
                <img src="{{ !empty(trim($program['thumbnail'] ?? '')) ? $program['thumbnail'] : asset('images/nut.jpg') }}" alt="{{ $program['name'] }}">
            </div>

            <section class="content-grid">
                <article class="panel">
                    <h2>Programme overview</h2>
                    <p>{!! $program['description'] !!}</p>

                    <div class="stats">
                        <div class="stat">
                            <span class="stat-label">Duration</span>
                            <strong>{{ $program['duration'] }} Years</strong>
                        </div>
                        <div class="stat">
                            <span class="stat-label">Award</span>
                            <strong>{{ $program['qualification_type'] }}</strong>
                        </div>
                    </div>

                </article>

                
            </section>

            <section class="timeline" aria-labelledby="study-years-title">
                <h2 id="study-years-title" class="section-title">Study years and areas of focus</h2>
                <div class="timeline-grid">
                    @forelse ($program['courses_by_year'] ?? [] as $group)
                    <article class="year-card">
                        <h3>{{ $group['name'] }}</h3>
                        <ul>
                            @foreach ($group['courses'] as $course)
                                <li>{{ $course['title'] }}</li>
                            @endforeach
                        </ul>
                    </article>
                    @empty
                        <p>No courses available for this programme.</p>
                    @endforelse
                </div>
            </section>
        </div>
    </main>
    @endsection
