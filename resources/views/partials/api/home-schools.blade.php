@foreach ($schools as $school)
        <article style="cursor: pointer;" onclick="window.location.href='{{ route('schools.show', $school['id']) }}'" class="school-card">
            <img src="{{ $school['thumbnail'] }}" alt="{{ $school['name'] }} school image" @if ($loop->first) fetchpriority="high" @else loading="lazy" @endif>
            <h3>{{ $school['name'] }}</h3>
            <a href="{{ route('schools.show', $school['id']) }}">Learn more</a>
        </article>
        @endforeach