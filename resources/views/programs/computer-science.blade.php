<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BSc Computer Science | Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1d2b3a;
            line-height: 1.6;
        }

        .programme-page {
            padding: 50px 20px 80px;
        }

        .container {
            max-width: 1180px;
            margin: 0 auto;
        }

        .top-banner {
            background: linear-gradient(135deg, #0f172a 0%, #0f766e 100%);
            color: #fff;
            border-radius: 22px;
            padding: 26px 28px;
            margin-bottom: 30px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.14);
        }

        .top-banner span {
            display: inline-block;
            margin-bottom: 10px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255,255,255,0.12);
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-weight: 700;
        }

        .top-banner h1 {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3.3rem);
            line-height: 1.15;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 28px;
            align-items: flex-start;
        }

        .panel {
            background: #fff;
            border-radius: 18px;
            padding: 26px 24px;
            border: 1px solid rgba(15, 118, 110, 0.08);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
        }

        .panel h2 {
            margin: 0 0 16px;
            font-size: 1.6rem;
            color: #1d2b3a;
        }

        .panel p,
        .panel li {
            color: #465a70;
            font-size: 1rem;
            line-height: 1.75;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(150px, 1fr));
            gap: 16px;
            margin: 24px 0;
        }

        .stat {
            background: linear-gradient(180deg, #f9fbff 0%, #edf9f8 100%);
            border-radius: 14px;
            padding: 18px 16px;
            border: 1px solid rgba(15, 118, 110, 0.1);
        }

        .stat-label {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #0f766e;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .stat strong {
            font-size: 1.1rem;
            color: #1d2b3a;
        }

        .key-points {
            margin: 16px 0 0;
            padding-left: 18px;
        }

        .timeline {
            margin-top: 30px;
            background: #fff;
            border-radius: 18px;
            border: 1px solid rgba(15, 118, 110, 0.08);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
            padding: 26px 24px;
        }

        .timeline-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-top: 16px;
        }

        .year-card {
            background: linear-gradient(180deg, #ffffff 0%, #eef8f6 100%);
            border-radius: 16px;
            border: 1px solid rgba(15, 118, 110, 0.12);
            padding: 20px 18px;
        }

        .year-card h3 {
            margin: 0 0 10px;
            color: #0f766e;
            font-size: 1rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .year-card ul {
            margin: 0;
            padding-left: 18px;
            color: #465a70;
        }

        .research {
            margin-top: 30px;
            background: #fff;
            border-radius: 18px;
            border: 1px solid rgba(15, 118, 110, 0.08);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
            padding: 26px 24px;
        }

        .research-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-top: 16px;
        }

        .research-card {
            background: linear-gradient(180deg, #fdfefe 0%, #f0f8f7 100%);
            border-radius: 14px;
            border: 1px solid rgba(15, 118, 110, 0.08);
            padding: 18px 16px;
        }

        .research-card h3 {
            margin: 0 0 10px;
            font-size: 1.05rem;
        }

        .research-card p {
            margin: 0;
            color: #465a70;
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .programme-page {
                padding: 30px 16px 60px;
            }

            .top-banner,
            .panel,
            .timeline,
            .research {
                padding: 22px 18px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('header contents.header')
    <main class="programme-page">
        <div class="container">
            <header class="top-banner">
                <span>Computer Science</span>
                <h1>BSc in Computer Science</h1>
            </header>

            <section class="content-grid">
                <article class="panel">
                    <h2>Programme overview</h2>
                    <p>The Bachelor of Science in Computer Science is designed to produce technically competent, ethically grounded, and innovation-driven graduates. The programme builds strong foundations in programming, algorithms, systems design, data management, networking, and intelligent systems while encouraging problem solving for real-world societal and industrial challenges.</p>

                    <div class="stats">
                        <div class="stat">
                            <span class="stat-label">Duration</span>
                            <strong>4 years</strong>
                        </div>
                        <div class="stat">
                            <span class="stat-label">Award</span>
                            <strong>BSc</strong>
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
                    <h2>Why study Computer Science?</h2>
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
    @include('header contents.footer')
</body>
</html>
