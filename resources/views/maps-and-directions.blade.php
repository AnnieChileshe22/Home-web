@extends('layouts.app')

@php
    $destination = 'Mukuba University, Off Chingola Dual Carriage Way, Itimpi, Kitwe, Zambia';
    $directionsUrl = 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode($destination);
    $mapUrl = 'https://www.google.com/maps?q=' . rawurlencode($destination) . '&output=embed';
@endphp

@section('content')
    <main class="directions-page">
        <div class="page-width directions-wrap">
            <header class="directions-intro">
                <p class="directions-eyebrow">VISIT MUKUBA UNIVERSITY</p>
                <h1>Maps &amp; Directions</h1>
                <p>Planning a visit? Find our campus in Itimpi, Kitwe, and get directions from your current location.</p>
            </header>

            <section class="directions-layout" aria-label="Campus location and map">
                <div class="directions-details">
                    <p class="directions-label">CAMPUS ADDRESS</p>
                    <h2>Mukuba University</h2>
                    <address>
                        Off Chingola Dual Carriage Way<br>
                        Itimpi, Kitwe, Zambia
                    </address>
                    <a class="directions-button" href="{{ $directionsUrl }}" target="_blank" rel="noopener noreferrer" aria-label="Get directions to Mukuba University in Google Maps">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12Z"/><circle cx="12" cy="9" r="2.3"/><path d="M5 19h14"/></svg>
                        <span>Get Directions</span>
                        <span class="directions-arrow" aria-hidden="true">↗</span>
                    </a>

                    <div class="directions-contact">
                        <h3>Need help finding us?</h3>
                        <p>Call the University for assistance with your visit.</p>
                        <a href="tel:+26021291218">+260 212 91218</a>
                        <a href="mailto:registrar@mukuba.edu.zm">registrar@mukuba.edu.zm</a>
                    </div>
                </div>

                <div class="directions-map-wrap">
                    <iframe
                        class="directions-map"
                        src="{{ $mapUrl }}"
                        title="Map showing Mukuba University, Itimpi, Kitwe"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen>
                    </iframe>
                    <p class="directions-map-caption">Map provided by Google Maps. If it does not load, use the Get Directions button above.</p>
                </div>
            </section>

            <aside class="directions-note">
                <span class="directions-note-icon" aria-hidden="true">i</span>
                <p><strong>Before you travel</strong> — Use Google Maps to plan a route from your starting point. For help when you arrive, call the University at <a href="tel:+26021291218">+260 212 91218</a>.</p>
            </aside>
        </div>
    </main>
@endsection
