@extends('layouts.app')

@section('content')
<main class="page-width" style="padding:48px 0 72px">
    <p class="eyebrow">Mukuba University</p>
    <h1>News, announcements and events</h1>
    <nav aria-label="Filter posts" style="display:flex;gap:16px;margin:24px 0">
        <a href="{{ route('posts.index') }}">All</a>
        @foreach (\App\Models\Posts::CATEGORIES as $category)
            <a href="{{ route('posts.index', ['category' => $category]) }}">{{ ucfirst($category) }}</a>
        @endforeach
    </nav>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:24px">
        @forelse ($posts as $post)
            <article style="border:1px solid #ddd;border-radius:8px;overflow:hidden">
                @if ($post->images->first()) <img src="{{ Storage::disk('public')->url($post->images->first()->path) }}" alt="{{ $post->images->first()->alt_text }}" style="width:100%;height:190px;object-fit:cover"> @endif
                <div style="padding:18px"><small>{{ ucfirst($post->category) }} · {{ $post->created_at->format('M j, Y') }}</small><h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2><p>{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 180) }}</p></div>
            </article>
        @empty <p>No posts have been published yet.</p> @endforelse
    </div>
    <div style="margin-top:28px">{{ $posts->links() }}</div>
</main>
@endsection
