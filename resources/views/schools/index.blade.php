@extends('layouts.app')
    @section('content')
    <main class="schools-page">
        <div class="container">
            <header class="page-header">
                <h1 >Our Schools</h1>
                <p>Academic excellence</p>
            </header>

            <section class="school-grid" aria-label="Schools at Mukuba University">
                <article class="school-card">
                    <div class="school-image">
                        <img src="{{ asset('images/smns.jpeg') }}" alt="Mathematics and Natural Science students">
                    </div>
                    <div class="school-content">
                        <span class="school-tag">STEM</span>
                        <h2>School of Mathematics and Natural Science</h2>
                        <p>Equipping students with analytical thinking and scientific discovery to solve real-world challenges.</p>
                        <a href="/schools/mathematics-natural-sciences">Learn more</a>
                    </div>
                </article>

                <article class="school-card">
                    <div class="school-image">
                        <img src="{{ asset('images/agric.jpg') }}" alt="Agriculture campus scenery">
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
                        <img src="{{ asset('images/smns.jpeg') }}" alt="Students in a classroom">
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
                        <img src="{{ asset('images/teach.jpg') }}" alt="Education students">
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
                        <img src="{{ asset('images/NUT.jpeg') }}" alt="Students collaborating on a project">
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
                        <img src="{{ asset('images/logo.png') }}" alt="Engineering students working together">
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
                        <img src="{{ asset('images/logo.png') }}" alt="Business and commerce students">
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
 @endsection
