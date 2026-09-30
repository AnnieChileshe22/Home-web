@extends('layouts.app')
@section('content')
<main id="top">
    <section class="hero" aria-labelledby="hero-title">
        <div class="page-width hero-inner">
            <div class="hero-copy">
                <p class="hero-kicker">Mukuba University</p>
                <h1 id="hero-title"><span class="hero-education">Education</span><br><span class="hero-freedom">Freedom</span> <span class="hero-responsibility">Responsibility</span></h1>
                <p>Join a university community where ambitious students turn knowledge into meaningful work.</p>
                <div class="hero-actions"><a class="hero-primary" href="https://unicosis.mukuba.edu.zm/login" target="_blank">Apply now</a></div>
            </div>
            <div class="hero-panels" aria-label="University highlights">
                <a href="#programmes"><span>01</span><strong>Find your programme</strong><small>Discover your next path <b>→</b></small></a>
                <a href="#schools"><span>02</span><strong>Explore our schools</strong><small>Learn with purpose <b>→</b></small></a>
                <a href="#contact"><span>03</span><strong>Accommodations</strong><small>Meet your community <b>→</b></small></a>
            </div>
        </div>
    </section>
    <section class="intro" aria-labelledby="news-title"><div class="page-width">
        <div class="news-heading"><h1 id="news-title" class="section-title">Events And News</h1><div class="news-controls"><button class="news-control" type="button" data-news-prev aria-label="Show previous news"><span aria-hidden="true">&#8592;</span></button><button class="news-control" type="button" data-news-next aria-label="Show next news"><span aria-hidden="true">&#8594;</span></button></div></div>
        <div class="news-carousel" aria-label="University news and events"><div class="news-track">
            <article class="news-card"><div class="news-image"><img src="{{ asset('images/campus/news-campus.jpg') }}" alt="Students on campus"><p class="news-type">Admissions</p></div><div class="news-card-body"><h2>Applications are now open</h2><p>Start your Mukuba University journey and submit your application for the next intake.</p><a href="#apply">Read more <span aria-hidden="true">&#8594;</span></a></div></article>
            <article class="news-card"><div class="news-image"><img src="{{ asset('images/campus/news-graduation.jpg') }}" alt="Graduates celebrating"><p class="news-type">Upcoming event</p></div><div class="news-card-body"><h2>12th graduation ceremony</h2><p>Join us as we celebrate the achievements of our graduating class and their families.</p><a href="#contact">Read more <span aria-hidden="true">&#8594;</span></a></div></article>
            <article class="news-card"><div class="news-image"><img src="{{ asset('images/campus/study-classroom.jpg') }}" alt="Students learning in a classroom"><p class="news-type">Academic notice</p></div><div class="news-card-body"><h2>Publication of results</h2><p>Students can review their latest examination results through the academic office.</p><a href="#contact">Read more <span aria-hidden="true">&#8594;</span></a></div></article>
            <article class="news-card"><div class="news-image"><img src="{{ asset('images/campus/program-degree.jpg') }}" alt="Students collaborating"><p class="news-type">Academic update</p></div><div class="news-card-body"><h2>Moving to semester learning</h2><p>Learn what the transition from terms to semester-based learning means for your studies.</p><a href="#programmes">Read more <span aria-hidden="true">&#8594;</span></a></div></article>
            <article class="news-card"><div class="news-image"><img src="{{ asset('images/campus/event-group.jpg') }}" alt="Students and staff at a university event"><p class="news-type">Campus life</p></div><div class="news-card-body"><h2>Student leadership forum</h2><p>Students and staff come together to shape a stronger campus community.</p><a href="#contact">Read more <span aria-hidden="true">&#8594;</span></a></div></article>
        </div></div>
    </div></section>
    <section id="schools" class="section page-width" aria-labelledby="schools-title"><div class="school-heading"><h2 id="schools-title" class="section-title">Our Schools</h2><div class="school-controls"><button class="school-control" type="button" data-school-prev aria-label="Show previous schools"><span aria-hidden="true">&#8592;</span></button><button class="school-control" type="button" data-school-next aria-label="Show next schools"><span aria-hidden="true">&#8594;</span></button></div></div><div class="school-carousel" aria-label="Mukuba University schools"><div class="school-grid">
        <article class="school-card"><img src="{{ asset('images/smns.jpeg') }}" alt="Students studying natural sciences"><h3>School of Mathematics and Natural Sciences</h3><a href="#programmes">Learn more</a></article>
        <article class="school-card"><img src="{{ asset('images/NUT.jpeg') }}" alt="Students studying natural sciences"><h3>School of Applied Sciences And Technology</h3><a href="#programmes">Learn more</a></article>
        <article class="school-card"><img src="{{ asset('images/agric.jpg') }}" alt="University landscape"><h3>School of Agriculture and Environmental Sciences</h3><a href="#programmes">Learn more</a></article>
        <article class="school-card"><img src="{{ asset('images/teach.jpg') }}" alt="Education students"><h3>School of Education</h3><a href="#programmes">Learn more</a></article>
        <article class="school-card"><img src="{{ asset('images/logo.png') }}" alt="Students collaborating on a project"><h3>School of Engineering</h3><a href="#programmes">Learn more</a></article>
        <article class="school-card"><img src="{{ asset('images/logo.png') }}" alt="Students learning in a classroom"><h3>School of Medicine</h3><a href="#programmes">Learn more</a></article>
    </div></div></section>
    <section id="programmes" class="section programmes" aria-labelledby="programmes-title"><div class="page-width"><h2 id="programmes-title" class="section-title">Programmes on offer</h2><div class="programme-grid">
        <a href="/programmes" class="programme-card-link"><article class="programme-card"><h3>Diploma Programmes</h3></article></a>
        <a href="/programmes" class="programme-card-link"><article class="programme-card"><h3>Bachelor's Degree Programmes</h3></article></a>
        <a href="/programmes" class="programme-card-link"><article class="programme-card"><h3>Masters Programmes</h3></article></a>
    </div><div class="hero-actions"><a id="apply" class="apply-button" href="#contact">Apply now</a></div></div></section>
    <section class="section page-width" aria-labelledby="study-title"><h2 id="study-title" class="section-title">Study Modes on offer</h2><div class="study-grid"><article><img src="{{ asset('images/campus/study-classroom.jpg') }}" alt="Students learning together"><h3>FULLTIME LEARNING MODE</h3></article><article><img src="{{ asset('images/campus/study-student.jpg') }}" alt="Student reading"><h3>DISTANCE LEARNING MODE</h3></article></div></section>

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
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </section>

    <section class="alumni page-width" aria-labelledby="alumni-title"><h2 id="alumni-title" class="section-title">Graduates testimonies</h2><div class="alumni-quote"><div class="portrait">AM</div><p>"MUKU gave me the confidence to lead, the perspective to grow, and friendships I will always value."</p><strong>Alumni Association</strong></div></section>
    <section class="section page-width events" aria-labelledby="events-title"><h2 id="events-title" class="section-title">Events</h2><img src="{{ asset('images/campus/event-group.jpg') }}" alt="University students and staff at an event"><p>Celebrating community, achievement and a shared future.</p></section>
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
<script>const visibleCards=()=>window.innerWidth<=760?1:window.innerWidth<=960?2:3;const setupCarousel=(trackSelector,cardSelector,previousSelector,nextSelector,gap)=>{const track=document.querySelector(trackSelector);const cards=[...document.querySelectorAll(cardSelector)];const previous=document.querySelector(previousSelector);const next=document.querySelector(nextSelector);let index=0;let timer;const render=()=>{const maxIndex=Math.max(0,cards.length-visibleCards());index=Math.min(Math.max(index,0),maxIndex);const cardWidth=cards[0].getBoundingClientRect().width;track.style.transform=`translateX(-${index*(cardWidth+gap)}px)`;previous.disabled=index===0;next.disabled=index===maxIndex;};const restart=()=>{clearInterval(timer);timer=setInterval(()=>{const maxIndex=Math.max(0,cards.length-visibleCards());index=index>=maxIndex?0:index+1;render();},3000);};previous.addEventListener('click',()=>{index--;render();restart();});next.addEventListener('click',()=>{index++;render();restart();});window.addEventListener('resize',render);render();restart();};setupCarousel('.news-track','.news-card','[data-news-prev]','[data-news-next]',18);setupCarousel('.school-grid','.school-card','[data-school-prev]','[data-school-next]',22);</script>
@endsection