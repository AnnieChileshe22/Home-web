@extends('layouts.app')
@section('content')
<main class="page-width" style="padding:48px 0 72px;max-width:900px">
    <p class="eyebrow"><a href="{{ route('announcements.index') }}">Announcements</a> · {{ $announcement->created_at->format('M j, Y') }}</p>
    <h1>{{ $announcement->title }}</h1>
    @if ($announcement->body)<div class="post-body">{!! $announcement->body !!}</div>@endif
    @foreach ($announcement->attachments as $attachment)
        @if (str_starts_with($attachment->mime_type, 'image/'))
            <p><a href="{{ Storage::disk('public')->url($attachment->path) }}"><img src="{{ Storage::disk('public')->url($attachment->path) }}" alt="{{ $attachment->original_name }}" style="max-width:100%;max-height:520px;object-fit:contain"></a></p>
        @else
            <p><a href="{{ Storage::disk('public')->url($attachment->path) }}" target="_blank" rel="noopener noreferrer">Download {{ $attachment->original_name }} (PDF)</a></p>
        @endif
    @endforeach
</main>
@endsection
