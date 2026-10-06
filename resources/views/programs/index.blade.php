@extends('layouts.app')
    @section('content')
    <main class="programmes-page">
        <div class="container">
            <header class="page-header">
                <h1>Programmes on Offer</h1>
                <p>Study with purpose</p>
            </header>

            <section class="programmes-grid" aria-label="Mukuba University programmes">
                @foreach ($programs as $program)
                    @php($qualification = \App\Support\Qualification::fullName($program['qualification_type'] ?? null))
                    <article class="programme-card">
                        <div class="programme-image">
                            <img src="{{ !empty(trim($program['thumbnail'] ?? '')) ? $program['thumbnail'] : asset('images/nut.jpg') }}" alt="{{ $program['name'] }}">
                        </div>
                        <div class="programme-body">
                            <span class="programme-level">{{ $qualification }}</span>
                            <h2>{{ $qualification }} in {{ $program['name'] }}</h2>
                            <p>{!! $program['description'] !!}</p>
                            <div class="programme-meta">
                                <span>{{ $program['duration'] }} Years</span>
                            </div>
                            <a href="{{ route('programs.show', $program['id']) }}" class="programme-link">View details</a>
                        </div>
                    </article>
                @endforeach

            </section>
        </div>
    </main>
@endsection
