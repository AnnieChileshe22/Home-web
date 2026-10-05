@extends('layouts.app')
    @section('content')
    <main class="programmes-page">
        <div class="container">
            <header class="page-header">
                <h1>Programmes on Offer</h1>
                <p>Study with purpose</p>
            </header>

            <section class="programmes-grid" aria-label="Mukuba University programmes">
                <article class="programme-card">
                    <div class="programme-image">
                        <img src="{{ asset('images/nurses.jpg') }}" alt="Diploma students">
                    </div>
                    <div class="programme-body">
                        <span class="programme-level">Diploma</span>
                        <h2>Diploma Programmes</h2>
                        <p>Career-focused programmes designed to build technical confidence and practical skills for the workplace.</p>
                        <div class="programme-meta">
                            <span>3 years</span>
                            <span>Industry-ready</span>
                        </div>
                        <a href="/programmes/computer-science" class="programme-link">View details</a>
                    </div>
                </article>

                <article class="programme-card">
                    <div class="programme-image">
                        <img src="{{ asset('images/smns.jpeg') }}" alt="Bachelor's degree students">
                    </div>
                    <div class="programme-body">
                        <span class="programme-level">Bachelor's</span>
                        <h2>Bachelor's Degree Programmes</h2>
                        <p>Comprehensive undergraduate study pathways that combine academic theory, research, and leadership development.</p>
                        <div class="programme-meta">
                            <span>4–7 years</span>
                            <span>Academic depth</span>
                        </div>
                        <a href="/programmes/computer-science" class="programme-link">View details</a>
                    </div>
                </article>

                <article class="programme-card">
                    <div class="programme-image">
                        <img src="{{ asset('images/master.jpg') }}" alt="Master's students">
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
@endsection
