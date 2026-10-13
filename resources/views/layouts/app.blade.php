<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mukuba University</title>
    <script>
        (() => {
            let theme;
            try { theme = localStorage.getItem('mukuba-theme'); } catch {}
            const dark = theme === 'dark' || (theme !== 'light' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            document.documentElement.dataset.theme = dark ? 'dark' : 'light';
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/api-sections.css') }}">
    <script src="{{ asset('js/api-sections.js') }}" defer></script>
</head>
<body>
    <header class="site-header">
        <div class="page-width masthead">
            <a class="brand" href="{{ url('/') }}" aria-label="Mukuba University home">
                <img class="brand-logo" src="{{ asset('images/logo.png') }}" alt="Mukuba University logo">
                <span class="brand-copy"><strong>Mukuba University</strong><small><span class="hero-education">Education</span>, <span class="hero-freedom">Freedom</span>, <span class="hero-responsibility">Responsibility</span></small></span>
            </a>
            <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false"><span></span><span></span><span></span></button>
            <nav class="site-nav" aria-label="Main navigation">
                <div class="nav-dropdown">
                    <a class="nav-link" href="{{ url('/') }}" class="dropdown-trigger">Home</a>
                </div>
                <div class="nav-dropdown">
                    <a class="nav-link" href="{{ url('/schools') }}" class="dropdown-trigger">Schools</a>
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
            <button class="theme-toggle" type="button" aria-label="Toggle dark mode" aria-pressed="false">
                <svg class="theme-moon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20.5 13A8.5 8.5 0 0 1 11 3.5 8.5 8.5 0 1 0 20.5 13Z"/></svg>
                <svg class="theme-sun" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.5 1.5m11 11L19 19M5 19l1.5-1.5m11-11L19 5"/></svg>
                <span class="theme-label">Dark mode</span>
            </button>
            </nav>
            <form class="header-search" role="search" aria-label="Search university pages">
                <input type="search" name="q" placeholder="Search pages…" aria-label="Search university pages" autocomplete="off" aria-controls="header-search-results">
                <button type="submit" aria-label="Search">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 4.5 4.5"/></svg>
                </button>
                <div class="header-search-results" id="header-search-results" aria-live="polite" hidden></div>
            </form>
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
