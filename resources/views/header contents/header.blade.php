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
                    <a href="{{ url('/schools') }}">Mathematics and Natural Science</a>
                    <a href="{{ url('/schools') }}">School of Agriculture and Environmental Science</a>
                    <a href="{{ url('/schools') }}">School of Medicine</a>
                    <a href="{{ url('/schools') }}">School of Education</a>
                    <a href="{{ url('/schools') }}">School of Applied Science and Technology</a>
                    <a href="{{ url('/schools') }}">School of Engineering</a>
                    <a href="{{ url('/schools') }}">School of Business</a>
                </div>
            </div>
            <div class="nav-dropdown">
                <a href="{{ url('/') }}#apply" class="dropdown-trigger">Admissions</a>
                <div class="nav-dropdown-menu" aria-label="Admissions menu">
                    <a href="{{ url('/scholership') }}">Scholarships and Loan</a>
                    <a href="{{ url('/fees') }}">Fee Structure</a>
                    <a href="{{ url('/requirements') }}">Application Requirements</a>
                </div>
            </div>
            <div class="nav-dropdown">
                <a href="{{ url('/programmes') }}" class="dropdown-trigger">Academic office</a>
                <div class="nav-dropdown-menu" aria-label="Academic office menu">
                    <a href="{{ url('/register') }}">How to Register</a>
                    <a href="{{ url('/calender') }}">Academic Calendar</a>
                </div>
            </div>
            <div class="nav-dropdown">
                <a href="{{ url('/accommodation') }}" class="dropdown-trigger">Student Affairs</a>
                <div class="nav-dropdown-menu" aria-label="Student affairs menu">
                    <a href="{{ url('https://unicosis.mukuba.edu.zm/login') }}" target="_blank" rel="noopener noreferrer">Student Portal</a>
                    <a href="{{ url('https://app.myloft.xyz/user/login?institute=clv672kgw4n4jx8jyodtkqsb7') }}" target="_blank" rel="noopener noreferrer">E-Resources</a>
                    <a href="{{ url('/accommodation') }}">Accommodation</a>
                    <a href="{{ url('/dean-of-students') }}">Dean of Students</a>
                </div>
            </div>
            <div class="nav-dropdown">
                <a href="{{ url('/') }}#contact" class="dropdown-trigger">Staff</a>
                <div class="nav-dropdown-menu" aria-label="Staff menu">
                    <a href="{{ url('https://edurole.mukuba.edu.zm/') }}" target="_blank" rel="noopener noreferrer">Staff Portal</a>
                    <a href="{{ url('https://app.myloft.xyz/user/login?institute=clv672kgw4n4jx8jyodtkqsb7') }}" target="_blank" rel="noopener noreferrer">E-Resources</a>
                </div>
            </div>
            <div class="nav-dropdown">
                <a href="{{ url('/') }}#contact" class="dropdown-trigger">Directorates</a>
                <div class="nav-dropdown-menu" aria-label="Directorates menu">
                    <a href="{{ url('/innovation-and-research') }}">Innovation &amp; Research</a>
                    <a href="{{ url('/') }}#contact">Directorate of Research &amp; Graduate Studies</a>
                    <a href="{{ url('/') }}#contact">Open Distance Learning</a>
                </div>
            </div>
            <div class="nav-dropdown">
                <a href="{{ url('/') }}#contact" class="dropdown-trigger">About us</a>
                <div class="nav-dropdown-menu" aria-label="About us menu">
                    <a href="{{ url('/') }}#contact">Management</a>
                    <a href="{{ url('/') }}#contact">University Partners</a>
                </div>
            </div>
            <a class="apply-nav" href="https://unicosis.mukuba.edu.zm/login" target="_blank" rel="noopener noreferrer">Apply now</a>
        </nav>
    </div>
</header>
