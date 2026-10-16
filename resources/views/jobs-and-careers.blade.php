@extends('layouts.app')

@section('content')
    <main class="news-events-page jobs-page">
        <div class="page-width news-events-wrap">
            <header class="news-events-intro">
                <p class="news-events-eyebrow">MUKUBA UNIVERSITY</p>
                <h1>Jobs &amp; Careers</h1>
                <p>Explore employment opportunities at Mukuba University and career guidance available to our students.</p>
                <nav class="news-events-jump" aria-label="Jobs and careers sections">
                    <a href="#vacancies">Vacancy Notices</a>
                    <a href="#career-guidance">Student Career Guidance</a>
                </nav>
            </header>

            <section class="news-events-section" id="vacancies" aria-labelledby="vacancies-title">
                <div class="news-events-section-heading">
                    <div>
                        <p class="news-events-eyebrow">WORK WITH US</p>
                        <h2 id="vacancies-title">Vacancy Notices</h2>
                    </div>
                </div>
                <div class="jobs-vacancy-panel">
                    <div class="jobs-vacancy-mark" aria-hidden="true">
                        <svg viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18m-11 0v2h4v-2"/></svg>
                    </div>
                    <div class="jobs-vacancy-copy">
                        <h3>Find current opportunities</h3>
                        <p>Vacancy announcements are published through the University’s official jobs page. Visit it for current notices and application information.</p>
                        <a class="news-events-read" href="https://mukuba.edu.zm/jobs/" target="_blank" rel="noopener noreferrer">
                            Visit official jobs page <span aria-hidden="true">&#8599;</span>
                        </a>
                    </div>
                </div>
                <p class="jobs-vacancy-note">This website does not currently display vacancy listings. Follow the official jobs page for the latest notices.</p>
            </section>

            <section class="news-events-section" id="career-guidance" aria-labelledby="career-guidance-title">
                <div class="news-events-section-heading">
                    <div>
                        <p class="news-events-eyebrow">STUDENT SUPPORT</p>
                        <h2 id="career-guidance-title">Career Guidance for Students</h2>
                    </div>
                </div>
                <article class="jobs-guidance-card">
                    <div>
                        <h3>Plan your next steps</h3>
                        <p>The Career Guidance and Counselling Unit in the Dean of Students’ office supports students as they explore career opportunities. Its work includes career talks, engagement with employers, and helping students source vacancy information.</p>
                    </div>
                    <a class="jobs-text-link" href="{{ url('/dean-of-students') }}">Learn about Student Affairs <span aria-hidden="true">&#8594;</span></a>
                </article>
            </section>

            <aside class="jobs-contact-panel" aria-labelledby="jobs-contact-title">
                <div>
                    <p class="news-events-eyebrow">GET IN TOUCH</p>
                    <h2 id="jobs-contact-title">General University enquiries</h2>
                    <p>For general enquiries, contact Mukuba University using the details below.</p>
                </div>
                <div class="jobs-contact-links">
                    <a href="tel:+26021291218">+260 212 91218</a>
                    <a href="mailto:registrar@mukuba.edu.zm">registrar@mukuba.edu.zm</a>
                </div>
            </aside>
        </div>
    </main>
@endsection
