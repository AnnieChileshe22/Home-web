@extends('layouts.app')
@section('content')
    <main class="hostel-page">
        <div class="container">
            <header class="header">
                <p>Accommodation</p>
                <h1>{{ str_replace('-', ' ', ucfirst($hostel)) }}</h1>
            </header>

            <section class="content-grid">
                <article class="panel">
                    <h2>Gallery</h2>
                    <div class="gallery">
                        <button class="gallery-trigger" type="button" aria-label="View full image: Hostel room">
                            <img src="{{ asset('images/to use/room.png') }}" alt="Hostel room">
                        </button>
                        <button class="gallery-trigger" type="button" aria-label="View full image: Hostel kitchen">
                            <img src="{{ asset('images/to use/kitchen.png') }}" alt="Hostel kitchen">
                        </button>
                        <button class="gallery-trigger" type="button" aria-label="View full image: Hostel shower">
                            <img src="{{ asset('images/to use/shower.png') }}" alt="Hostel shower">
                        </button>
                        <button class="gallery-trigger" type="button" aria-label="View full image: Hostel mirror">
                            <img src="{{ asset('images/to use/mirror.png') }}" alt="Hostel mirror">
                        </button>
                        <button class="gallery-trigger" type="button" aria-label="View full image: Hostel TV area">
                            <img src="{{ asset('images/to use/tv.png') }}" alt="Hostel TV area">
                        </button>
                        <button class="gallery-trigger" type="button" aria-label="View full image: Kariba Hostel">
                            <img src="{{ asset('images/to use/kariba.png') }}" alt="Kariba Hostel">
                        </button>
                        <button class="gallery-trigger" type="button" aria-label="View full image: Hostel toilet">
                            <img src="{{ asset('images/to use/toilet.png') }}" alt="Hostel toilet">
                        </button>
                        <button class="gallery-trigger" type="button" aria-label="View full image: Hostel corridor">
                            <img src="{{ asset('images/to use/corrider.png') }}" alt="Hostel corridor">
                        </button>
                    </div>
                </article>

                <aside class="panel">
                    <h2>Services offered</h2>
                    <div class="services">
                        <span class="service-pill">Wi-Fi</span>
                        <span class="service-pill">Security</span>
                        <span class="service-pill">Laundry room</span>
                        <span class="service-pill">Water</span>
                        <span class="service-pill">Study area</span>
                    </div>
                    <ul class="meta-list meta-list-spaced">
                        <li>Comfortable rooms</li>
                        <li>Safe residential environment</li>
                        <li>Convenient access to campus essentials</li>
                        <li>Supportive student living conditions</li>
                    </ul>
                </aside>
            </section>

            <section class="panel overview-panel">
                <h2>Overview</h2>
                <p class="summary">This accommodation facility is designed to support students with safe, clean, and well-managed housing. It provides a comfortable residential environment where students can focus on their studies while enjoying access to basic support services and dependable campus amenities.</p>
            </section>
        </div>
    </main>
    <dialog class="gallery-lightbox" aria-label="Full-size gallery image">
        <button class="gallery-lightbox-close" type="button" aria-label="Close full-size image">&times;</button>
        <button class="gallery-lightbox-nav gallery-lightbox-previous" type="button" aria-label="Previous image">&#8592;</button>
        <img class="gallery-lightbox-image" alt="">
        <button class="gallery-lightbox-nav gallery-lightbox-next" type="button" aria-label="Next image">&#8594;</button>
        <p class="gallery-lightbox-counter" aria-live="polite"></p>
    </dialog>
@endsection
