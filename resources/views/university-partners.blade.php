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

    
@endsection
