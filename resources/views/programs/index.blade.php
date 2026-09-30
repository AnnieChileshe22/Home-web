<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Programmes | Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f7fb;
            color: #1b2a3a;
        }

        .programmes-page {
            padding: 60px 20px 80px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
            margin-bottom: 36px;
        }

        .page-header p {
            margin: 0 0 10px;
            color: #0f766e;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        .page-header h1 {
            margin: 0;
            font-size: clamp(2.3rem, 4vw, 4rem);
        }

        .programmes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
        }

        .programme-card {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(15, 118, 110, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .programme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 22px 42px rgba(15, 23, 42, 0.12);
        }

        .programme-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .programme-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .programme-image::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.7), transparent 45%);
        }

        .programme-body {
            padding: 22px 20px 24px;
            margin-top: -36px;
            background: #fff;
            border-radius: 18px 18px 0 0;
            position: relative;
            z-index: 1;
        }

        .programme-level {
            display: inline-block;
            padding: 8px 10px;
            border-radius: 999px;
            background: rgba(15, 118, 110, 0.1);
            color: #0f766e;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .programme-card h2 {
            margin: 0 0 10px;
            font-size: 1.5rem;
            line-height: 1.3;
            color: #1d2c3d;
        }

        .programme-card p {
            margin: 0 0 16px;
            color: #53657d;
            line-height: 1.6;
        }

        .programme-meta {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            border-top: 1px solid #e5ebf4;
            padding-top: 14px;
            font-size: 0.9rem;
            color: #35506d;
            font-weight: 600;
        }

        .programme-link {
            display: inline-block;
            margin-top: 18px;
            background: #0f766e;
            color: #fff;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 10px;
            font-weight: 700;
        }

        .programme-link:hover {
            background: #115e59;
        }
    </style>
</head>
<body>
    @include('header contents.header')
    <main class="programmes-page">
        <div class="container">
            <header class="page-header">
                <p>Study with purpose</p>
                <h1>Programmes on Offer</h1>
            </header>

            <section class="programmes-grid" aria-label="Mukuba University programmes">
                <article class="programme-card">
                    <div class="programme-image">
                        <img src="{{ asset('images/campus/program-diploma.jpg') }}" alt="Diploma students">
                    </div>
                    <div class="programme-body">
                        <span class="programme-level">Diploma</span>
                        <h2>Diploma Programmes</h2>
                        <p>Career-focused programmes designed to build technical confidence and practical skills for the workplace.</p>
                        <div class="programme-meta">
                            <span>1–2 years</span>
                            <span>Industry-ready</span>
                        </div>
                        <a href="/programmes/computer-science" class="programme-link">View details</a>
                    </div>
                </article>

                <article class="programme-card">
                    <div class="programme-image">
                        <img src="{{ asset('images/campus/program-degree.jpg') }}" alt="Bachelor's degree students">
                    </div>
                    <div class="programme-body">
                        <span class="programme-level">Bachelor's</span>
                        <h2>Bachelor's Degree Programmes</h2>
                        <p>Comprehensive undergraduate study pathways that combine academic theory, research, and leadership development.</p>
                        <div class="programme-meta">
                            <span>3–5 years</span>
                            <span>Academic depth</span>
                        </div>
                        <a href="/programmes/computer-science" class="programme-link">View details</a>
                    </div>
                </article>

                <article class="programme-card">
                    <div class="programme-image">
                        <img src="{{ asset('images/campus/program-masters.jpg') }}" alt="Master's students">
                    </div>
                    <div class="programme-body">
                        <span class="programme-level">Master's</span>
                        <h2>Master's Programmes</h2>
                        <p>Advanced postgraduate programmes for scholars, professionals, and innovators seeking specialized expertise.</p>
                        <div class="programme-meta">
                            <span>1–2 years</span>
                            <span>Specialization</span>
                        </div>
                        <a href="/programmes/computer-science" class="programme-link">View details</a>
                    </div>
                </article>
            </section>
        </div>
    </main>
    @include('header contents.footer')
</body>
</html>
