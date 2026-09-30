<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School of Mathematics and Natural Sciences | Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1d2b3a;
            line-height: 1.6;
        }

        .school-page {
            padding: 50px 20px 80px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero {
            background: linear-gradient(135deg, #0a8e2e 0%, #0a8e7e 100%);
            color: #fff;
            border-radius: 24px;
            padding: 36px 28px;
            margin-bottom: 32px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.16);
        }

        .hero-label {
            display: inline-block;
            margin-bottom: 12px;
            padding: 8px 12px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 999px;
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-weight: 700;
        }

        .hero h1 {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3.2rem);
            line-height: 1.15;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 28px;
            align-items: start;
        }

        .panel {
            background: #fff;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
            border: 1px solid rgba(15, 118, 110, 0.08);
        }

        .section-title {
            margin: 0 0 18px;
            font-size: 1.65rem;
            color: #1c2d3e;
        }

        .description {
            margin: 0;
            color: #465a70;
            font-size: 1rem;
        }

        .description + .description {
            margin-top: 16px;
        }

        .description-wrap {
            max-height: 260px;
            overflow-y: auto;
            padding-right: 8px;
        }

        .description-wrap::-webkit-scrollbar {
            width: 8px;
        }

        .description-wrap::-webkit-scrollbar-thumb {
            background: rgba(15, 118, 110, 0.35);
            border-radius: 10px;
        }

        .dean-block {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            border-radius: 14px;
            background: rgba(15, 118, 110, 0.06);
            border: 1px solid rgba(15, 118, 110, 0.12);
            margin-bottom: 18px;
        }

        .dean-badge {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #0f766e;
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .dean-name {
            margin: 0;
            font-size: 1rem;
            color: #1d2b3a;
        }

        .dean-role {
            margin: 2px 0 0;
            color: #4d647a;
            font-size: 0.85rem;
        }

        .meta-card {
            background: linear-gradient(180deg, #f9fbff 0%, #edf9f8 100%);
        }

        .meta-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .meta-list li {
            padding: 12px 0;
            border-bottom: 1px solid rgba(15, 118, 110, 0.14);
            color: #23364d;
            font-weight: 600;
        }

        .meta-list li:last-child {
            border-bottom: none;
        }

        .programmes {
            margin-top: 32px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
            border: 1px solid rgba(15, 118, 110, 0.08);
            padding: 28px;
        }

        .programmes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
            margin-top: 20px;
        }

        .programme-card {
            background: linear-gradient(180deg, #ffffff 0%, #eef8f6 100%);
            border: 1px solid rgba(15, 118, 110, 0.12);
            border-radius: 16px;
            padding: 18px 16px;
            min-height: 150px;
        }

        .programme-card .level {
            display: inline-block;
            padding: 7px 10px;
            border-radius: 999px;
            background: rgba(15, 118, 110, 0.08);
            color: #0f766e;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .programme-card h3 {
            margin: 0 0 8px;
            color: #1c2d3e;
            font-size: 1.12rem;
        }

        .programme-card p {
            margin: 0;
            color: #4f6278;
            font-size: 0.95rem;
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .school-page {
                padding: 30px 16px 60px;
            }

            .hero,
            .panel,
            .programmes {
                padding: 22px 18px;
            }

            .section-title {
                font-size: 1.35rem;
            }
        }
    </style>
</head>
<body>
    @include('header contents.header')
    <main class="school-page">
        <div class="container">
            <header class="hero">
                <h1>School of Mathematics and Natural Sciences</h1>
            </header>

            <section class="content-grid">
                <article class="panel">
                    <h2 class="section-title">About this school</h2>
                     <div class="dean-block">
                        <div class="dean-badge">D</div>
                        <div>
                            <p class="dean-name">Dr. M. Chimfwembe</p>
                            <p class="dean-role">Current Dean</p>
                        </div>
                    </div>
                    <div class="description-wrap">
                        <p class="description">Mukuba University is one of the three transformed Teacher Training Colleges into Universities, established by the Higher Education act of 2013. The transformation is to create a university focusing on Teaching, Research and Innovation for national development. Its previous primary role was to produce teachers for Science, Mathematics and Technology related subjects. The forerunner of Mukuba University is Copperbelt Secondary Teachers’ College (COSETCO), which has provided valuable historical experiences on which the new University is supported.</p>
                        <p class="description">Using this firm foundation and recent government’s decision to put Mukuba University under the Copperbelt University Council, Mukuba University is now fast launching itself as a reputable University that can compete favourably with other Universities specialising not only in the fields of Mathematics and Science education but also mathematics, natural sciences, innovation, allied health professions, health sciences, ICT and business studies for national development. Currently, the University has four Schools, namely; School of Mathematical and Natural Sciences, School of Applied Sciences and Technology, School of Education and School of Postgraduate Studies.</p>
                        <p class="description">The Year 2020 has seen the fastest expansion of the Mukuba University since its inception. As part of this rapid expansion, the university introduced the Institute of Biomedical and Health Sciences (IBHS). The Institute will be offering Programmes at Diploma, BSc, MSc and PhD level starting from Year 2021. Furthermore, the institute will have all the capabilities to offer online short intensive courses. In addition to the Schools and the Institute, Mukuba University has now the Centre for Professional and Extension Studies (CPES) that is offering Online Short intensive courses in various fields. In order to advance Research and Innovation of the highest international standards, the School of Postgraduate Studies was created in addition to the Directorate of Research and Innovation. These are currently managed by well experienced full time academic staff. It is envisioned that Mukuba University will become the powerhouse of Research and Innovation.</p>
                    </div>
                </article>

                <aside class="panel meta-card">
                    <h2 class="section-title">Departments</h2>
                    <ul class="meta-list">
                        <li>Department of Mathematics</li>
                        <li>Department of Physics</li>
                        <li>Department of Chemistry</li>
                        <li>Department of Biological Sciences</li>
                        <li>Department of Computer Science and Information Technology</li>
                    </ul>
                </aside>
            </section>

            <section class="programmes" aria-labelledby="programmes-title">
                <h2 id="programmes-title" class="section-title">Programmes offered</h2>
                <div class="programmes-grid">
                    <article class="programme-card">
                        <span class="level">Diploma</span>
                        <h3>Diploma in Mathematics and Science Education</h3>
                        <p>Focused on teaching methods, scientific reasoning, and classroom practice.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Bachelor</span>
                        <h3>BSc in Mathematics</h3>
                        <p>Develops analytical thinking, problem solving, and mathematical modelling skills.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Bachelor</span>
                        <h3>BSc in Physics</h3>
                        <p>Explores physical principles, energy systems, and applied scientific investigation.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Bachelor</span>
                        <h3>BSc in Chemistry</h3>
                        <p>Builds expertise in chemical analysis, laboratory work, and industrial applications.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Bachelor</span>
                        <h3>BSc in Biology</h3>
                        <p>Covers life sciences, biodiversity, biotechnology, and environmental systems.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Bachelor</span>
                        <h3>BSc in Computer Science</h3>
                        <p>Supports software development, data science, computing systems, and scientific computing.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Master</span>
                        <h3>MSc in Mathematics</h3>
                        <p>Encourages advanced mathematical research and problem-solving across disciplines.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Master</span>
                        <h3>MSc in Natural Sciences</h3>
                        <p>Promotes scientific inquiry, innovation, and applied research in the natural sciences.</p>
                    </article>
                </div>
            </section>
        </div>
    </main>
    @include('header contents.footer')
</body>
</html>
