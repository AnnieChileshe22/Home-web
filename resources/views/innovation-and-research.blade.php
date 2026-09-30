<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Innovation &amp; Research | Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .research-page { background: #f5f7f3; color: #26372e; }
        .research-wrap { width: min(1080px, calc(100% - 40px)); margin: 0 auto; padding: 46px 0 72px; }
        .research-kicker { margin: 0 0 8px; color: #347b52; font-size: 10px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; }
        .research-title { margin: 0; color: #064b2a; font: 400 38px/1.15 Georgia, serif; }
        .research-director { margin: 13px 0 0; color: #526158; font-size: 14px; line-height: 1.7; }
        .research-section { padding: 30px 0; border-top: 1px solid #dce5db; }
        .research-intro + .research-section { margin-top: 30px; }
        .research-section h2 { margin: 0 0 18px; color: #064b2a; font: 400 25px/1.25 Georgia, serif; }
        .research-section h3 { margin: 26px 0 12px; color: #173429; font-size: 12px; font-weight: 800; letter-spacing: .65px; }
        .research-section h4 { margin: 19px 0 7px; color: #347b52; font-size: 10px; font-weight: 800; letter-spacing: .75px; }
        .research-list { display: grid; gap: 0; margin: 0; padding: 0; list-style: none; }
        .research-list li { padding: 13px 0; border-top: 1px solid #e2e8e1; color: #405146; font-size: 13px; font-weight: 700; line-height: 1.65; }
        .research-list li:last-child { border-bottom: 1px solid #e2e8e1; }
        .research-group { padding: 20px 0; border-top: 1px solid #e2e8e1; }
        .research-group:last-child { border-bottom: 1px solid #e2e8e1; }
        .research-group h3 { margin: 0 0 10px; }
        .research-group p { margin: 0 0 10px; color: #526158; font-size: 13px; line-height: 1.7; }
        .research-label { margin: 14px 0 5px; color: #347b52; font-size: 9px; font-weight: 800; letter-spacing: .75px; text-transform: uppercase; }
        @media (max-width: 640px) { .research-wrap { width: calc(100% - 32px); padding: 36px 0 54px; }.research-title { font-size: 32px; }.research-section { padding: 24px 0; }.research-section h2 { font-size: 22px; } }
    </style>
</head>
<body>
    @include('header contents.header')
    <main class="research-page">
        <div class="research-wrap">
            <section class="research-intro" aria-labelledby="research-title">
                <p class="research-kicker">Mukuba University</p>
                <h1 class="research-title" id="research-title">Innovation &amp; Research</h1>
                <p class="research-director"><strong>Dr. Bitwell Chibuye, PhD in Organic Chemistry</strong> (The Director).</p>
            </section>

            <section class="research-section" aria-labelledby="publications-title">
                <h2 id="publications-title">Publications</h2>
                <h3>Research Projects Ongoing for Schools</h3>
                <h3>School of Mathematical and Statistics</h3>
                <ul class="research-list">
                    <li>Exploring propagation of ‘Chikanda’ orchids of Chishimba Falls, Kasama District, Zambia.</li>
                    <li>Mango waste electricity production by microbial fuel cell reactor.</li>
                    <li>Study of soil and habitat conditions for the cultivation of various mushrooms that grow wild in Zambia.</li>
                </ul>
                <h3>Applied Science and Technology</h3>
                <h4>On-going Research</h4>
                <h4>Future Research</h4>
                <h3>School of Education</h3>
                <h4>On-going Research</h4>
                <h4>Future Research</h4>
            </section>

            <section class="research-section" aria-labelledby="groups-title">
                <h2 id="groups-title">Research Groups</h2>
                <div class="research-group">
                    <h3>Applied Mathematics</h3>
                    <p class="research-label">Project Title</p>
                    <p>Hopf Bifurcation and Fuzzy Theory</p>
                    <p class="research-label">Specific Research Projects</p>
                </div>
                <div class="research-group">
                    <h3>Molecular Medicine</h3>
                    <p>Hypertension treatment, malaria biomarkers, antimicrobial peptides</p>
                    <p class="research-label">Specific Research Projects</p>
                </div>
                <div class="research-group">
                    <h3>Renewable Energy</h3>
                    <p class="research-label">Specific Research Projects</p>
                </div>
                <div class="research-group">
                    <h3>Water Resource Management</h3>
                    <p class="research-label">Project Title</p>
                    <p>Integrated water resource</p>
                    <p class="research-label">Specific Research Project</p>
                    <p>Integrated Water Resources Management Using GIS and other Earth Observation Systems (PI: Mr A.M. Banda)</p>
                </div>
                <div class="research-group">
                    <h3>Crop Improvement, Agronomy and Protection</h3>
                    <p class="research-label">Publications</p>
                </div>
                <div class="research-group">
                    <h3>Forestry, Livelihoods, Environment and Climate Change</h3>
                    <p class="research-label">Research &amp; Consultancies Undertaken</p>
                    <p class="research-label">Future Research</p>
                </div>
                <div class="research-group">
                    <h3>Crop Improvement, Agronomy and Protection</h3>
                    <p class="research-label">Future Research Project</p>
                </div>
            </section>
        </div>
    </main>
    @include('header contents.footer')
</body>
</html>
