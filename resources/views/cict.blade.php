@extends('layouts.app')

@section('title', 'Center for ICT | Mukuba University')

@section('content')
    <main class="cict-page">
        <section class="cict-hero" aria-labelledby="cict-title">
            <div class="page-width cict-hero-inner">
                <div class="cict-hero-copy">
                    <p class="cict-eyebrow">MUKUBA UNIVERSITY · DIGITAL SERVICES</p>
                    <h1 id="cict-title">Center for Information Communication Technology</h1>
                    <p>Information and Communications Technologies aims to harness ICTs to meet education needs within and beyond Mukuba University.</p>
                    <div class="cict-hero-actions">
                        <a class="cict-primary-link" href="#departments">Explore our departments <span aria-hidden="true">&#8595;</span></a>
                        <a class="cict-outline-link" href="#ict-policy">ICT Policy</a>
                    </div>
                </div>
                <div class="cict-hero-graphic" aria-hidden="true">
                    <svg viewBox="0 0 180 180" fill="none"><rect x="38" y="42" width="104" height="73" rx="8"/><path d="M28 127h124l-10 12H38l-10-12Z"/><path d="M58 101V72l17-14 18 20 19-23 13 13"/><circle cx="58" cy="101" r="4"/><circle cx="75" cy="58" r="4"/><circle cx="93" cy="78" r="4"/><circle cx="112" cy="55" r="4"/><circle cx="125" cy="68" r="4"/><path d="M89 18v15m47 6 11-11M34 39 23 28m123 66h16M18 94h16"/></svg>
                    <span>Connecting learning, research &amp; campus services</span>
                </div>
            </div>
        </section>

        <nav class="cict-page-nav" aria-label="On this page">
            <div class="page-width">
                <a href="#vision-mission">Vision &amp; Mission</a>
                <a href="#ict-policy">ICT Policy</a>
                <a href="#departments">Departments</a>
                <a href="#cict-staff">CICT Staff</a>
                <a href="#careers">Career Opportunities</a>
            </div>
        </nav>

        <section class="cict-purpose-section" id="vision-mission" aria-label="CICT vision and mission">
            <div class="page-width cict-purpose-grid">
                <article class="cict-purpose-card cict-vision-card">
                    <span class="cict-section-number" aria-hidden="true">01</span>
                    <p class="cict-eyebrow">OUR VISION</p>
                    <h2>Transformative Agent in Teaching, Learning and Research processes.</h2>
                </article>
                <article class="cict-purpose-card">
                    <span class="cict-section-number" aria-hidden="true">02</span>
                    <p class="cict-eyebrow">OUR MISSION</p>
                    <h2>Lead the University’s ICT policy directions and deliver effective ICT services.</h2>
                    <p>To lead the University’s ICT policy directions, implement ICT Service Management and best practices in order to facilitate efficiency, effectiveness and innovation in the University’s business processes through provision and support of required information technology services and infrastructure.</p>
                </article>
            </div>
        </section>

        <section class="cict-policy-section" id="ict-policy" aria-labelledby="ict-policy-title">
            <div class="page-width cict-policy-panel">
                <div class="cict-policy-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24"><path d="M6 3h8l4 4v14H6z"/><path d="M14 3v5h5M9 13h6m-6 4h6"/></svg>
                </div>
                <div class="cict-policy-copy">
                    <p class="cict-eyebrow">INFORMATION &amp; RESPONSIBLE USE</p>
                    <h2 id="ict-policy-title">ICT Policy</h2>
                    <p>The general policies provide guidelines on acceptable and responsible use of ICT services, and on handling information accessed or provided through platforms provided by Mukuba University.</p>
                </div>
                <a class="cict-policy-button" href="https://mukuba.edu.zm/wp-content/uploads/2022/11/MUKUBA-ICT-POLICY.pdf" target="_blank" rel="noopener noreferrer">Read the Mukuba ICT Policy <span aria-hidden="true">&#8599;</span></a>
            </div>
        </section>

        <section class="cict-support-section" aria-label="ICT support and campus facilities">
            <div class="page-width cict-support-grid">
                <article class="cict-support-card">
                    <p class="cict-eyebrow">SUPPORT &amp; TRAINING</p>
                    <h2>Striving to provide the best support services</h2>
                    <p>We are committed to continuous improvement and to supporting staff and students as they innovate. CICT provides training in the use of software and hardware supplied by the institution, with hands-on learning experiences.</p>
                </article>
                <article class="cict-support-card cict-support-card-campus">
                    <p class="cict-eyebrow">LEARNING ENVIRONMENTS</p>
                    <h2>The best campus facilities</h2>
                    <p>Alongside the online classroom, students can take part in a live classroom on the Itimpi campus in Kitwe, with access to campus facilities and computer equipment.</p>
                </article>
            </div>
        </section>

        <section class="cict-departments-section" id="departments" aria-labelledby="departments-title">
            <div class="page-width">
                <header class="cict-section-heading">
                    <p class="cict-eyebrow">HOW WE WORK</p>
                    <h2 id="departments-title">Departments</h2>
                    <p>Three departments work together to support the University’s information technology services and infrastructure.</p>
                </header>
                <div class="cict-department-grid">
                    <article class="cict-department-card">
                        <span class="cict-department-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5"/><path d="M3.8 9h16.4M3.8 15h16.4M12 3.5c2.2 2.4 3.2 5.2 3.2 8.5s-1 6.1-3.2 8.5c-2.2-2.4-3.2-5.2-3.2-8.5s1-6.1 3.2-8.5Z"/></svg></span>
                        <p class="cict-eyebrow">01 · CONNECTIVITY</p>
                        <h3>Networks &amp; Communications Department</h3>
                        <p>Establishes, installs, manages and maintains University network and communications infrastructure to support secure, reliable access to internet, extranet and intranet services.</p>
                    </article>
                    <article class="cict-department-card">
                        <span class="cict-department-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="13" rx="2"/><path d="M8 21h8m-4-4v4m-5-9 3-3 2 2 4-5"/></svg></span>
                        <p class="cict-eyebrow">02 · SYSTEMS</p>
                        <h3>Applications &amp; Business Systems Department</h3>
                        <p>Plans and supports ICT-based solutions and business applications that serve the University’s short-, medium- and long-term objectives.</p>
                    </article>
                    <article class="cict-department-card">
                        <span class="cict-department-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3a9 9 0 1 0 9 9"/><path d="M12 7v5l3 2m2-11h4v4m0-4-7 7"/></svg></span>
                        <p class="cict-eyebrow">03 · USER SERVICES</p>
                        <h3>End-User Support Department</h3>
                        <p>Helps users with installed applications and ICT infrastructure, provides end-user training, and records support incidents, requests and suggestions.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="cict-staff-section" id="cict-staff" aria-labelledby="cict-staff-title">
            <div class="page-width">
                <header class="cict-section-heading">
                    <p class="cict-eyebrow">THE PEOPLE BEHIND THE SERVICE</p>
                    <h2 id="cict-staff-title">CICT Staff</h2>
                </header>
                <div class="cict-staff-grid">
                    <article class="cict-staff-card"><span class="cict-staff-initials" aria-hidden="true">BK</span><h3>Mr. Donald Mushabati</h3><p>Manager</p></article>
                    <article class="cict-staff-card"><span class="cict-staff-initials" aria-hidden="true">JK</span><h3>Mr. Joshua Kamwi</h3><p>Systems Administrator</p></article>
                    <article class="cict-staff-card"><span class="cict-staff-initials" aria-hidden="true">JT</span><h3>Mr. Francis Chisenga</h3><p>Network Administrator</p></article>
                    <article class="cict-staff-card"><span class="cict-staff-initials" aria-hidden="true">MN</span><h3>Miss. Martha Nyirongo</h3><p>End User Support</p></article>
                    <article class="cict-staff-card"><span class="cict-staff-initials" aria-hidden="true">FC</span><h3></h3>Mrs Naomi Bwalya<p>End User Support</p></article>
                </div>
            </div>
        </section>

        <section class="cict-careers-section" id="careers" aria-labelledby="careers-title">
            <div class="page-width cict-careers-panel">
                <div><p class="cict-eyebrow">CAREER OPPORTUNITIES</p><h2 id="careers-title">Join the CICT team</h2><p>No vacancies are currently available.</p></div>
                <span class="cict-vacancy-status"><span aria-hidden="true"></span>No current vacancies</span>
            </div>
        </section>

        <section class="cict-strategy-section" id="strategy-planning" aria-labelledby="strategy-title">
            <div class="page-width cict-strategy-content">
                <p class="cict-eyebrow">LOOKING AHEAD</p>
                <h2 id="strategy-title">Strategy and Planning</h2>
                <p>CICT leads the University’s ICT policy directions and puts ICT Service Management practices into action to support efficiency, effectiveness and innovation across University processes.</p>
                <a href="https://mukuba.edu.zm/strategic-plan/" target="_blank" rel="noopener noreferrer">Read More about Strategy and Planning <span aria-hidden="true">&#8599;</span></a>
            </div>
        </section>
    </main>
@endsection
