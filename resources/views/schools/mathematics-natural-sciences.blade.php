@extends('layouts.app')
    @section('content')
    <main class="school-page">
        <div class="container">
            <header class="hero">
                <h1>School of Mathematics and Natural Sciences</h1>
            </header>

            <section class="content-grid">
                <article class="panel">
                    <h2 class="section-title">About this school</h2>
                     <div class="dean-block">
                        <div class="dean-badge">D</div>
                        <div>
                            <p class="dean-name">Dr. M. Chimfwembe</p>
                            <p class="dean-role">Current Dean</p>
                        </div>
                    </div>
                    <div class="description-wrap">
                        <p class="description">Mukuba University is one of the three transformed Teacher Training Colleges into Universities, established by the Higher Education act of 2013. The transformation is to create a university focusing on Teaching, Research and Innovation for national development. Its previous primary role was to produce teachers for Science, Mathematics and Technology related subjects. The forerunner of Mukuba University is Copperbelt Secondary Teachers’ College (COSETCO), which has provided valuable historical experiences on which the new University is supported.</p>
                        <p class="description">Using this firm foundation and recent government’s decision to put Mukuba University under the Copperbelt University Council, Mukuba University is now fast launching itself as a reputable University that can compete favourably with other Universities specialising not only in the fields of Mathematics and Science education but also mathematics, natural sciences, innovation, allied health professions, health sciences, ICT and business studies for national development. Currently, the University has four Schools, namely; School of Mathematical and Natural Sciences, School of Applied Sciences and Technology, School of Education and School of Postgraduate Studies.</p>
                        <p class="description">The Year 2020 has seen the fastest expansion of the Mukuba University since its inception. As part of this rapid expansion, the university introduced the Institute of Biomedical and Health Sciences (IBHS). The Institute will be offering Programmes at Diploma, BSc, MSc and PhD level starting from Year 2021. Furthermore, the institute will have all the capabilities to offer online short intensive courses. In addition to the Schools and the Institute, Mukuba University has now the Centre for Professional and Extension Studies (CPES) that is offering Online Short intensive courses in various fields. In order to advance Research and Innovation of the highest international standards, the School of Postgraduate Studies was created in addition to the Directorate of Research and Innovation. These are currently managed by well experienced full time academic staff. It is envisioned that Mukuba University will become the powerhouse of Research and Innovation.</p>
                    </div>
                </article>

                <aside class="panel meta-card">
                    <h2 class="section-title">Departments</h2>
                    <ul class="meta-list">
                        <li>Department of Mathematics</li>
                        <li>Department of Physics</li>
                        <li>Department of Chemistry</li>
                        <li>Department of Biological Sciences</li>
                        <li>Department of Computer Science and Information Technology</li>
                    </ul>
                </aside>
            </section>

            <section class="programmes" aria-labelledby="programmes-title">
                <h2 id="programmes-title" class="section-title">Programmes offered</h2>
                <div class="programmes-grid">
                    <article class="programme-card">
                        <span class="level">Diploma</span>
                        <h3>Diploma in Mathematics and Science Education</h3>
                        <p>Focused on teaching methods, scientific reasoning, and classroom practice.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Bachelor</span>
                        <h3>BSc in Mathematics</h3>
                        <p>Develops analytical thinking, problem solving, and mathematical modelling skills.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Bachelor</span>
                        <h3>BSc in Physics</h3>
                        <p>Explores physical principles, energy systems, and applied scientific investigation.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Bachelor</span>
                        <h3>BSc in Chemistry</h3>
                        <p>Builds expertise in chemical analysis, laboratory work, and industrial applications.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Bachelor</span>
                        <h3>BSc in Biology</h3>
                        <p>Covers life sciences, biodiversity, biotechnology, and environmental systems.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Bachelor</span>
                        <h3>BSc in Computer Science</h3>
                        <p>Supports software development, data science, computing systems, and scientific computing.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Master</span>
                        <h3>MSc in Mathematics</h3>
                        <p>Encourages advanced mathematical research and problem-solving across disciplines.</p>
                    </article>

                    <article class="programme-card">
                        <span class="level">Master</span>
                        <h3>MSc in Natural Sciences</h3>
                        <p>Promotes scientific inquiry, innovation, and applied research in the natural sciences.</p>
                    </article>
                </div>
            </section>
        </div>
    </main>
   @endsection
