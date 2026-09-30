<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accommodation | Mukuba University</title>
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

        .accommodation-page {
            padding: 50px 20px 80px;
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
            margin: 0 0 10px;
            color: #0f766e;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        .page-header h1 {
            margin: 0;
            font-size: clamp(2.2rem, 4vw, 3.4rem);
        }

        .category-section {
            margin-bottom: 34px;
        }

        .category-heading {
            display: inline-block;
            background: #eafaf8;
            color: #0f766e;
            padding: 10px 14px;
            border-radius: 999px;
            font-weight: 700;
            margin-bottom: 18px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-size: 12px;
        }

        .hostel-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 24px;
        }

        .hostel-card {
            display: block;
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            border: 1px solid rgba(15, 118, 110, 0.08);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .hostel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 22px 42px rgba(15, 23, 42, 0.12);
        }

        .hostel-image {
            height: 200px;
            overflow: hidden;
        }

        .hostel-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hostel-body {
            padding: 18px 18px 20px;
        }

        .hostel-body h2 {
            margin: 0 0 10px;
            font-size: 1.35rem;
            color: #1d2b3a;
        }

        .hostel-body p {
            margin: 0 0 14px;
            color: #53657d;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .services {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }

        .service-pill {
            display: inline-block;
            background: rgba(15, 118, 110, 0.08);
            color: #0f766e;
            border-radius: 999px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 700;
        }

        @media (max-width: 640px) {
            .accommodation-page {
                padding: 30px 16px 60px;
            }

            .page-header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    @include('header contents.header')
    <main class="accommodation-page">
        <div class="container">
            <header class="page-header">
                <p>Safe and comfortable living</p>
                <h1>University Hostels</h1>
            </header>

            <section class="category-section" aria-labelledby="female-hostels">
                <div class="category-heading" id="female-hostels">Female Hostels</div>
                <div class="hostel-grid">
                    <a href="/accommodation/bangweulu-hostel" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/campus/event-group.jpg') }}" alt="Bangweulu Hostel">
                        </div>
                        <div class="hostel-body">
                            <h2>Bangweulu Hostel</h2>
                            <p>Comfortable shared accommodation with secure access, study-friendly spaces, and support services.</p>
                            <div class="services">
                                <span class="service-pill">Wi-Fi</span>
                                <span class="service-pill">Laundry</span>
                                <span class="service-pill">Security</span>
                            </div>
                        </div>
                    </a>

                    <a href="/accommodation/kafue-hostel" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/campus/study-classroom.jpg') }}" alt="Kafue Hostel">
                        </div>
                        <div class="hostel-body">
                            <h2>Kafue Hostel</h2>
                            <p>Designed for women students, with clean rooms, stable water supply, and quiet study areas.</p>
                            <div class="services">
                                <span class="service-pill">Water</span>
                                <span class="service-pill">Housekeeping</span>
                                <span class="service-pill">Study rooms</span>
                            </div>
                        </div>
                    </a>

                    <a href="/accommodation/zambezi-hostel" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/campus/school-education.jpg') }}" alt="Zambezi Hostel">
                        </div>
                        <div class="hostel-body">
                            <h2>Zambezi Hostel</h2>
                            <p>Well-managed student residence offering secure, hygienic, and welcoming living spaces.</p>
                            <div class="services">
                                <span class="service-pill">Security</span>
                                <span class="service-pill">Clean rooms</span>
                                <span class="service-pill">Reception</span>
                            </div>
                        </div>
                    </a>
                </div>
            </section>

            <section class="category-section" aria-labelledby="male-hostels">
                <div class="category-heading" id="male-hostels">Male Hostels</div>
                <div class="hostel-grid">
                    <a href="/accommodation/kariba-hostel" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/campus/program-degree.jpg') }}" alt="Kariba Hostel">
                        </div>
                        <div class="hostel-body">
                            <h2>Kariba Hostel</h2>
                            <p>Spacious and structured living spaces with a practical focus on comfort and student welfare.</p>
                            <div class="services">
                                <span class="service-pill">Wi-Fi</span>
                                <span class="service-pill">Security</span>
                                <span class="service-pill">Common room</span>
                            </div>
                        </div>
                    </a>

                    <a href="/accommodation/luangwa-hostel" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/campus/campus-river.jpg') }}" alt="Luangwa Hostel">
                        </div>
                        <div class="hostel-body">
                            <h2>Luangwa Hostel</h2>
                            <p>Comfort-focused male residence with reliable utilities and a well-kept environment.</p>
                            <div class="services">
                                <span class="service-pill">Care</span>
                                <span class="service-pill">Water</span>
                                <span class="service-pill">Laundry</span>
                            </div>
                        </div>
                    </a>

                    <a href="/accommodation/luapula-hostel" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/campus/school-science.jpg') }}" alt="Luapula Hostel">
                        </div>
                        <div class="hostel-body">
                            <h2>Luapula Hostel</h2>
                            <p>Balanced mixed-use male accommodation with well-organized facilities and student support.</p>
                            <div class="services">
                                <span class="service-pill">Power</span>
                                <span class="service-pill">Reading area</span>
                                <span class="service-pill">Security</span>
                            </div>
                        </div>
                    </a>
                </div>
            </section>

            <section class="category-section" aria-labelledby="combined-hostels">
                <div class="category-heading" id="combined-hostels">Combined Hostels</div>
                <div class="hostel-grid">
                    <a href="/accommodation/mansion" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/campus/study-student.jpg') }}" alt="Mansion Hostel">
                        </div>
                        <div class="hostel-body">
                            <h2>Mansion</h2>
                            <p>Popular combined residence offering a comfortable and active student community setting.</p>
                            <div class="services">
                                <span class="service-pill">Study space</span>
                                <span class="service-pill">Wi-Fi</span>
                                <span class="service-pill">Security</span>
                            </div>
                        </div>
                    </a>

                    <a href="/accommodation/lecturers-compound" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/campus/program-masters.jpg') }}" alt="Lecturers Compound">
                        </div>
                        <div class="hostel-body">
                            <h2>Lecturers Compound</h2>
                            <p>More private combined accommodation option with a calmer residential environment.</p>
                            <div class="services">
                                <span class="service-pill">Privacy</span>
                                <span class="service-pill">Water</span>
                                <span class="service-pill">Quiet rooms</span>
                            </div>
                        </div>
                    </a>
                </div>
            </section>
        </div>
    </main>
    @include('header contents.footer')
</body>
</html>
