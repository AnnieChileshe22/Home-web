@extends('layouts.app')

@section('title', 'Library | Mukuba University')

@section('content')
    <main class="library-page">
        <section class="library-hero" aria-labelledby="library-title">
            <img class="library-hero-image" src="{{ asset('images/library.jpg') }}" alt="Mukuba University Library building">
            <div class="library-hero-shade" aria-hidden="true"></div>
            <div class="page-width library-hero-content">
                <p class="library-eyebrow">MUKUBA UNIVERSITY</p>
                <h1 id="library-title">Mukuba Library</h1>
                <p>Information and resources for the learning, teaching and research needs of our university community.</p>
                <div class="library-hero-actions">
                    <a class="library-primary-action" href="#quick-links">Explore Library Resources <span aria-hidden="true">&#8595;</span></a>
                    <a class="library-secondary-action" href="#hours-contact">Hours &amp; Contact</a>
                </div>
            </div>
            <span class="library-image-credit">Our Library</span>
        </section>

        <section class="library-quick-section" id="quick-links" aria-labelledby="quick-links-title">
            <div class="page-width">
                <div class="library-section-heading">
                    <div><p class="library-eyebrow">START HERE</p><h2 id="quick-links-title">Quick Links</h2></div>
                    <p>Go straight to the Library’s catalogue and online services.</p>
                </div>
                <div class="library-quick-grid">
                    <a class="library-quick-link" href="https://elibrary.mukuba.edu.zm/" target="_blank" rel="noopener noreferrer"><span class="library-link-icon" aria-hidden="true">01</span><span><strong>Institutional Repository</strong><small>E-Library</small></span><span class="library-link-arrow" aria-hidden="true">&#8599;</span></a>
                    <a class="library-quick-link" href="https://muklib.mukuba.edu.zm/" target="_blank" rel="noopener noreferrer"><span class="library-link-icon" aria-hidden="true">02</span><span><strong>Library Management System</strong><small>KOHA</small></span><span class="library-link-arrow" aria-hidden="true">&#8599;</span></a>
                    <a class="library-quick-link" href="https://muklib.mukuba.edu.zm/" target="_blank" rel="noopener noreferrer"><span class="library-link-icon" aria-hidden="true">03</span><span><strong>Online Public Access Catalogue</strong><small>Search the catalogue</small></span><span class="library-link-arrow" aria-hidden="true">&#8599;</span></a>
                    <a class="library-quick-link" href="https://zalico.remotexs.co/user/login" target="_blank" rel="noopener noreferrer"><span class="library-link-icon" aria-hidden="true">04</span><span><strong>Remote Access</strong><small>RemoteXs</small></span><span class="library-link-arrow" aria-hidden="true">&#8599;</span></a>
                    <a class="library-quick-link" href="https://www.research4life.org/" target="_blank" rel="noopener noreferrer"><span class="library-link-icon" aria-hidden="true">05</span><span><strong>Research4Life</strong><small>Academic and professional content for the developing world</small></span><span class="library-link-arrow" aria-hidden="true">&#8599;</span></a>
                    <a class="library-quick-link library-quick-link-internal" href="#open-resources"><span class="library-link-icon" aria-hidden="true">06</span><span><strong>Open Access</strong><small>Browse open access resources</small></span><span class="library-link-arrow" aria-hidden="true">&#8595;</span></a>
                </div>
                <p class="library-resource-note">The supplied Library information also lists E-Library, African Development Data Portal and Exam Past Papers, but does not provide separate access links for these services. Please ask Library staff for current access details.</p>
            </div>
        </section>

        <section class="library-about-section" aria-labelledby="about-library-title">
            <div class="page-width library-about-grid">
                <div class="library-about-copy">
                    <p class="library-eyebrow">UP TO DATE</p>
                    <h2 id="about-library-title">Our Library</h2>
                    <p class="library-lead">The University Library is the principal information provider for all students and staff. It focuses on meeting the learning, teaching and research needs of the University by developing and sustaining an up-to-date collection of information and resources.</p>
                    <p>The Library serves every department and stocks books for the School of Mathematical and Natural Sciences, School of Education, School of Applied Science and Technology, and School of Open and Distance Learning. Users can access physical books and e-resources to support research and study.</p>
                    <p>The integrated library system, KOHA, is available through student workstations (terminals) in the Library. Services also include printing, bindery, photocopying, internet access and research guidance.</p>
                </div>
                <aside class="library-services-panel" aria-labelledby="library-services-title">
                    <p class="library-eyebrow">HERE TO HELP</p>
                    <h2 id="library-services-title">Library Services</h2>
                    <ul>
                        <li><span aria-hidden="true">&#10003;</span> Lending of books</li>
                        <li><span aria-hidden="true">&#10003;</span> Printing and photocopying</li>
                        <li><span aria-hidden="true">&#10003;</span> Bindery and reprographics</li>
                        <li><span aria-hidden="true">&#10003;</span> E-Library services</li>
                        <li><span aria-hidden="true">&#10003;</span> Information literacy training</li>
                        <li><span aria-hidden="true">&#10003;</span> Research guidance and internet access</li>
                    </ul>
                    <a href="https://muklib.mukuba.edu.zm/" target="_blank" rel="noopener noreferrer">Open the Library catalogue <span aria-hidden="true">&#8599;</span></a>
                </aside>
            </div>
        </section>

        <section class="library-purpose-section" aria-label="Library mission and vision">
            <div class="page-width library-purpose-grid">
                <article class="library-purpose-card">
                    <p class="library-eyebrow">OUR PURPOSE</p>
                    <h2>Mission</h2>
                    <p>To promote information and digital literacy to all students, staff and the university community. Through collaboration, research and critical thinking, students will become proficient learners in accessing and using information in the 21st century.</p>
                </article>
                <article class="library-purpose-card library-purpose-card-accent">
                    <p class="library-eyebrow">OUR ASPIRATION</p>
                    <h2>Vision</h2>
                    <p>We aspire to develop a cadre of students able to seek ideas and information, nurture an interest in reading and lifelong learning for a 21st century learner.</p>
                </article>
            </div>
        </section>

        <section class="library-history-section" aria-labelledby="library-history-title">
            <div class="page-width library-history-grid">
                <div>
                    <p class="library-eyebrow">GROWING WITH THE UNIVERSITY</p>
                    <h2 id="library-history-title">History of Mukuba Library</h2>
                </div>
                <div class="library-history-copy">
                    <p>The Library’s story is one of continuing renovation, expansion and growth. It began as part of St. Francis Secondary School, built by the Franciscans in 1958. In 1969 it was taken over by the Zambia Bishops’ Conference, and in 1974 by the Ministry of Education as Copperbelt Secondary Teachers College (COSETCO), which trained secondary-school teachers in science, mathematics and home economics.</p>
                    <p>In 2013, after COSETCO became the public university now known as Mukuba University, a new Library building was built to serve the institution.</p>
                </div>
            </div>
        </section>

        <section class="library-resources-section" id="open-resources" aria-labelledby="open-resources-title">
            <div class="page-width">
                <div class="library-section-heading">
                    <div><p class="library-eyebrow">DISCOVER MORE</p><h2 id="open-resources-title">Open Access &amp; Online Resources</h2></div>
                    <p>Explore the resources listed by Mukuba Library. External destinations are shown where they are available.</p>
                </div>
                <div class="library-resource-groups">
                    <section class="library-resource-group" aria-labelledby="open-access-title">
                        <h3 id="open-access-title">Open Access Resources</h3>
                        <ul>
                            <li><a href="https://elibrary.acbfpact.org/" target="_blank" rel="noopener noreferrer">ACBF Virtual Library on Capacity Development <span aria-hidden="true">&#8599;</span></a></li>
                            <li><a href="https://doaj.org/" target="_blank" rel="noopener noreferrer">Directory of Open Access Journals (DOAJ) <span aria-hidden="true">&#8599;</span></a></li>
                            <li><a href="https://opendoar.ac.uk/" target="_blank" rel="noopener noreferrer">Directory of Open Access Repositories (OpenDOAR) <span aria-hidden="true">&#8599;</span></a></li>
                            <li><span>World Wide Science</span></li>
                        </ul>
                    </section>
                    <section class="library-resource-group" aria-labelledby="online-resources-title">
                        <h3 id="online-resources-title">Online Resources</h3>
                        <ul>
                            <li><a href="https://www.zambialii.org/" target="_blank" rel="noopener noreferrer">ZambiaLII <span aria-hidden="true">&#8599;</span></a></li>
                            <li><span>Hagemony and Power</span></li>
                            <li><span>INSPEC</span></li>
                            <li><span>ISSBBD 2010</span></li>
                            <li><span>Zambia Information Highway</span></li>
                            <li><span>Biomedical Research Ethics Online Platform</span></li>
                        </ul>
                    </section>
                </div>
            </div>
        </section>

        <section class="library-contact-section" id="hours-contact" aria-labelledby="hours-contact-title">
            <div class="page-width">
                <div class="library-section-heading">
                    <div><p class="library-eyebrow">PLAN YOUR VISIT</p><h2 id="hours-contact-title">Hours &amp; Contact</h2></div>
                </div>
                <div class="library-contact-grid">
                    <div class="library-hours-card">
                        <h3>General Working Hours</h3>
                        <dl>
                            <div><dt>Monday – Friday</dt><dd>08:30 – 21:00</dd></div>
                            <div><dt>Saturday</dt><dd>08:30 – 13:00</dd></div>
                            <div><dt>Sunday &amp; Public Holidays</dt><dd>Closed</dd></div>
                        </dl>
                    </div>
                    <div class="library-address-card">
                        <h3>Mukuba Library</h3>
                        <address>Itimpi, off Kitwe–Chingola Road Campus<br>PO Box 20382<br>Kitwe, Zambia</address>
                        <a href="tel:+260969284823">+260 969 284 823</a>
                        <p class="library-email-note">The supplied Library contact lists <span>registrar@mukuba.edu.zm</span>. For public email enquiries, use the University contact below.</p>
                        <a href="mailto:registrar@mukuba.edu.zm">registrar@mukuba.edu.zm</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
