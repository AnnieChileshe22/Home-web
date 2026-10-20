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
    <section class="announcement-section" aria-labelledby="announcements-title">
        <div class="page-width">
            <h2 class="announcement-section-title" id="announcements-title">Announcements</h2>
            <div class="announcement-carousel" role="region" aria-roledescription="carousel" aria-label="Important university announcements" data-announcement-carousel>
                <div class="announcement-track" data-announcement-track aria-live="off">
                    @forelse ($announcements as $announcement)
                        <article class="announcement-slide" role="group" aria-roledescription="slide" aria-label="Announcement {{ $loop->iteration }} of {{ $loop->count }}" data-announcement-slide>
                            <span class="announcement-label">Important notice</span>
                            <h2>{{ $announcement->title }}</h2>
                            @if ($announcement->body)<p>{{ \Illuminate\Support\Str::limit(strip_tags($announcement->body), 240) }}</p>@endif
                            @if ($announcement->attachments->isNotEmpty())
                                <div class="announcement-attachments">
                                    @foreach ($announcement->attachments as $attachment)
                                        @if (str_starts_with($attachment->mime_type, 'image/'))
                                            <a class="announcement-image-link" href="{{ Storage::disk('public')->url($attachment->path) }}"><img src="{{ Storage::disk('public')->url($attachment->path) }}" alt="{{ $attachment->original_name }}"></a>
                                        @else
                                            <a class="announcement-view" href="{{ Storage::disk('public')->url($attachment->path) }}" target="_blank" rel="noopener noreferrer"><span aria-hidden="true">&#128196;</span><span>{{ $attachment->original_name }}</span><span class="announcement-file-type">PDF</span></a>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <a class="announcement-view" href="{{ route('announcements.show', $announcement) }}">Read full announcement <span aria-hidden="true">&#8594;</span></a>
                            @endif
                        </article>
                    @empty
                        <article class="announcement-slide announcement-empty" role="group" aria-roledescription="slide" data-announcement-slide>
                            <span class="announcement-label">Important notice</span>
                            <h2>No current announcements</h2>
                            <p>Check back here for important university updates.</p>
                        </article>
                    @endforelse
                </div>
                @if ($announcements->count() > 1)
                    <button class="announcement-control announcement-previous" type="button" data-announcement-prev aria-label="Show previous announcement"><span aria-hidden="true">&#8249;</span></button>
                    <button class="announcement-control announcement-next" type="button" data-announcement-next aria-label="Show next announcement"><span aria-hidden="true">&#8250;</span></button>
                @endif
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
        <a href="{{ route('programs.index', ['qualification' => 'Diploma']) }}" class="programme-card-link"><article class="programme-card"><h3>Diploma Programmes</h3></article></a>
        <a href="{{ route('programs.index', ['qualification' => 'BSc']) }}" class="programme-card-link"><article class="programme-card"><h3>Bachelor's Degree Programmes</h3></article></a>
        <a href="{{ route('programs.index', ['qualification' => 'MSc']) }}" class="programme-card-link"><article class="programme-card"><h3>Masters Programmes</h3></article></a>
    </div><div class="hero-actions"><a id="apply" class="apply-button" href="https://unicosis.mukuba.edu.zm/login">Apply now</a></div></div></section>

    <section id="programs" class="section page-width" aria-labelledby="programs-title"><div class="school-heading">
        <h2 id="programs-title" class="section-title">Our Programs</h2>
        </div><div class="school-carousel" aria-label="Mukuba University programs"><div class="school-grid" data-api-section="{{ route('data.home', 'programs') }}" aria-busy="true" aria-live="polite">@include('partials.loading')
    </div></div></section>
    <section class="section page-width" aria-labelledby="study-title"><h2 id="study-title" class="section-title">Study Modes on offer</h2><div class="study-grid"><article><img src="{{ asset('images/Full-time.jpg') }}" alt="Students learning together"><h3>FULLTIME LEARNING MODE</h3></article><article><img src="{{ asset('images/home.jpg') }}" alt="Student reading"><h3>DISTANCE LEARNING MODE</h3></article></div></section>

    <section class="hostel-preview" aria-labelledby="hostel-preview-title">
        <div class="page-width">
            <div class="hostel-preview-heading">
                <div>
                    <h2 id="hostel-preview-title" class="section-title left">Our Hostels</h2>
                </div>
                <div class="hostel-preview-actions">
                    <a class="hostel-preview-link" href="/accommodation">View all hostels <span aria-hidden="true">&#8594;</span></a>
                </div>
            </div>
            <div class="hostel-carousel" role="region" aria-label="Mukuba University hostels" aria-roledescription="carousel">
                <div class="hostel-preview-grid">
                    @forelse ($hostels as $hostel)
                        <a class="hostel-preview-card" href="{{ route('hostels.public.show', $hostel) }}" aria-label="View {{ $hostel->name }} details">
                            @if ($hostel->images->first())
                                <img src="{{ Storage::disk('public')->url($hostel->images->first()->path) }}" alt="{{ $hostel->images->first()->alt_text ?: $hostel->name }}">
                            @else
                                <img src="{{ asset('images/logo.png') }}" alt="Mukuba University">
                            @endif
                            <h3>{{ $hostel->name }}</h3>
                            <div class="hostel-preview-details">
                                @forelse (collect($hostel->features ?? [])->take(3) as $feature)
                                    <span>{{ $feature }}</span>
                                @empty
                                    <span>{{ ucfirst($hostel->gender) }} hostel</span>
                                @endforelse
                            </div>
                        </a>
                    @empty
                        <p class="page-description">Hostel listings will be available soon.</p>
                    @endforelse
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
        <div class="event-carousel" role="region" aria-label="University events" aria-roledescription="carousel" data-event-carousel>
            @if ($events->isNotEmpty())
            <div class="event-track" data-event-track aria-live="off">
                @foreach ($events as $event)
                    @php($eventImage = $event->images->first())
                    <article class="event-slide" role="group" aria-roledescription="slide" aria-label="{{ $loop->iteration }} of {{ $loop->count }}" data-event-slide>
                        <a class="event-slide-link" href="{{ route('posts.show', $event) }}" tabindex="{{ $loop->first ? '0' : '-1' }}">
                            @if ($eventImage)
                                <img src="{{ Storage::disk('public')->url($eventImage->path) }}" alt="{{ $eventImage->alt_text ?: $event->title }}" @if ($loop->first) fetchpriority="high" @else loading="lazy" @endif>
                            @else
                                <div class="event-slide-fallback" aria-hidden="true"><img src="{{ asset('images/logo.png') }}" alt=""></div>
                            @endif
                            <h3>{{ $event->title }}</h3>
                        </a>
                    </article>
                @endforeach
            </div>
            @if ($events->count() > 1)
            <div class="school-controls">
                <button class="school-control" type="button" data-event-prev aria-label="Show previous event"><span aria-hidden="true">&#8592;</span></button>
                <button class="school-control" type="button" data-event-next aria-label="Show next event"><span aria-hidden="true">&#8594;</span></button>
            </div>
            <div class="event-pagination" aria-label="Choose an event slide">
                @foreach ($events as $event)
                    <button type="button" data-event-dot="{{ $loop->index }}" aria-label="Show event {{ $loop->iteration }}: {{ $event->title }}" @if ($loop->first) aria-current="true" @endif></button>
                @endforeach
            </div>
            @endif
            @else
                <p class="event-empty">There are no published events to display right now.</p>
            @endif
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
    const announcementCarousel = document.querySelector('[data-announcement-carousel]');
    if (announcementCarousel) {
        const announcementTrack = announcementCarousel.querySelector('[data-announcement-track]');
        const announcementSlides = [...announcementTrack.querySelectorAll('[data-announcement-slide]')];
        const announcementPrevious = announcementCarousel.querySelector('[data-announcement-prev]');
        const announcementNext = announcementCarousel.querySelector('[data-announcement-next]');
        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        let announcementIndex = 0;
        let announcementTimer;
        const showAnnouncement = (index) => {
            announcementIndex = (index + announcementSlides.length) % announcementSlides.length;
            announcementTrack.style.transform = `translateX(-${announcementIndex * announcementCarousel.clientWidth}px)`;
            announcementSlides.forEach((slide, slideIndex) => {
                const active = slideIndex === announcementIndex;
                slide.setAttribute('aria-hidden', String(!active));
                slide.inert = !active;
            });
        };
        window.addEventListener('resize', () => showAnnouncement(announcementIndex));
        const stopAnnouncementTimer = () => window.clearInterval(announcementTimer);
        const startAnnouncementTimer = () => {
            stopAnnouncementTimer();
            if (announcementSlides.length > 1 && !reducedMotion) {
                announcementTimer = window.setInterval(() => showAnnouncement(announcementIndex + 1), 6500);
            }
        };
        announcementPrevious?.addEventListener('click', () => { showAnnouncement(announcementIndex - 1); startAnnouncementTimer(); });
        announcementNext?.addEventListener('click', () => { showAnnouncement(announcementIndex + 1); startAnnouncementTimer(); });
        announcementCarousel.addEventListener('pointerenter', stopAnnouncementTimer);
        announcementCarousel.addEventListener('pointerleave', startAnnouncementTimer);
        announcementCarousel.addEventListener('focusin', stopAnnouncementTimer);
        announcementCarousel.addEventListener('focusout', (event) => {
            if (!announcementCarousel.contains(event.relatedTarget)) startAnnouncementTimer();
        });
        showAnnouncement(0);
        startAnnouncementTimer();
    }
    setupCarousel('.school-grid', '.school-card', '[data-school-prev]', '[data-school-next]', 22);
    const hostelVisibleCards = () => (window.innerWidth <= 760 ? 1 : window.innerWidth <= 960 ? 2 : 3);
    setupCarousel('.hostel-preview-grid', '.hostel-preview-card', '[data-hostel-prev]', '[data-hostel-next]', 22, hostelVisibleCards, hostelVisibleCards);
    const eventCarousel = document.querySelector('[data-event-carousel]');
    if (eventCarousel) {
        const eventTrack = eventCarousel.querySelector('[data-event-track]');
        const eventSlides = [...eventCarousel.querySelectorAll('[data-event-slide]')];
        const eventDots = [...eventCarousel.querySelectorAll('[data-event-dot]')];
        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        let eventIndex = 0;
        let eventTimer;
        const showEvent = (index) => {
            eventIndex = (index + eventSlides.length) % eventSlides.length;
            eventTrack.style.transform = `translateX(-${eventIndex * 100}%)`;
            eventSlides.forEach((slide, slideIndex) => {
                const active = slideIndex === eventIndex;
                slide.setAttribute('aria-hidden', String(!active));
                slide.inert = !active;
                const link = slide.querySelector('.event-slide-link');
                if (link) link.tabIndex = active ? 0 : -1;
            });
            eventDots.forEach((dot, dotIndex) => {
                if (dotIndex === eventIndex) dot.setAttribute('aria-current', 'true');
                else dot.removeAttribute('aria-current');
            });
        };
        const stopEventTimer = () => window.clearInterval(eventTimer);
        const startEventTimer = () => {
            stopEventTimer();
            if (eventSlides.length > 1 && !reducedMotion) eventTimer = window.setInterval(() => showEvent(eventIndex + 1), 6500);
        };
        eventCarousel.querySelector('[data-event-prev]')?.addEventListener('click', () => { showEvent(eventIndex - 1); startEventTimer(); });
        eventCarousel.querySelector('[data-event-next]')?.addEventListener('click', () => { showEvent(eventIndex + 1); startEventTimer(); });
        eventDots.forEach(dot => dot.addEventListener('click', () => { showEvent(Number(dot.dataset.eventDot)); startEventTimer(); }));
        eventCarousel.addEventListener('pointerenter', stopEventTimer);
        eventCarousel.addEventListener('pointerleave', startEventTimer);
        eventCarousel.addEventListener('focusin', stopEventTimer);
        eventCarousel.addEventListener('focusout', event => { if (!eventCarousel.contains(event.relatedTarget)) startEventTimer(); });
        let pointerStartX = null;
        eventCarousel.addEventListener('touchstart', event => { pointerStartX = event.changedTouches[0].clientX; }, { passive: true });
        eventCarousel.addEventListener('touchend', event => {
            if (pointerStartX === null) return;
            const distance = event.changedTouches[0].clientX - pointerStartX;
            pointerStartX = null;
            if (Math.abs(distance) > 45 && eventSlides.length > 1) { showEvent(eventIndex + (distance < 0 ? 1 : -1)); startEventTimer(); }
        }, { passive: true });
        if (eventSlides.length) { showEvent(0); startEventTimer(); }
    }
</script>
@endsection
