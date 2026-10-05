@extends('layouts.app')
    @section('content')
    @php($qualification = \App\Support\Qualification::fullName($program['qualification_type'] ?? null))
    <main class="programme-page">
        <div class="container">
            <header class="top-banner">
                <span>{{ $qualification }}</span>
                <h1>{{ $qualification }} in {{ $program['name'] }}</h1>
            </header>

            <section class="content-grid">
                <article class="panel">
                    <h2>Programme overview</h2>
                    <p>{!! $program['description'] !!}</p>

                    <div class="stats">
                        <div class="stat">
                            <span class="stat-label">Duration</span>
                            <strong>{{ $program['duration'] }} Years</strong>
                        </div>
                        <div class="stat">
                            <span class="stat-label">Award</span>
                            <strong>{{ $program['qualification_type'] }}</strong>
                        </div>
                    </div>

                    <p>The curriculum combines theoretical rigor with hands-on training in laboratories, projects, and internships. Students are equipped to work in software development, data science, cybersecurity, cloud systems, artificial intelligence, and digital transformation roles across government, industry, and entrepreneurship.</p>

                    <ul class="key-points">
                        <li>Strong foundation in mathematics and computing principles</li>
                        <li>Practical problem solving through labs, projects, and field exposure</li>
                        <li>Exposure to emerging technologies such as AI, cloud, cybersecurity, and software engineering</li>
                        <li>Preparation for graduate study, research, and employment</li>
                    </ul>
                </article>

                <aside class="panel">
                    <h2>Why study {{ $qualification }}?</h2>
                    <p>Computer Science is at the centre of digital transformation, innovation, and economic growth. It equips students to design systems that improve communication, healthcare, agriculture, education, governance, and business operations.</p>
                    <p>Graduates may pursue careers in software engineering, database administration, systems analysis, cybersecurity, data analytics, artificial intelligence, ICT consultancy, and technology entrepreneurship.</p>
                </aside>
            </section>

            <section class="timeline" aria-labelledby="study-years-title">
                <h2 id="study-years-title" class="section-title">Study years and areas of focus</h2>
                <div class="timeline-grid">
                    <article class="year-card">
                        <h3>Year 1</h3>
                        <ul>
                            <li>Introduction to Programming</li>
                            <li>Discrete Mathematics</li>
                            <li>Computer Fundamentals</li>
                            <li>Communication Skills</li>
                        </ul>
                    </article>

                    <article class="year-card">
                        <h3>Year 2</h3>
                        <ul>
                            <li>Data Structures and Algorithms</li>
                            <li>Database Systems</li>
                            <li>Operating Systems</li>
                            <li>Computer Architecture</li>
                        </ul>
                    </article>

                    <article class="year-card">
                        <h3>Year 3</h3>
                        <ul>
                            <li>Software Engineering</li>
                            <li>Web and Mobile Development</li>
                            <li>Computer Networks</li>
                            <li>Artificial Intelligence</li>
                        </ul>
                    </article>

                    <article class="year-card">
                        <h3>Year 4</h3>
                        <ul>
                            <li>Final Year Project</li>
                            <li>Cybersecurity</li>
                            <li>Cloud Computing</li>
                            <li>Research Methods and Innovation</li>
                        </ul>
                    </article>
                </div>
            </section>

            <section class="research" aria-labelledby="research-title">
                <h2 id="research-title" class="section-title">Research and innovation focus</h2>
                <div class="research-grid">
                    <article class="research-card">
                        <h3>Artificial Intelligence</h3>
                        <p>Machine learning, data-driven decision systems, and intelligent automation for business and society.</p>
                    </article>

                    <article class="research-card">
                        <h3>Cybersecurity</h3>
                        <p>Secure systems, digital trust, network defense, and protection of critical data infrastructure.</p>
                    </article>

                    <article class="research-card">
                        <h3>Software Development</h3>
                        <p>Modern application design, user-centered systems, scalable software engineering, and digital products.</p>
                    </article>

                    <article class="research-card">
                        <h3>Data and Analytics</h3>
                        <p>Research in data mining, predictive modeling, data visualization, and evidence-based technology solutions.</p>
                    </article>
                </div>
            </section>
        </div>
    </main>
    @endsection
