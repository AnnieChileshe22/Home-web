@extends('layouts.app')
@section('content')
    <main class="hostel-page">
        <div class="container">
            <header class="header"><p>Accommodation</p><h1>{{ $hostel->name }}</h1></header>
            <section class="content-grid">
                <article class="panel">
                    <h2>Gallery</h2>
                    <div class="gallery">
                        @forelse ($hostel->images as $image)
                            <button class="gallery-trigger" type="button" aria-label="View full image: {{ $image->alt_text ?: $hostel->name }}"><img src="{{ Storage::disk('public')->url($image->path) }}" alt="{{ $image->alt_text ?: $hostel->name }}"></button>
                        @empty
                            <p>Photos for this hostel will be added soon.</p>
                        @endforelse
                    </div>
                </article>
                <aside class="panel">
                    <h2>Features</h2>
                    <div class="services">@forelse ($hostel->features ?? [] as $feature)<span class="service-pill">{{ $feature }}</span>@empty<p>Features will be added soon.</p>@endforelse</div>
                    <ul class="meta-list meta-list-spaced"><li>{{ ucfirst($hostel->gender) }} accommodation</li><li>Price: ZMW {{ number_format((float) $hostel->price, 2) }} per semester</li></ul>
                    <a class="hostel-apply-button" href="https://unicosis.mukuba.edu.zm/login" target="_blank" rel="noopener noreferrer">Apply now</a>
                </aside>
            </section>
            <section class="panel overview-panel"><h2>Overview</h2><p class="summary">{{ $hostel->description ?: 'More information about this hostel will be available soon.' }}</p></section>
        </div>
    </main>
    <dialog class="gallery-lightbox" aria-label="Full-size gallery image"><button class="gallery-lightbox-close" type="button" aria-label="Close full-size image">&times;</button><button class="gallery-lightbox-nav gallery-lightbox-previous" type="button" aria-label="Previous image">&#8592;</button><img class="gallery-lightbox-image" alt=""><button class="gallery-lightbox-nav gallery-lightbox-next" type="button" aria-label="Next image">&#8594;</button><p class="gallery-lightbox-counter" aria-live="polite"></p></dialog>
@endsection
