<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ str_replace('-', ' ', ucfirst($hostel)) }} | Accommodation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
    @include('header contents.header')
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
                        <img src="{{ asset('images/to use/room.png') }}" alt="Hostel exterior">
                        <img src="{{ asset('images/to use/kitchen.png') }}" alt="Hostel room">
                        <img src="{{ asset('images/to use/shower.png') }}" alt="Hostel lounge">
                        <img src="{{ asset('images/to use/mirror.png') }}" alt="Hostel surroundings">
                        <img src="{{ asset('images/to use/tv.png') }}" alt="Hostel exterior">
                        <img src="{{ asset('images/to use/kariba.png') }}" alt="Hostel room">
                        <img src="{{ asset('images/to use/toilet.png') }}" alt="Hostel lounge">
                        <img src="{{ asset('images/to use/corrider.png') }}" alt="Hostel surroundings">
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
    @include('header contents.footer')
</body>
</html>
