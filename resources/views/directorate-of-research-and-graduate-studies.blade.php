@extends('layouts.app')
@section('content')
    <main class="directorate-page">
        <div class="page-width directorate-wrap">
            <p class="directorate-kicker">Mukuba University</p>
            <h1 class="directorate-title">Directorate of Research and Graduate Studies</h1>

            <section class="directorate-card" aria-labelledby="director-heading">
                <h2 id="director-heading">Dr Emmanuel Mweshi (Acting Director)</h2>
                <p>
                    Dr Emmanuel Mweshi is a very experienced Teacher Educator. He has a PhD in Science Education
                    (Chemistry Education), a Master of Education in Science Education and Bachelor’s Degree in
                    Education (Primary Science) from The University of Zambia (UNZA). He also holds a Master of
                    Management degree in Education from Maastricht School of Management Netherlands, a Primary
                    Teaching certificate from David Livingstone College and a certificate in Education for Sustainable
                    Development Leadership and Practice in Teacher Education from Rhodes University South Africa.
                </p>
                <p>
                    Dr Mweshi’s field of specialisation is the Mole Concept Pedagogical Content Knowledge (PCK) and
                    with special interest in Transformative Teaching and learning approaches for sustainable development.
                    At management level he is well grounded in leadership and governance of higher education
                    institutions focusing on cooperate governance, change management, operations and strategy,
                    marketing and quality assurance.
                </p>
            </section>

            <section class="directorate-section">
                <p><strong>Email Address:</strong> emweshi@mukuba.edu.zm</p>
                <p>
                    The Directorate welcomes you to Mukuba University and be part of the Community of Practice (CoP)
                    in your field and contribute to knowledge creation and sustainable development by enrolling in our
                    post graduate programmes. Our programmes will provide you with very unique environment and
                    opportunities for you to improve, challenge, and increase knowledge for to make a difference in your
                    field.
                </p>
                <p>
                    The Directorate was established in 2020 and it is poised to raise the profile of the University by
                    supporting and coordinating graduate studies, research in Science Technology Engineering and
                    Mathematics (STEM), and creation of an inclusive and interactive environment which enables novelty,
                    curiosity and critical thinking among its graduate students and academic staff to respond to
                    sustainable development issues.
                </p>
            </section>

            <section class="directorate-grid">
                <article class="directorate-box">
                    <h3>VISION</h3>
                    <p>To be a leading directorate in advancing impactful graduate studies and research for sustainable development.</p>
                </article>
                <article class="directorate-box">
                    <h3>MISSION</h3>
                    <p>To coordinate quality graduate programmes, promote research excellence and support innovation for societal transformation.</p>
                </article>
                <article class="directorate-box">
                    <h3>MANDATE</h3>
                    <p>To facilitate postgraduate learning, coordinate research activities, and strengthen academic quality and innovation across the University.</p>
                </article>
            </section>

            <section class="directorate-section">
                <h2>School of Education</h2>
                <ul>
                    <li>Master of Education in Science Education</li>
                    <li>Master of Education – Quality Assurance</li>
                    <li>Master of Education in Educational Management and Administration</li>
                    <li>Method of Application</li>
                </ul>
            </section>

            <section class="directorate-section">
                <h2>School of Applied Science and Technology</h2>
                <ul>
                    <li>Master of Science in Nutritional Science</li>
                    <li>Pre-Masters Programmes</li>
                    <li>Method of Application</li>
                </ul>
            </section>

            <section class="directorate-section">
                <h2>School of Mathematics and Natural Sciences</h2>
                <ul>
                    <li>Master of Science in Chemistry</li>
                    <li>Master of Science in Physics</li>
                    <li>Pre-Masters Programmes</li>
                    <li>Method of Application</li>
                </ul>
            </section>

            <section class="directorate-section">
                <h2>Application Forms</h2>
                <ul>
                    <li>Post Graduate Application Form</li>
                    <li>Professional Reference Form</li>
                    <li>Academic Reference Form</li>
                    <li>Online Application</li>
                </ul>
            </section>
        </div>
    </main>

    <style>
        .directorate-page {
            background: #f6f6f1;
            color: #1f2d25;
            padding: 48px 0 72px;
        }

        .directorate-wrap {
            max-width: 1100px;
            margin: 0 auto;
            width: min(1100px, calc(100% - 32px));
        }

        .directorate-kicker {
            margin: 0 0 8px;
            color: #2f7a52;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .directorate-title {
            margin: 0 0 24px;
            color: #0d422e;
            font-size: clamp(2.2rem, 5vw, 3.4rem);
            line-height: 1.15;
            font-family: Georgia, 'Times New Roman', serif;
        }

        .directorate-card,
        .directorate-section,
        .directorate-box {
            background: #ffffff;
            border: 1px solid #dfe7df;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(14, 49, 36, 0.04);
        }

        .directorate-card {
            padding: 28px 28px 10px;
            margin-bottom: 24px;
        }

        .directorate-card h2,
        .directorate-section h2 {
            color: #0e3d2a;
            margin: 0 0 16px;
            font-family: Georgia, 'Times New Roman', serif;
            font-size: clamp(1.5rem, 3vw, 2.3rem);
        }

        .directorate-card p,
        .directorate-section p,
        .directorate-section li,
        .directorate-box p {
            color: #36493f;
            font-size: 1rem;
            line-height: 1.8;
            margin: 0 0 16px;
        }

        .directorate-section {
            padding: 26px 28px;
            margin-bottom: 24px;
        }

        .directorate-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin: 0 0 24px;
        }

        .directorate-box {
            padding: 22px 20px;
        }

        .directorate-box h3 {
            margin: 0 0 10px;
            color: #0d422e;
            font-size: 1.1rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .directorate-section ul {
            margin: 0;
            padding-left: 20px;
        }

        @media (max-width: 768px) {
            .directorate-grid {
                grid-template-columns: 1fr;
            }

            .directorate-card,
            .directorate-section {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
@endsection
