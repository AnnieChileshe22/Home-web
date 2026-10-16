<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mukuba University')</title>
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
            <nav class="site-nav" id="mobile-navigation" aria-label="Main navigation">
                <div class="site-nav-heading">
                    <span>Menu</span>
                    <button class="nav-close" type="button" aria-label="Close navigation menu">
                        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"/></svg>
                    </button>
                </div>
                <div class="site-nav-scroll">
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
                        <a href="{{ route('cict') }}">Center for Information Communication Technology</a>
                        <a href="{{ url('/innovation-and-research') }}">Innovation &amp; Research</a>
                        <a href="{{ url('/directorate-of-research-and-graduate-studies') }}">Research &amp; Graduate Studies</a>
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
                </div>
                <div class="site-nav-action">
                    <a class="apply-nav" href="https://unicosis.mukuba.edu.zm/login" target="_blank" rel="noopener noreferrer">Apply now</a>
                </div>
            </nav>
            <button class="nav-overlay" type="button" aria-label="Close navigation menu" tabindex="-1" aria-hidden="true"></button>
            <form class="header-search" role="search" aria-label="Search university pages">
                <input type="search" name="q" placeholder="Search pages…" aria-label="Search university pages" autocomplete="off" aria-controls="header-search-results">
                <button type="submit" aria-label="Search">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 4.5 4.5"/></svg>
                </button>
                <div class="header-search-results" id="header-search-results" aria-live="polite" hidden></div>
            </form>
            <button class="theme-toggle" type="button" aria-label="Toggle dark mode" aria-pressed="false">
                <svg class="theme-moon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20.5 13A8.5 8.5 0 0 1 11 3.5 8.5 8.5 0 1 0 20.5 13Z"/></svg>
                <svg class="theme-sun" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.5 1.5m11 11L19 19M5 19l1.5-1.5m11-11L19 5"/></svg>
                <span class="theme-label">Dark mode</span>
            </button>
            <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="mobile-navigation" aria-expanded="false"><span></span><span></span><span></span></button>
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
                <a href="{{ route('maps-and-directions') }}">Maps and Directions</a>
                <a href="{{ route('news-events') }}">News</a>
                <a href="{{ route('jobs-and-careers') }}">Jobs/Careers</a>
                <a href="https://www.zaqa.gov.zm/" target="_blank" rel="noopener noreferrer">ZAQA</a>
                <a href="https://hea.org.zm/" target="_blank" rel="noopener noreferrer">HEA</a>
                <a href="https://mukuba.edu.zm/research/" target="_blank" rel="noopener noreferrer">Research</a>
            </div>
            <div class="footer-links">
                <h2>About Us</h2>
                <a href="https://mukuba.edu.zm/about/" target="_blank" rel="noopener noreferrer">About the University</a>
                        <a href="{{ route('library') }}">Library</a>
                <a href="https://moodle.mukuba.edu.zm/moodle/" target="_blank" rel="noopener noreferrer">E-Learning</a>
                <a href="{{ route('cict') }}#ict-policy">ICT Policy</a>
                <a href="https://mukuba.edu.zm/council/" target="_blank" rel="noopener noreferrer">Council</a>
                <a href="https://mukuba.edu.zm/strategic-plan/" target="_blank" rel="noopener noreferrer">Strategic Plan</a>
            </div>
        </div>
        <div class="copyright">©2026. Mukuba University. All Rights Reserved.</div>
    </footer>
    <script>

        const menuToggle = document.querySelector('.menu-toggle');
        const siteNav = document.querySelector('.site-nav');
        const navClose = document.querySelector('.nav-close');
        const navOverlay = document.querySelector('.nav-overlay');
        const header = document.querySelector('.site-header');
        let previousBodyOverflow = '';
        let previousFocus = null;
        const previousInertState = new Map();

        if (menuToggle && siteNav) {
            const backgroundElements = [...document.body.children].filter(element => element !== header);
            const setNavigationOpen = open => {
                siteNav.classList.toggle('open', open);
                siteNav.setAttribute('aria-hidden', String(!open && window.innerWidth <= 760));
                menuToggle.setAttribute('aria-expanded', String(open));
                menuToggle.setAttribute('aria-label', 'Open navigation');
                navOverlay?.classList.toggle('open', open);
                document.body.classList.toggle('navigation-open', open);

                if (open) {
                    previousFocus = document.activeElement;
                    previousBodyOverflow = document.body.style.overflow;
                    document.body.style.overflow = 'hidden';
                    backgroundElements.forEach(element => {
                        previousInertState.set(element, element.inert);
                        element.inert = true;
                    });
                    navClose?.focus();
                } else {
                    document.body.style.overflow = previousBodyOverflow;
                    backgroundElements.forEach(element => {
                        element.inert = previousInertState.get(element) || false;
                        previousInertState.delete(element);
                    });
                    if (previousFocus instanceof HTMLElement) previousFocus.focus();
                }
            };

            menuToggle.addEventListener('click', () => setNavigationOpen(!siteNav.classList.contains('open')));
            navClose?.addEventListener('click', () => setNavigationOpen(false));
            navOverlay?.addEventListener('click', () => setNavigationOpen(false));

            siteNav.addEventListener('click', event => {
                if (event.target.closest('a') && !event.target.closest('.dropdown-trigger')) setNavigationOpen(false);
            });

            document.addEventListener('keydown', event => {
                if (!siteNav.classList.contains('open')) return;
                if (event.key === 'Escape') {
                    event.preventDefault();
                    setNavigationOpen(false);
                    return;
                }
                if (event.key !== 'Tab') return;
                const focusable = [...siteNav.querySelectorAll('a[href], button:not([disabled])')]
                    .filter(element => element.getClientRects().length > 0 && getComputedStyle(element).visibility !== 'hidden');
                const first = focusable[0];
                const last = focusable[focusable.length - 1];
                if (event.shiftKey && (document.activeElement === first || !siteNav.contains(document.activeElement))) {
                    event.preventDefault();
                    last?.focus();
                } else if (!event.shiftKey && (document.activeElement === last || !siteNav.contains(document.activeElement))) {
                    event.preventDefault();
                    first?.focus();
                }
            });

            siteNav.setAttribute('aria-hidden', String(window.innerWidth <= 760));
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
                    item.querySelector('.dropdown-trigger')?.setAttribute('aria-expanded', 'false');
                });

                dropdown.classList.toggle('is-open', !isOpen);
                trigger.setAttribute('aria-expanded', String(!isOpen));
            });
        });

        document.querySelectorAll('.site-nav .dropdown-trigger').forEach(trigger => trigger.setAttribute('aria-expanded', 'false'));
        const currentNavLink = [...document.querySelectorAll('.site-nav a[href]')].find(candidate => {
            try {
                const target = new URL(candidate.href, window.location.href);
                return target.origin === window.location.origin && target.pathname.replace(/\/$/, '') === window.location.pathname.replace(/\/$/, '');
            } catch { return false; }
        });
        if (currentNavLink) {
            currentNavLink.setAttribute('aria-current', 'page');
            currentNavLink.closest('.nav-dropdown')?.classList.add('has-active-child');
        }

        window.addEventListener('resize', () => {
            if (window.innerWidth > 760) {
                document.querySelectorAll('.nav-dropdown').forEach((dropdown) => dropdown.classList.remove('is-open'));
                document.querySelectorAll('.nav-dropdown .dropdown-trigger').forEach(trigger => trigger.setAttribute('aria-expanded', 'false'));
                if (siteNav?.classList.contains('open')) {
                    siteNav.classList.remove('open');
                    document.body.classList.remove('navigation-open');
                    document.body.style.overflow = previousBodyOverflow;
                    [...document.body.children].forEach(element => {
                        if (previousInertState.has(element)) {
                            element.inert = previousInertState.get(element);
                            previousInertState.delete(element);
                        }
                    });
                }
                if (siteNav) siteNav.setAttribute('aria-hidden', 'false');
                navOverlay?.classList.remove('open');
                if (menuToggle) {
                    menuToggle.setAttribute('aria-expanded', 'false');
                    menuToggle.setAttribute('aria-label', 'Open navigation');
                }
            } else if (siteNav && !siteNav.classList.contains('open')) {
                siteNav.setAttribute('aria-hidden', 'true');
            }
        });
    </script>
</body>
</html>
