@extends('layouts.app')

@section('title', 'About Mukuba University')

@section('content')
    <main class="about-university-page">
        <section class="about-university-hero" aria-labelledby="about-university-title">
            <div class="page-width about-university-hero-inner">
                <div class="about-university-intro">
                    <p class="about-university-eyebrow">MUKUBA UNIVERSITY</p>
                    <h1 id="about-university-title">A legacy of learning. A future shaped by discovery.</h1>
                    <p>Mukuba University’s story is one of continuous transformation—from teacher education roots to a public university with a focus on science, technology, engineering and mathematics.</p>
                    <a class="about-university-button" href="{{ url('/programmes') }}">Explore Academic Programmes <span aria-hidden="true">→</span></a>
                </div>
                <figure class="about-university-image">
                    <img src="{{ asset('images/library.jpg') }}" alt="Campus landscape at Mukuba University">
                    <figcaption>Mukuba University, Itimpi, Kitwe</figcaption>
                </figure>
            </div>
        </section>

        <section class="about-university-section" aria-labelledby="about-story-title">
            <div class="page-width about-university-story">
                <div>
                    <p class="about-university-eyebrow">OUR STORY</p>
                    <h2 id="about-story-title">Built on a tradition of teacher education</h2>
                </div>
                <div class="about-university-prose">
                    <p>The institution’s roots reach back to St Francis Secondary School, built by the Franciscans in 1958. In 1969, the Zambia Bishops Conference took over the school to begin training teachers for church secondary schools.</p>
                    <p>In 1974, it became Copperbelt Secondary Teachers College (COSETCO), preparing teachers in science, mathematics and home economics. In 2013, COSETCO was declared a public university and became Mukuba University.</p>
                    <p>Today, the University continues to develop its teaching, research and community engagement as it pursues its STEM-focused vision.</p>
                    <a class="about-university-text-link" href="{{ url('/management') }}">Meet the University management <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </section>

        <section class="about-university-purpose" aria-label="University vision and mission">
            <div class="page-width about-purpose-grid">
                <article>
                    <p class="about-university-eyebrow">OUR VISION</p>
                    <h2>A centre of excellence in STEM</h2>
                    <p>To make Mukuba University a Centre of Excellence in Science, Technology, Engineering and Mathematics.</p>
                </article>
                <article>
                    <p class="about-university-eyebrow">OUR MISSION</p>
                    <h2>Knowledge for sustainable development</h2>
                    <p>To provide quality scientific innovations through teaching, research and community engagement for sustainable development.</p>
                </article>
            </div>
        </section>

        <section class="about-university-visit" aria-labelledby="about-visit-title">
            <div class="page-width about-visit-inner">
                <div>
                    <p class="about-university-eyebrow">PLAN A VISIT</p>
                    <h2 id="about-visit-title">Find us in Itimpi, Kitwe</h2>
                    <p>For enquiries, call <a href="tel:+26021291218">+260 212 91218</a> or email <a href="mailto:registrar@mukuba.edu.zm">registrar@mukuba.edu.zm</a>.</p>
                </div>
                <div class="about-visit-actions">
                    <a class="about-university-button" href="{{ route('maps-and-directions') }}">Get Directions <span aria-hidden="true">→</span></a>
                    <a class="about-university-secondary" href="#contact">Contact the University</a>
                </div>
            </div>
        </section>
    </main>
@endsection
