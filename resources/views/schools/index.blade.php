<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Schools | Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1b2938;
        }

        .schools-page {
            padding: 60px 20px 80px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .page-header p {
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #0f766e;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .page-header h1 {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3.5rem);
            line-height: 1.1;
        }

        .school-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
        }

        .school-card {
            position: relative;
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(18, 42, 70, 0.12);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            border: 1px solid rgba(15, 118, 110, 0.08);
        }

        .school-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 44px rgba(18, 42, 70, 0.18);
        }

        .school-image {
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .school-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .school-image::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(12, 34, 56, 0.7), transparent 40%);
        }

        .school-content {
            padding: 22px 20px 24px;
            position: relative;
            margin-top: -36px;
            background: #fff;
            border-radius: 18px 18px 0 0;
            z-index: 1;
        }

        .school-tag {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            color: #0f766e;
            background: rgba(15, 118, 110, 0.08);
            padding: 8px 10px;
            border-radius: 999px;
            margin-bottom: 12px;
        }

        .school-card h2 {
            font-size: 1.45rem;
            line-height: 1.3;
            margin: 0 0 12px;
            color: #1a2b3d;
        }

        .school-card p {
            margin: 0;
            color: #53657d;
            line-height: 1.6;
            font-size: 0.96rem;
        }

        .school-card a {
            display: inline-block;
            margin-top: 18px;
            padding: 10px 14px;
            border-radius: 10px;
            background: #0f766e;
            color: white;
            text-decoration: none;
            font-weight: 700;
        }

        .school-card a:hover {
            background: #115e59;
        }

        @media (max-width: 640px) {
            .schools-page {
                padding-top: 40px;
            }

            .school-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    @include('header contents.header')
    <main class="schools-page">
        <div class="container">
            <header class="page-header">
                <p>Academic excellence</p>
                <h1>Our Schools</h1>
            </header>

            <section class="school-grid" aria-label="Schools at Mukuba University">
                <article class="school-card">
                    <div class="school-image">
                        <img src="{{ asset('images/campus/school-science.jpg') }}" alt="Mathematics and Natural Science students">
                    </div>
                    <div class="school-content">
                        <span class="school-tag">STEM</span>
                        <h2>Mathematics and Natural Science</h2>
                        <p>Equipping students with analytical thinking and scientific discovery to solve real-world challenges.</p>
                        <a href="/schools/mathematics-natural-sciences">Learn more</a>
                    </div>
                </article>

                <article class="school-card">
                    <div class="school-image">
                        <img src="{{ asset('images/campus/campus-river.jpg') }}" alt="Agriculture campus scenery">
                    </div>
                    <div class="school-content">
                        <span class="school-tag">Sustainability</span>
                        <h2>School of Agriculture and Environmental Science</h2>
                        <p>Developing practical skills in food systems, natural resource management, and environmental stewardship.</p>
                        <a href="/">Learn more</a>
                    </div>
                </article>

                <article class="school-card">
                    <div class="school-image">
                        <img src="{{ asset('images/campus/study-classroom.jpg') }}" alt="Students in a classroom">
                    </div>
                    <div class="school-content">
                        <span class="school-tag">Health</span>
                        <h2>School of Medicine</h2>
                        <p>Training compassionate and highly skilled professionals for the health sector and communities.</p>
                        <a href="/">Learn more</a>
                    </div>
                </article>

                <article class="school-card">
                    <div class="school-image">
                        <img src="{{ asset('images/campus/school-education.jpg') }}" alt="Education students">
                    </div>
                    <div class="school-content">
                        <span class="school-tag">Teaching</span>
                        <h2>School of Education</h2>
                        <p>Preparing educators to inspire learning, leadership, and positive change in schools and communities.</p>
                        <a href="/">Learn more</a>
                    </div>
                </article>

                <article class="school-card">
                    <div class="school-image">
                        <img src="{{ asset('images/campus/program-degree.jpg') }}" alt="Students collaborating on a project">
                    </div>
                    <div class="school-content">
                        <span class="school-tag">Innovation</span>
                        <h2>School of Applied Science and Technology</h2>
                        <p>Connecting technical knowledge with innovation, enterprise, and practical problem solving.</p>
                        <a href="/">Learn more</a>
                    </div>
                </article>

                <article class="school-card">
                    <div class="school-image">
                        <img src="{{ asset('images/campus/program-degree.jpg') }}" alt="Engineering students working together">
                    </div>
                    <div class="school-content">
                        <span class="school-tag">Engineering</span>
                        <h2>School of Engineering</h2>
                        <p>Building future engineers who design sustainable solutions for infrastructure and industry.</p>
                        <a href="/">Learn more</a>
                    </div>
                </article>

                <article class="school-card">
                    <div class="school-image">
                        <img src="{{ asset('images/campus/school-business.jpg') }}" alt="Business and commerce students">
                    </div>
                    <div class="school-content">
                        <span class="school-tag">Business</span>
                        <h2>School of Business</h2>
                        <p>Developing ethical leaders and innovators ready for entrepreneurship, commerce, and management.</p>
                        <a href="/">Learn more</a>
                    </div>
                </article>
            </section>
        </div>
    </main>
    @include('header contents.footer')
</body>
</html>
