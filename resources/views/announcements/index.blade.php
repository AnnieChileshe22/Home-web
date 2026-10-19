@extends('layouts.app')
@section('content')
<main class="page-width" style="padding:48px 0 72px;max-width:1100px">
    <p class="eyebrow">Mukuba University</p><h1>Announcements</h1>
    @forelse ($announcements as $announcement)
        <article style="padding:20px 0;border-bottom:1px solid #ddd">
            <small>{{ $announcement->created_at->format('M j, Y') }}</small>
            <h2><a href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a></h2>
            @if ($announcement->body)<p>{{ \Illuminate\Support\Str::limit(strip_tags($announcement->body), 220) }}</p>@endif
            @foreach ($announcement->attachments as $attachment)
                @if (str_starts_with($attachment->mime_type, 'image/'))
                    <a href="{{ Storage::disk('public')->url($attachment->path) }}"><img src="{{ Storage::disk('public')->url($attachment->path) }}" alt="{{ $attachment->original_name }}" style="max-width:100%;max-height:280px;object-fit:contain"></a>
                @else
                    <p><a href="{{ Storage::disk('public')->url($attachment->path) }}" target="_blank" rel="noopener noreferrer">Download {{ $attachment->original_name }}</a></p>
                @endif
            @endforeach
        </article>
    @empty <p>No announcements have been published yet.</p> @endforelse
    {{ $announcements->links() }}
</main>
@endsection
