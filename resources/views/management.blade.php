@extends('layouts.app')

@section('content')
    <main class="management-page">
        <div class="page-width management-wrap">
            <p class="management-kicker">Mukuba University</p>
            <h1 class="management-title">Management</h1>

            <div class="management-grid">
                <div class="management-row management-row-single">
                    <article class="management-card management-card-featured management-card-centered">
                        <img src="{{ asset('images/Prof_Tailoka.png') }}" alt="Professor Frank P. Tailoka">
                        <div class="management-body">
                            <h2>Professor. Frank P. Tailoka</h2>
                            <p class="management-role">VICE CHANCELLOR</p>
                            <a href="#" class="management-link">Profile</a>
                        </div>
                    </article>
                </div>

                <div class="management-row management-row-dual">
                    <article class="management-card">
                        <img src="{{ asset('images/DVC_MAPANI.png') }}" alt="Professor Benjamin Mapani">
                        <div class="management-body">
                            <h2>Professor Benjamin Mapani</h2>
                            <p class="management-role">DEPUTY VICE CHANCELLOR - ACADEMIC</p>
                            <a href="#" class="management-link">Profile</a>
                        </div>
                    </article>

                    <article class="management-card">
                        <img src="{{ asset('images/Proff_Kalaba.png') }}" alt="Professor Felix Kalaba">
                        <div class="management-body">
                            <h2>Professor Felix Kalaba</h2>
                            <p class="management-role">DEPUTY VICE CHANCELLOR - RESEARCH AND INNOVATIONS</p>
                            <a href="#" class="management-link">Profile</a>
                        </div>
                    </article>
                </div>

                <div class="management-row management-row-single">
                    <article class="management-card management-card-centered-standalone">
                        <img src="{{ asset('images/Dr.Masando1.png') }}" alt="Dr. Masondo Maybin">
                        <div class="management-body">
                            <h2>Dr. Masondo Maybin</h2>
                            <p class="management-role">REGISTRAR</p>
                            <a href="#" class="management-link">Profile</a>
                        </div>
                    </article>
                </div>

                <div class="management-row management-row-triple">
                    <article class="management-card">
                        <img src="{{ asset('images/CFO.png') }}" alt="Mr Mweemba Mulunda">
                        <div class="management-body">
                            <h2>Mr Mweemba Mulunda</h2>
                            <p class="management-role">CHIEF FINANCIAL OFFICER</p>
                            <a href="#" class="management-link">Profile</a>
                        </div>
                    </article>

                    <article class="management-card">
                        <img src="{{ asset('images/Mr_Chipembele.png') }}" alt="Mr Matuka Chipembele">
                        <div class="management-body">
                            <h2>Mr.Matuka Chipembele</h2>
                            <p class="management-role">CHIEF LIBRARIAN</p>
                            <a href="#" class="management-link">Profile</a>
                        </div>
                    </article>

                    <article class="management-card">
                        <img src="{{ asset('images/SIM.png') }}" alt="Dr. Benson Simango">
                        <div class="management-body">
                            <h2>Dr. Benson Simango</h2>
                            <p class="management-role">DEAN OF STUDENTS</p>
                            <a href="#" class="management-link">Profile</a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>

    <style>
        .management-page {
            background: linear-gradient(180deg, #f6f9f4 0%, #eef4f0 100%);
            padding: 56px 0 80px;
            color: #1b2d24;
        }

        .management-wrap {
            width: min(1200px, calc(100% - 32px));
            margin: 0 auto;
        }

        .management-kicker {
            margin: 0 0 10px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #347b52;
        }

        .management-title {
            margin: 0 0 30px;
            font-size: clamp(2.2rem, 4vw, 3.4rem);
            line-height: 1.12;
            font-family: Georgia, 'Times New Roman', serif;
            color: #0d422e;
        }

        .management-grid {
            display: grid;
            gap: 24px;
        }

        .management-row {
            display: flex;
            justify-content: center;
            gap: 24px;
            flex-wrap: wrap;
        }

        .management-row-single .management-card {
            width: min(820px, 100%);
        }

        .management-row-dual .management-card {
            width: min(420px, calc(50% - 12px));
        }

        .management-row-triple .management-card {
            width: min(320px, calc(33.333% - 16px));
        }

        .management-card {
            background: #fff;
            border: 1px solid #dfe8df;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 14px 28px rgba(15, 46, 33, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .management-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 30px rgba(15, 46, 33, 0.08);
        }

        .management-card-featured {
            display: grid;
            grid-template-columns: minmax(260px, 1.1fr) minmax(0, 2fr);
        }

        .management-card-featured img {
            height: 100%;
            min-height: 300px;
        }

        .management-card-centered {
            justify-self: center;
        }

        .management-card-centered-standalone {
            width: min(420px, 100%) !important;
        }

        .management-card img {
            width: 100%;
            height: 260px;
            display: block;
            object-fit: cover;
            background: #e7efe9;
        }

        .management-body {
            padding: 22px 20px 18px;
        }

        .management-body h2 {
            margin: 0 0 10px;
            color: #103826;
            font-size: 1.25rem;
            line-height: 1.35;
            font-family: Georgia, 'Times New Roman', serif;
        }

        .management-role {
            margin: 0 0 12px;
            color: #347b52;
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            line-height: 1.7;
        }

        .management-link {
            color: #0d422e;
            text-decoration: none;
            font-weight: 700;
        }

        .management-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            .management-row-dual .management-card,
            .management-row-triple .management-card,
            .management-row-single .management-card {
                width: min(100%, 420px);
            }

            .management-card-featured {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 620px) {
            .management-row {
                display: grid;
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection
