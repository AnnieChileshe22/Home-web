@extends('layouts.app')

@section('content')
<main class="page-width" style="padding:48px 0 72px;max-width:900px">
    <p class="eyebrow"><a href="{{ route('admin.posts.index') }}">Posts</a> / {{ ucfirst($post->category) }}</p>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->created_at->format('M j, Y') }}</p>
    <div class="post-body">{!! $post->body !!}</div>
    @if ($post->images->isNotEmpty())
        <div style="display:flex;gap:16px;flex-wrap:wrap;margin-top:28px">
            @foreach ($post->images as $image)
                <img src="{{ Storage::disk('public')->url($image->path) }}" alt="{{ $image->alt_text }}" style="max-width:100%;width:300px;max-height:240px;object-fit:cover">
            @endforeach
        </div>
    @endif
    <p><a href="{{ route('admin.posts.edit', $post) }}">Edit post</a></p>
</main>
@endsection
