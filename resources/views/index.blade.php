@extends('layouts.app')
@section('content')
<main id="top">
    <section class="hero" aria-labelledby="hero-title" style="--hero-image: url('{{ asset('images/library.jpg') }}');">
        <div class="page-width hero-inner">
            <div class="hero-copy">
                <h2 class="hero-kicker">Mukuba University</h2>
                <h1 id="hero-title"><span class="hero-education">Education</span><br><span class="hero-freedom">Freedom</span> <span class="hero-responsibility">Responsibility</span></h1>
                <p>Join a university community where ambitious students turn knowledge into meaningful work.</p>
                <div class="hero-actions"><a class="hero-primary" href="https://unicosis.mukuba.edu.zm/login" target="_blank">Apply now</a></div>
            </div>
            <div class="hero-panels" aria-label="University highlights">
                <a href="{{ url('/programmes')}}"><span>01</span><strong>Find your programme</strong><small>Discover your next path <b>→</b></small></a>
                <a href="{{ url('/schools') }}"><span>02</span><strong>Explore our schools</strong><small>Learn with purpose <b>→</b></small></a>
                <a href="{{ url('/accommodation') }}"><span>03</span><strong>Accommodations</strong><small>Meet your community <b>→</b></small></a>
            </div>
        </div>
    </section>
    <section class="intro" aria-labelledby="news-title">
        <div class="page-width">
            <div class="news-heading"><h1 id="news-title" class="section-title">Events And News</h1></div>
            <div class="news-carousel" aria-label="University news and events"><div class="news-track">
            @forelse ($posts as $post)
                <article class="news-card">
                    <div class="news-image">
                        @if ($post->images->first())<img src="{{ Storage::disk('public')->url($post->images->first()->path) }}" alt="{{ $post->images->first()->alt_text ?: $post->title }}">@else<img src="{{ asset('images/logo.png') }}" alt="Mukuba University">@endif
                        <p class="news-type">{{ ucfirst($post->category) }}</p>
                    </div>
                    <div class="news-card-body"><h2>{{ $post->title }}</h2><p>{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 130) }}</p><a href="{{ route('posts.show', $post) }}">Read more <span aria-hidden="true">&#8594;</span></a></div>
                </article>
            @empty
                <p class="page-description">There are no news, announcements or events to display right now.</p>
            @endforelse
            </div>
            </div>
        </div>
    </section>
    <section id="schools" class="section page-width" aria-labelledby="schools-title"><div class="school-heading"><h2 id="schools-title" class="section-title">Our Schools</h2></div><div class="school-carousel" aria-label="Mukuba University schools"><div class="school-grid" data-api-section="{{ route('data.home', 'schools') }}" aria-busy="true" aria-live="polite">@include('partials.loading')
    </div></div></section>
    <section id="programmes" class="section programmes" aria-labelledby="programmes-title"><div class="page-width"><h2 id="programmes-title" class="section-title">Programmes on offer</h2><div class="programme-grid">
        <a href="/programmes" class="programme-card-link"><article class="programme-card"><h3>Diploma Programmes</h3></article></a>
        <a href="/programmes" class="programme-card-link"><article class="programme-card"><h3>Bachelor's Degree Programmes</h3></article></a>
        <a href="/programmes" class="programme-card-link"><article class="programme-card"><h3>Masters Programmes</h3></article></a>
    </div><div class="hero-actions"><a id="apply" class="apply-button" href="#contact">Apply now</a></div></div></section>

    <section id="programs" class="section page-width" aria-labelledby="programs-title"><div class="school-heading">
        <h2 id="programs-title" class="section-title">Our Programs</h2>
        </div><div class="school-carousel" aria-label="Mukuba University programs"><div class="school-grid" data-api-section="{{ route('data.home', 'programs') }}" aria-busy="true" aria-live="polite">@include('partials.loading')
    </div></div></section>
    <section class="section page-width" aria-labelledby="study-title"><h2 id="study-title" class="section-title">Study Modes on offer</h2><div class="study-grid"><article><img src="{{ asset('images/Full-time.jpg') }}" alt="Students learning together"><h3>FULLTIME LEARNING MODE</h3></article><article><img src="{{ asset('images/home.jpg') }}" alt="Student reading"><h3>DISTANCE LEARNING MODE</h3></article></div></section>

    <section class="hostel-preview" aria-labelledby="hostel-preview-title">
        <div class="page-width">
            <div class="hostel-preview-heading">
                <div>
                    <p class="hostel-preview-kicker">Campus accommodation</p>
                    <h2 id="hostel-preview-title" class="section-title left">Our Hostels</h2>
                </div>
                <div class="hostel-preview-actions">
                    <a class="hostel-preview-link" href="/accommodation">View all hostels <span aria-hidden="true">&#8594;</span></a>
                </div>
            </div>
            <div class="hostel-carousel" role="region" aria-label="Mukuba University hostels" aria-roledescription="carousel">
                <div class="hostel-preview-grid">
                    <article class="hostel-preview-card">
                        <img src="{{ asset('images/to use/kariba.png') }}" alt="Bangweulu Hostel">
                        <h3>Bangweulu Hostel</h3>
                        <div class="hostel-preview-details"><span>Gender: Female</span><span>Combined: No</span></div>
                    </article>
                    <article class="hostel-preview-card">
                        <img src="{{ asset('images/to use/kafue.jpg') }}" alt="Kafue Hostel">
                        <h3>Kafue Hostel</h3>
                        <div class="hostel-preview-details"><span>Gender: Female</span><span>Combined: No</span></div>
                    </article>
                    <article class="hostel-preview-card">
                        <img src="{{ asset('images/to use/zambezi.jpg') }}" alt="Zambezi Hostel">
                        <h3>Zambezi Hostel</h3>
                        <div class="hostel-preview-details"><span>Gender: Female</span><span>Combined: No</span></div>
                    </article>
                    <article class="hostel-preview-card">
                        <img src="{{ asset('images/to use/kariba.png') }}" alt="Kariba Hostel">
                        <h3>Kariba Hostel</h3>
                        <div class="hostel-preview-details"><span>Gender: Male</span><span>Combined: No</span></div>
                    </article>
                    <article class="hostel-preview-card">
                        <img src="{{ asset('images/to use/luangwa.jpg') }}" alt="Luangwa Hostel">
                        <h3>Luangwa Hostel</h3>
                        <div class="hostel-preview-details"><span>Gender: Male</span><span>Combined: No</span></div>
                    </article>
                    <article class="hostel-preview-card">
                        <img src="{{ asset('images/to use/luangwa.jpg') }}" alt="Luapula Hostel">
                        <h3>Luapula Hostel</h3>
                        <div class="hostel-preview-details"><span>Gender: Male</span><span>Combined: No</span></div>
                    </article>
                    <article class="hostel-preview-card">
                        <img src="{{ asset('images/to use/mansion.png') }}" alt="Mansion">
                        <h3>Mansion</h3>
                        <div class="hostel-preview-details"><span>Gender: Male &amp; Female</span><span>Combined: Yes</span></div>
                    </article>
                    <article class="hostel-preview-card">
                        <img src="{{ asset('images/to use/lectures.jpg') }}" alt="Lecturers Compound">
                        <h3>Lecturers Compound</h3>
                        <div class="hostel-preview-details"><span>Gender: Male &amp; Female</span><span>Combined: Yes</span></div>
                    </article>
                </div>

            </div>
        </div>
    </section>

    <section class="strategic-section page-width" aria-labelledby="strategic-title">
        <div class="strategic-grid">
            <div class="strategic-copy">
                <p class="strategic-kicker">Our purpose</p>
                <h2 id="strategic-title" class="section-title left">Mukuba University</h2>
                <p>Mukuba University’s outstanding teaching and learning have given it a distinctive position in the higher education sector in the areas of Science Technology, Engineering, and Mathematics (STEM). As we progress, it is an opportune time to consolidate our strengths and identify opportunities for further development, to steer the University to the next level of excellence.</p>
                <p>After extensive consultations with various stakeholders of the University, a new Strategic Plan has been formulated in the context of providing quality scientific innovations, through teaching, research, community engagement and enterprise for sustainable development; we considered it a priority to further strengthen our academic development and research as well as community engagement.</p>
            </div>
            <div class="strategic-media">
                <video controls playsinline preload="metadata" poster="{{ asset('images/Mukuba University.jpg') }}">
                    <source src="{{ asset('images/WhatsApp-Video-2026-03-18-at-1.35.17-PM.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </section>

    <section class="alumni page-width" aria-labelledby="alumni-title"><h2 id="alumni-title" class="section-title">Graduates testimonies</h2><div class="alumni-quote"><div class="portrait">AM</div><p>"MUKU gave me the confidence to lead, the perspective to grow, and friendships I will always value."</p><strong>Alumni Association</strong></div></section>
    <section class="section page-width events" aria-labelledby="events-title">
        <h2 id="events-title" class="section-title">Events</h2>
        <div class="event-carousel" role="region" aria-label="Mukuba University event photos" aria-roledescription="carousel">
            <div class="event-track">
                @foreach (['eve.jpg', 'event.jpg', 'gr.jpg', 'grad.jpg', 'graduation.jpg', 'master.jpg', 'nut.jpg', 'womens day.jpeg'] as $eventPhoto)
                    <article class="event-slide" role="group" aria-roledescription="slide" aria-label="Event photo {{ $loop->iteration }} of {{ $loop->count }}">
                        <img src="{{ asset('images/events/' . $eventPhoto) }}" alt="Mukuba University event photo {{ $loop->iteration }}" @if ($loop->first) fetchpriority="high" @else loading="lazy" @endif>
                    </article>
                @endforeach
            </div>
            <div class="school-controls">
                <button class="school-control" type="button" data-event-prev aria-label="Show previous event photo"><span aria-hidden="true">&#8592;</span></button>
                <button class="school-control" type="button" data-event-next aria-label="Show next event photo"><span aria-hidden="true">&#8594;</span></button>
            </div>
        </div>
    </section>
    <section class="partner-strip" aria-labelledby="partners-title">
        <div class="page-width">
            <h2 id="partners-title" class="section-title">Our Partners</h2>
            <div class="partner-list" aria-label="University partners">
                <div class="partner-item"><img src="{{ asset('images/partners/cbu.png') }}" alt="Copperbelt University"></div>
                <div class="partner-item"><img src="{{ asset('images/partners/chinhoyi.png') }}" alt="Chinhoyi University of Technology"></div>
                <div class="partner-item"><img src="{{ asset('images/partners/hea.png') }}" alt="Higher Education Authority"></div>
                <div class="partner-item"><img src="{{ asset('images/partners/marondera-e1650547977760.png') }}" alt="Marondera University"></div>
                <div class="partner-item"><img src="{{ asset('images/partners/nstc.png') }}" alt="National Science and Technology Council"></div>
                <div class="partner-item"><img src="{{ asset('images/partners/Screenshot-2022-03-31-at-13-05-02-unesco-logo-260px.webp-WEBP-Image-260-×-173-pixels.png') }}" alt="UNESCO"></div>
                <div class="partner-item"><img src="{{ asset('images/partners/tcz2.jpg') }}" alt="TCZ"></div>
            </div>
        </div>
    </section>
</main>
<script>
    const setupCarousel = (trackSelector, cardSelector, previousSelector, nextSelector, gap, visibleCount = () => (window.innerWidth <= 760 ? 1 : window.innerWidth <= 960 ? 2 : 3), stepCount = () => 1) => {
        const track = document.querySelector(trackSelector);
        if (!track) return;
        const cards = [...track.querySelectorAll(cardSelector)];
        const previous = document.querySelector(previousSelector);
        const next = document.querySelector(nextSelector);
        if (!cards.length) {
            if (previous) previous.disabled = true;
            if (next) next.disabled = true;
            return;
        }
        let index = 0;
        let timer;

        const render = () => {
            const visible = typeof visibleCount === 'function' ? visibleCount() : visibleCount;
            const maxIndex = Math.max(0, cards.length - visible);
            index = Math.min(Math.max(index, 0), maxIndex);
            const cardWidth = cards[0].getBoundingClientRect().width;
            track.style.transform = `translateX(-${index * (cardWidth + gap)}px)`;
            if (previous) previous.disabled = index === 0;
            if (next) next.disabled = index === maxIndex;
        };

        const restart = () => {
            clearInterval(timer);
            timer = setInterval(() => {
                const visible = typeof visibleCount === 'function' ? visibleCount() : visibleCount;
                const step = typeof stepCount === 'function' ? stepCount() : stepCount;
                const maxIndex = Math.max(0, cards.length - visible);
                index = index >= maxIndex ? 0 : Math.min(index + step, maxIndex);
                render();
            }, 3000);
        };

        previous?.addEventListener('click', () => {
            const step = typeof stepCount === 'function' ? stepCount() : stepCount;
            index -= step;
            render();
            restart();
        });
        next?.addEventListener('click', () => {
            const step = typeof stepCount === 'function' ? stepCount() : stepCount;
            index += step;
            render();
            restart();
        });
        window.addEventListener('resize', render);
        render();
        restart();
    };

    document.addEventListener('api-section-loaded', (event) => {
        const resource = event.target.closest('#schools, #programs')?.id;
        if (!resource) return;
        const control = resource === 'schools' ? 'school' : 'program';
        setupCarousel('#' + resource + ' .school-grid', '.school-card', '[data-' + control + '-prev]', '[data-' + control + '-next]', 22);
    });
    document.querySelectorAll('[data-school-prev], [data-school-next], [data-program-prev], [data-program-next]').forEach(button => button.disabled = true);
    setupCarousel('.news-track', '.news-card', '[data-news-prev]', '[data-news-next]', 18, () => 1);
    setupCarousel('.school-grid', '.school-card', '[data-school-prev]', '[data-school-next]', 22);
    const hostelVisibleCards = () => (window.innerWidth <= 760 ? 1 : window.innerWidth <= 960 ? 2 : 3);
    setupCarousel('.hostel-preview-grid', '.hostel-preview-card', '[data-hostel-prev]', '[data-hostel-next]', 22, hostelVisibleCards, hostelVisibleCards);
    setupCarousel('.event-track', '.event-slide', '[data-event-prev]', '[data-event-next]', 0, () => 1);
</script>
@endsection
