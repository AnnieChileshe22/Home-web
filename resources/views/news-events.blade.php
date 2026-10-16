@extends('layouts.app')

@section('content')
    <main class="news-events-page">
        <div class="page-width news-events-wrap">
            <header class="news-events-intro">
                <p class="news-events-eyebrow">MUKUBA UNIVERSITY</p>
                <h1>News &amp; Events</h1>
                <p>Stay up to date with the latest University news and announcements, and explore event updates from our community.</p>
                <nav class="news-events-jump" aria-label="News and events sections">
                    <a href="#university-news">University News</a>
                    <a href="#university-events">Events</a>
                </nav>
            </header>

            <section class="news-events-section" id="university-news" aria-labelledby="university-news-title">
                <div class="news-events-section-heading">
                    <div>
                        <p class="news-events-eyebrow">LATEST UPDATES</p>
                        <h2 id="university-news-title">University News</h2>
                    </div>
                </div>
                <div class="news-events-grid">
                    @forelse ($news as $post)
                        <article class="news-events-card">
                            <div class="news-events-image" aria-hidden="true">
                                @if ($post->images->first())
                                    <img src="{{ Storage::disk('public')->url($post->images->first()->path) }}" alt="" loading="lazy">
                                @else
                                    <img src="{{ asset('images/logo.png') }}" alt="" loading="lazy">
                                @endif
                            </div>
                            <div class="news-events-card-body">
                                <p class="news-events-meta"><span>News</span><time datetime="{{ $post->created_at->toDateString() }}">Published {{ $post->created_at->format('M j, Y') }}</time></p>
                                <h3><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                                <p class="news-events-summary">{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 180) }}</p>
                                <a class="news-events-read" href="{{ route('posts.show', $post) }}">Read article <span aria-hidden="true">&#8594;</span></a>
                            </div>
                        </article>
                    @empty
                        <p class="news-events-empty">There are no published news articles at the moment. Please check back for University updates.</p>
                    @endforelse
                </div>
                @if ($news->hasPages())
                    <nav class="news-events-pagination" aria-label="News pages">{{ $news->links() }}</nav>
                @endif
            </section>

            <section class="news-events-section" id="university-events" aria-labelledby="university-events-title">
                <div class="news-events-section-heading">
                    <div>
                        <p class="news-events-eyebrow">CAMPUS COMMUNITY</p>
                        <h2 id="university-events-title">Events</h2>
                    </div>
                </div>
                <div class="news-events-grid">
                    @forelse ($events as $post)
                        <article class="news-events-card">
                            <div class="news-events-image" aria-hidden="true">
                                @if ($post->images->first())
                                    <img src="{{ Storage::disk('public')->url($post->images->first()->path) }}" alt="" loading="lazy">
                                @else
                                    <img src="{{ asset('images/logo.png') }}" alt="" loading="lazy">
                                @endif
                            </div>
                            <div class="news-events-card-body">
                                <p class="news-events-meta"><span>Event update</span><time datetime="{{ $post->created_at->toDateString() }}">Posted {{ $post->created_at->format('M j, Y') }}</time></p>
                                <h3><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                                <p class="news-events-summary">{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 180) }}</p>
                                <a class="news-events-read" href="{{ route('posts.show', $post) }}">View event update <span aria-hidden="true">&#8594;</span></a>
                            </div>
                        </article>
                    @empty
                        <p class="news-events-empty">There are no published event updates at the moment. Please check back for upcoming University activities.</p>
                    @endforelse
                </div>
                @if ($events->hasPages())
                    <nav class="news-events-pagination" aria-label="Event pages">{{ $events->links() }}</nav>
                @endif
            </section>
        </div>
    </main>
@endsection
