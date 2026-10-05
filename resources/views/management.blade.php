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

    
@endsection
