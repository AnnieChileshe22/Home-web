<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ str_replace('-', ' ', ucfirst($hostel)) }} | Accommodation</title>
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

        .hostel-page {
            padding: 50px 20px 80px;
        }

        .container {
            max-width: 1180px;
            margin: 0 auto;
        }

        .header {
            background: linear-gradient(135deg, #0f172a 0%, #0f766e 100%);
            border-radius: 22px;
            padding: 26px 24px;
            color: #fff;
            margin-bottom: 28px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
        }

        .header p {
            margin: 0 0 8px;
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            opacity: 0.9;
            font-weight: 700;
        }

        .header h1 {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3rem);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.35fr 0.95fr;
            gap: 28px;
            align-items: start;
        }

        .panel {
            background: #fff;
            border-radius: 18px;
            border: 1px solid rgba(15, 118, 110, 0.08);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
            padding: 24px;
        }

        .panel h2 {
            margin: 0 0 16px;
            font-size: 1.5rem;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 14px;
            margin-top: 16px;
        }

        .gallery img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            border-radius: 14px;
            display: block;
        }

        .services {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 14px;
        }

        .service-pill {
            display: inline-block;
            background: rgba(15, 118, 110, 0.08);
            color: #0f766e;
            border-radius: 999px;
            padding: 8px 12px;
            font-size: 12px;
            font-weight: 700;
        }

        .summary {
            color: #465a70;
            font-size: 1rem;
            line-height: 1.8;
        }

        .meta-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .meta-list li {
            padding: 12px 0;
            border-bottom: 1px solid rgba(15, 118, 110, 0.12);
            color: #23364d;
            font-weight: 600;
        }

        .meta-list li:last-child {
            border-bottom: none;
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .hostel-page {
                padding: 30px 16px 60px;
            }

            .header,
            .panel {
                padding: 22px 18px;
            }
        }
    </style>
</head>
<body>
    @include('header contents.header')
    <main class="hostel-page">
        <div class="container">
            <header class="header">
                <p>Accommodation</p>
                <h1>{{ str_replace('-', ' ', ucfirst($hostel)) }}</h1>
            </header>

            <section class="content-grid">
                <article class="panel">
                    <h2>Gallery</h2>
                    <div class="gallery">
                        <img src="{{ asset('images/campus/event-group.jpg') }}" alt="Hostel exterior">
                        <img src="{{ asset('images/campus/study-classroom.jpg') }}" alt="Hostel room">
                        <img src="{{ asset('images/campus/study-student.jpg') }}" alt="Hostel lounge">
                        <img src="{{ asset('images/campus/campus-river.jpg') }}" alt="Hostel surroundings">
                    </div>
                </article>

                <aside class="panel">
                    <h2>Services offered</h2>
                    <div class="services">
                        <span class="service-pill">Wi-Fi</span>
                        <span class="service-pill">Security</span>
                        <span class="service-pill">Laundry</span>
                        <span class="service-pill">Water</span>
                        <span class="service-pill">Power backup</span>
                        <span class="service-pill">Study area</span>
                        <span class="service-pill">Housekeeping</span>
                        <span class="service-pill">Reception</span>
                    </div>
                    <ul class="meta-list" style="margin-top: 18px;">
                        <li>Comfortable rooms</li>
                        <li>Safe residential environment</li>
                        <li>Convenient access to campus essentials</li>
                        <li>Supportive student living conditions</li>
                    </ul>
                </aside>
            </section>

            <section class="panel" style="margin-top: 28px;">
                <h2>Overview</h2>
                <p class="summary">This accommodation facility is designed to support students with safe, clean, and well-managed housing. It provides a comfortable residential environment where students can focus on their studies while enjoying access to basic support services and dependable campus amenities.</p>
            </section>
        </div>
    </main>
    @include('header contents.footer')
</body>
</html>
