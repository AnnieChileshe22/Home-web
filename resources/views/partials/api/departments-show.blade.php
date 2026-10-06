@php
        $programmes = $department['programs'] ?? [];
        $hodName = $department['hod_name'] ?? data_get($department, 'hod.name');
        if (blank($hodName)) {
            $hodName = trim(implode(' ', array_filter([
                data_get($department, 'hod.first_name'),
                data_get($department, 'hod.last_name'),
            ])));
        }
    @endphp
    <main class="school-page department-page">
        <div class="container">
            <header class="hero">
                <div>
                    <span class="hero-label">Department</span>
                    <h1>{{ $department['name'] ?? 'Department' }}</h1>
                </div>
            </header>

            <section class="content-grid">
                <article class="panel">
                    <h2 class="section-title">About this department</h2>
                    <div class="description-wrap">
                        <p class="description">{{ strip_tags($department['description'] ?? '') ?: 'Department information will be available soon.' }}</p>
                    </div>
                </article>

                <aside class="panel meta-card" aria-labelledby="hod-title">
                    <h2 id="hod-title" class="section-title">Head of Department</h2>
                    <div class="dean-block">
                        <div class="dean-badge" aria-hidden="true">H</div>
                        <div>
                            <p class="dean-name">{{ $hodName ?: 'Not assigned' }}</p>
                            <p class="dean-role">Current HoD</p>
                        </div>
                    </div>
                </aside>
            </section>

            <section class="programmes" aria-labelledby="programmes-title">
                <h2 id="programmes-title" class="section-title">Programmes offered</h2>
                <div class="programmes-grid">
                    @forelse ($programmes as $programme)
                        @php($qualification = \App\Support\Qualification::fullName($programme['qualification_type'] ?? null))
                        <article class="programme-card">
                            @if (!empty($programme['academic_level']))
                                <span class="level">{{ ucfirst($programme['academic_level']) }}</span>
                            @endif
                            <h3>{{ $qualification ? $qualification . ' in ' : '' }}{{ $programme['name'] ?? 'Programme' }}</h3>
                            @if (!empty($programme['description']))
                                <p>{{ strip_tags($programme['description']) }}</p>
                            @endif
                            @if (!empty($programme['duration']))
                                <p>{{ $programme['duration'] }} {{ $programme['duration'] == 1 ? 'Year' : 'Years' }}</p>
                            @endif
                            @if (!empty($programme['id']))
                                <a href="{{ route('programs.show', $programme['id']) }}">View details</a>
                            @endif
                        </article>
                    @empty
                        <p>No programmes are currently listed for this department.</p>
                    @endforelse
                </div>
            </section>
        </div>
    </main>