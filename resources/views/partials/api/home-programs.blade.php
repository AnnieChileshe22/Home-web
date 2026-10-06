@foreach ($programs as $program)
        <article style="cursor: pointer;" onclick="window.location.href='{{ route('programs.show', $program['id']) }}'" class="school-card">
            <img src="{{ $program['thumbnail'] }}" alt="{{ $program['name'] }} program image" @if ($loop->first) fetchpriority="high" @else loading="lazy" @endif>
            <h3>{{ $program['name'] }}</h3>
            <a href="{{ route('programs.show', $program['id']) }}">Learn more</a>
        </article>
        @endforeach