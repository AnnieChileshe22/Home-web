<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="site-header">
        <div class="page-width masthead">
            <a class="brand" href="{{ url('/') }}" aria-label="Mukuba University home">
                <img class="brand-logo" src="{{ asset('images/logo.png') }}" alt="Mukuba University logo">
                <span class="brand-copy"><strong>mukuba university</strong><small><span class="hero-education">Education</span>, <span class="hero-freedom">Freedom</span>, <span class="hero-responsibility">Responsibility</span></small></span>
            </a>
            <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false"><span></span><span></span><span></span></button>
            <nav class="site-nav" aria-label="Main navigation">
                <div class="nav-dropdown">
                    <a href="{{ url('/schools') }}" class="dropdown-trigger">Schools</a>
                    <div class="nav-dropdown-menu" aria-label="Schools menu">
                        <a href="{{ url('/schools/mathematics-natural-sciences') }}">school of Mathematics and Natural Science</a>
                        <a href="{{ url('/schools') }}">School of Agriculture and Environmental Science</a>
                        <a href="{{ url('/schools') }}">School of Medicine</a>
                        <a href="{{ url('/schools') }}">School of Education</a>
                        <a href="{{ url('/schools') }}">School of Applied Science and Technology</a>
                        <a href="{{ url('/schools') }}">School of Engineering</a>
                        <a href="{{ url('/schools') }}">School of Business</a>
                    </div>
                </div>
                <div class="nav-dropdown">
                    <a href="{{ url('/admissions') }}" class="dropdown-trigger">Admissions</a>
                    <div class="nav-dropdown-menu" aria-label="Admissions menu">
                        <a href="{{ url('/scholership') }}">Scholarships and Loan</a>
                        <a href="{{ url('/fees') }}">Fee Structure</a>
                        <a href="{{ url('/requirements') }}">Application Requirements</a>
                    </div>
                </div>
                <div class="nav-dropdown">
                    <a href="{{ url('/academic-office') }}" class="dropdown-trigger">Academic office</a>
                    <div class="nav-dropdown-menu" aria-label="Academic office menu">
                        <a href="{{ url('/register') }}">How to Register</a>
                        <a href="{{ url('/calender') }}">Academic Calendar</a>
                    </div>
                </div>
                <div class="nav-dropdown">
                    <a class="dropdown-trigger">Student Affairs</a>
                    <div class="nav-dropdown-menu" aria-label="Student affairs menu">
                        <a href="{{ url('https://unicosis.mukuba.edu.zm/login') }}" target="_blank" rel="noopener noreferrer">Student Portal</a>
                        <a href="{{ url('https://app.myloft.xyz/user/login?institute=clv672kgw4n4jx8jyodtkqsb7') }}" target="_blank" rel="noopener noreferrer">E-Resources</a>
                        <a href="{{ url('/accommodation') }}">Accommodation</a>
                        <a href="{{ url('/dean-of-students') }}">Dean of Students</a>
                    </div>
                </div>
                <div class="nav-dropdown">
                    <a class="dropdown-trigger">Staff</a>
                    <div class="nav-dropdown-menu" aria-label="Staff menu">
                        <a href="{{ url('https://edurole.mukuba.edu.zm/') }}" target="_blank" rel="noopener noreferrer">Staff Portal</a>
                        <a href="{{ url('https://app.myloft.xyz/user/login?institute=clv672kgw4n4jx8jyodtkqsb7') }}" target="_blank" rel="noopener noreferrer">E-Resources</a>
                    </div>
                </div>
                <div class="nav-dropdown">
                    <a class="dropdown-trigger">Directorates</a>
                    <div class="nav-dropdown-menu" aria-label="Directorates menu">
                        <a href="{{ url('/innovation-and-research') }}">Innovation &amp; Research</a>
                        <a href="{{ url('/directorate-of-research-and-graduate-studies') }}">Directorate of Research &amp; Graduate Studies</a>
                        <a href="{{ url('/') }}#contact">Open Distance Learning</a>
                    </div>
                </div>
                <div class="nav-dropdown">
                    <a class="dropdown-trigger">About us</a>
                    <div class="nav-dropdown-menu" aria-label="About us menu">
                        <a href="{{ url('/management') }}">Management</a>
                        <a href="{{ url('/university-partners') }}">University Partners</a>
                    </div>
                </div>
                <a class="apply-nav" href="https://unicosis.mukuba.edu.zm/login" target="_blank" rel="noopener noreferrer">Apply now</a>
            </nav>
        </div>
    </header>
    @yield('content')
    <footer id="contact" class="site-footer">
        <div class="page-width footer-grid">
            <div class="footer-brand">
                <img class="footer-logo" src="{{ asset('images/logo.png') }}" alt="Mukuba University logo">
                <h2>MUKUBA UNIVERSITY</h2>
                <p>Off Chingola Dual Carriage Way, Itimpi,</p>
                <p>P.O. Box 20382, Kitwe.</p>
                <p class="footer-phone"><strong>Tel:</strong> +26021291218</p>
                <p><strong>Email:</strong> registrar@mukuba.edu.zm</p>
                <div class="socials">
                    <a href="https://www.facebook.com/MukubaUniversity" aria-label="Facebook" target="_blank" rel="noopener noreferrer">f</a>
                    <a href="https://www.youtube.com/c/MukubaUniversity" aria-label="YouTube" target="_blank" rel="noopener noreferrer">▶</a>
                    <a href="https://mukuba.edu.zm/#" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">in</a>
                    <a href="https://mukuba.edu.zm/#" aria-label="Instagram" target="_blank" rel="noopener noreferrer">W</a>
                </div>
            </div>
            <div class="footer-links">
                <h2>Useful Links</h2>
                <a href="https://mukuba.edu.zm/sample-page/" target="_blank" rel="noopener noreferrer">Maps and Directions</a>
                <a href="https://mukuba.edu.zm/news/" target="_blank" rel="noopener noreferrer">News</a>
                <a href="https://mukuba.edu.zm/jobs/" target="_blank" rel="noopener noreferrer">Jobs/Careers</a>
                <a href="https://www.zaqa.gov.zm/" target="_blank" rel="noopener noreferrer">ZAQA</a>
                <a href="https://hea.org.zm/" target="_blank" rel="noopener noreferrer">HEA</a>
                <a href="https://mukuba.edu.zm/research/" target="_blank" rel="noopener noreferrer">Research</a>
            </div>
            <div class="footer-links">
                <h2>About Us</h2>
                <a href="https://mukuba.edu.zm/about/" target="_blank" rel="noopener noreferrer">About the University</a>
                <a href="https://mukuba.edu.zm/library/" target="_blank" rel="noopener noreferrer">Library</a>
                <a href="https://moodle.mukuba.edu.zm/moodle/" target="_blank" rel="noopener noreferrer">E-Learning</a>
                <a href="https://mukuba.edu.zm/ict-policy/" target="_blank" rel="noopener noreferrer">ICT Policy</a>
                <a href="https://mukuba.edu.zm/council/" target="_blank" rel="noopener noreferrer">Council</a>
                <a href="https://mukuba.edu.zm/strategic-plan/" target="_blank" rel="noopener noreferrer">Strategic Plan</a>
            </div>
        </div>
        <div class="copyright">©2026. Mukuba University. All Rights Reserved.</div>
    </footer>
    <script>
        const visibleCards=()=>window.innerWidth<=760?1:window.innerWidth<=960?2:3;
        const setupCarousel=(trackSelector,cardSelector,previousSelector,nextSelector,gap)=>{const track=document.querySelector(trackSelector);const cards=[...document.querySelectorAll(cardSelector)];const previous=document.querySelector(previousSelector);const next=document.querySelector(nextSelector);let index=0;let timer;const render=()=>{const maxIndex=Math.max(0,cards.length-visibleCards());index=Math.min(Math.max(index,0),maxIndex);const cardWidth=cards[0].getBoundingClientRect().width;track.style.transform=`translateX(-${index*(cardWidth+gap)}px)`;previous.disabled=index===0;next.disabled=index===maxIndex;};const restart=()=>{clearInterval(timer);timer=setInterval(()=>{const maxIndex=Math.max(0,cards.length-visibleCards());index=index>=maxIndex?0:index+1;render();},3000);};previous.addEventListener('click',()=>{index--;render();restart();});next.addEventListener('click',()=>{index++;render();restart();});window.addEventListener('resize',render);render();restart();};setupCarousel('.news-track','.news-card','[data-news-prev]','[data-news-next]',18);setupCarousel('.school-grid','.school-card','[data-school-prev]','[data-school-next]',22);

        const menuToggle = document.querySelector('.menu-toggle');
        const siteNav = document.querySelector('.site-nav');

        if (menuToggle && siteNav) {
            menuToggle.addEventListener('click', () => {
                const isOpen = siteNav.classList.toggle('open');
                menuToggle.setAttribute('aria-expanded', String(isOpen));
            });
        }

        document.querySelectorAll('.nav-dropdown').forEach((dropdown) => {
            const trigger = dropdown.querySelector('.dropdown-trigger');
            if (!trigger) return;

            trigger.addEventListener('click', (event) => {
                if (window.innerWidth > 760) return;

                event.preventDefault();
                const isOpen = dropdown.classList.contains('is-open');

                document.querySelectorAll('.nav-dropdown').forEach((item) => {
                    item.classList.remove('is-open');
                });

                dropdown.classList.toggle('is-open', !isOpen);
            });
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 760) {
                document.querySelectorAll('.nav-dropdown').forEach((dropdown) => dropdown.classList.remove('is-open'));
                if (siteNav) siteNav.classList.remove('open');
                if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
    </script>
</body>
</html>