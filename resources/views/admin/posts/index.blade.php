@extends('layouts.app')

@section('content')
<main class="page-width" style="padding: 48px 0 72px">
    <style>.post-body img{max-width:100%;height:auto}.post-body{overflow-wrap:anywhere}.ck-editor__editable{min-height:280px}</style>
    <p class="eyebrow">Website administration</p>
    <div style="display:flex;justify-content:space-between;align-items:center;gap:20px;flex-wrap:wrap">
        <div><h1>Posts</h1><p>Announcements, university news and events.</p></div>
        <a class="apply-nav" href="{{ route('admin.posts.create') }}">Create post</a>
    </div>
    @if (session('status')) <p role="status">{{ session('status') }}</p> @endif
    <nav aria-label="Filter posts" style="display:flex;gap:16px;margin:24px 0">
        <a href="{{ route('admin.posts.index') }}">All categories</a>
        @foreach (\App\Models\Posts::CATEGORIES as $category)<a href="{{ route('admin.posts.index', ['category' => $category]) }}">{{ ucfirst($category) }}</a>@endforeach
        @foreach (\App\Models\Posts::STATUSES as $status)<a href="{{ route('admin.posts.index', ['status' => $status] + request()->only('category')) }}">{{ ucfirst($status) }}</a>@endforeach
    </nav>
    @forelse ($posts as $post)
        <article style="padding:20px 0;border-bottom:1px solid #ddd">
            <div style="display:flex;justify-content:space-between;gap:20px;flex-wrap:wrap">
                <div>
                    <small>{{ ucfirst($post->category) }} · {{ ucfirst($post->status) }} · {{ $post->created_at->format('M j, Y') }} · {{ $post->images->count() }} image(s)</small>
                    <h2 style="margin:8px 0">{{ $post->title }}</h2>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 180) }}</p>
                </div>
                <div style="display:flex;gap:12px;align-items:center">
                    <a href="{{ route('admin.posts.show', $post) }}">View</a>
                    <a href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post and its images?')">
                        @csrf @method('DELETE') <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </article>
    @empty
        <p>No posts yet.</p>
    @endforelse
    {{ $posts->links() }}
</main>
@endsection
