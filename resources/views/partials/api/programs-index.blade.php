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
<nav class="programme-pagination" aria-label="Programme pages" data-programme-pagination>
    <button type="button" data-page="{{ max(1, $page - 1) }}" @disabled($page <= 1)>Previous</button>
    <span>Page {{ $page }}</span>
    <button type="button" data-page="{{ $page + 1 }}" @disabled(!$hasNextPage)>Next</button>
</nav>
