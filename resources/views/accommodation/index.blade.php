@extends('layouts.app')
@section('content')
    <main class="accommodation-page">
        <div class="container">
            <header class="page-header">
                <h1>University Hostels</h1>
            </header>

            <section class="category-section" aria-labelledby="female-hostels">
                <div class="category-heading" id="female-hostels">Female Hostels</div>
                <div class="hostel-grid">
                    <a href="{{ url('/accommodation/bangweulu-hostel') }}" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/to use/kariba.png') }}" alt="Bangweulu Hostel">
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

                    <a href="{{ url('/accommodation/kafue-hostel') }}" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/to use/kafue.jpg') }}" alt="Kafue Hostel">
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

                    <a href="{{ url('/accommodation/zambezi-hostel') }}" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/to use/zambezi.jpg') }}" alt="Zambezi Hostel">
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
                    <a href="{{ url('/accommodation/kariba-hostel') }}" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/to use/kariba.png') }}" alt="Kariba Hostel">
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

                    <a href="{{ url('/accommodation/luangwa-hostel') }}" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/to use/luangwa.jpg') }}" alt="Luangwa Hostel">
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

                    <a href="{{ url('/accommodation/luapula-hostel') }}" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/to use/luangwa.jpg') }}" alt="Luapula Hostel">
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
                    <a href="{{ url('/accommodation/mansion') }}" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/to use/mansion.png') }}" alt="Mansion Hostel">
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

                    <a href="{{ url('/accommodation/lecturers-compound') }}" class="hostel-card">
                        <div class="hostel-image">
                            <img src="{{ asset('images/to use/lectures.jpg') }}" alt="Lecturers Compound">
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
@endsection
