@extends('layouts.app')

@section('content')
    <main class="partners-page">
        <div class="page-width partners-wrap">
            <h1 class="partners-title">University Partners</h1>

            <section class="partners-section" aria-labelledby="partners-heading">
                <h2 id="partners-heading">UNIVERSITY PARTNERS</h2>

                <div class="partners-grid">
                    <a href="https://www.cuts.ac.zm/" target="_blank" rel="noopener noreferrer" class="partner-card">
                        <img src="{{ asset('images/partners/chinhoyi.png') }}" alt="Chinhoyi University">
                        <span>CHINHOYI UNIVERSITY</span>
                    </a>

                    <a href="https://www.muast.ac.zw/" target="_blank" rel="noopener noreferrer" class="partner-card">
                        <img src="{{ asset('images/partners/marondera-e1650547977760.png') }}" alt="Marondera University">
                        <span>MARONDERA UNIVERSITY</span>
                    </a>

                    <a href="https://www.cbu.ac.zm/" target="_blank" rel="noopener noreferrer" class="partner-card">
                        <img src="{{ asset('images/partners/cbu.png') }}" alt="Copperbelt University">
                        <span>COPPERBELT UNIVERSITY</span>
                    </a>

                    <a href="https://www.nstc.org.zm/" target="_blank" rel="noopener noreferrer" class="partner-card">
                        <img src="{{ asset('images/partners/nstc.png') }}" alt="National Science and Technology Council">
                        <span>NATIONAL SCIENCE AND TECHNOLOGY COUNCIL</span>
                    </a>

                    <a href="https://www.hea.org.zm/" target="_blank" rel="noopener noreferrer" class="partner-card">
                        <img src="{{ asset('images/partners/hea.png') }}" alt="Higher Education Authority">
                        <span>HIGHER EDUCATION AUTHORITY</span>
                    </a>

                    <a href="http://www.tcz.ac.zm/" target="_blank" rel="noopener noreferrer" class="partner-card">
                        <img src="{{ asset('images/partners/tcz2.jpg') }}" alt="Teaching Council of Zambia">
                        <span>TEACHING COUNCIL OF ZAMBIA</span>
                    </a>

                    <a href="http://www.tcz.ac.zm/" target="_blank" rel="noopener noreferrer" class="partner-card">
                        <img src="{{ asset('images/partners/Screenshot-2022-03-31-at-13-05-02-unesco-logo-260px.webp-WEBP-Image-260-×-173-pixels.png') }}" alt="UNESCO">
                        <span>UNESCO</span>
                    </a>
                </div>
            </section>
        </div>
    </main>

    <style>
        .partners-page {
            background: linear-gradient(180deg, #f7faf6 0%, #edf4ee 100%);
            padding: 56px 0 80px;
            color: #1c2d25;
        }

        .partners-wrap {
            width: min(1180px, calc(100% - 32px));
            margin: 0 auto;
        }

        .partners-title {
            margin: 0 0 26px;
            color: #0d422e;
            font-size: clamp(2.2rem, 4vw, 3.3rem);
            line-height: 1.12;
            font-family: Georgia, 'Times New Roman', serif;
        }

        .partners-section {
            background: #fff;
            border: 1px solid #dae5dc;
            border-radius: 22px;
            padding: 30px 22px;
            box-shadow: 0 16px 30px rgba(15, 46, 33, 0.05);
        }

        .partners-section h2 {
            margin: 0 0 26px;
            color: #0d422e;
            font-size: clamp(1.4rem, 2.3vw, 2.1rem);
            letter-spacing: 0.04em;
            text-transform: uppercase;
            font-family: Georgia, 'Times New Roman', serif;
        }

        .partners-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .partner-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px 16px;
            background: #f9fbf8;
            border: 1px solid #e2e9e2;
            border-radius: 16px;
            text-decoration: none;
            color: #1f342d;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .partner-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(15, 46, 33, 0.08);
        }

        .partner-card img {
            width: 78px;
            height: 78px;
            object-fit: contain;
            background: #fff;
            border-radius: 12px;
            padding: 8px;
            border: 1px solid #edf2ec;
            flex-shrink: 0;
        }

        .partner-card span {
            font-size: 0.96rem;
            line-height: 1.5;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        @media (max-width: 900px) {
            .partners-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 620px) {
            .partners-grid {
                grid-template-columns: 1fr;
            }

            .partner-card {
                align-items: flex-start;
            }
        }
    </style>
@endsection
