@extends('layouts.app')
    @section('content')
    <main class="school-page">
        <div class="container">
            <header class="hero">
                <h1>School of {{ $school['name'] }}</h1>
            </header>

            <section class="content-grid">
                <article class="panel">
                    <h2 class="section-title">About this school</h2>
                     <div class="dean-block">
                        <div class="dean-badge">D</div>
                        <div>
                            <p class="dean-name">{{ $school['dean_'] ?? '' }}</p>
                            <p class="dean-role">Current Dean</p>
                        </div>
                    </div>
                    <div class="description-wrap">
                        <p>{!! $school['description'] !!}</p>
                    </div>
                </article>
                <!-- Fetch and display the departments for the school -->
                @php
                    $departments = $school['departments'] ?? [];
                @endphp
                
                <aside class="panel meta-card">
                    <h2 class="section-title">Departments</h2>
                    <ul class="meta-list">
                        @foreach ($departments as $department)
                            <li>{{ $department['name'] }}</li>
                        @endforeach
                    </ul>
                </aside>
            </section>


            @php
                $programmes = collect($school['programs'] ?? [])
                    ->concat(collect($departments)->flatMap(fn ($department) => $department['programs'] ?? []))
                    ->unique(fn ($programme) => $programme['id'] ?? json_encode($programme));
            @endphp
            <section class="programmes" aria-labelledby="programmes-title">
                <h2 id="programmes-title" class="section-title">Programmes offered</h2>
                <div class="programmes-grid">
                    @forelse ($programmes as $programme)
                        <article class="programme-card">
                            <span class="level">{{ ucfirst($programme['academic_level'] ?? '') }}</span>
                            <h3>{{ trim(($programme['qualification_type'] ?? '') . ' ' . $programme['name']) }}</h3>
                            @if (!empty($programme['description']))
                                <p>{{ strip_tags($programme['description']) }}</p>
                            @endif
                        </article>
                    @empty
                        <p>No programmes are currently listed for this school.</p>
                    @endforelse
                </div>
            </section>
        </div>
    </main>
   @endsection
