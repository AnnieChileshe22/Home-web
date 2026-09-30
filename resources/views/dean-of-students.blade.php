<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dean of Students | Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .dean-page { background: #f5f7f3; color: #26372e; }
        .dean-wrap { width: min(1080px, calc(100% - 40px)); margin: 0 auto; padding: 46px 0 72px; }
        .dean-kicker { margin: 0 0 8px; color: #347b52; font-size: 10px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; }
        .dean-title { margin: 0 0 28px; color: #064b2a; font: 400 38px/1.15 Georgia, serif; }
        .dean-profile { display: grid; grid-template-columns: minmax(0, 1fr) minmax(270px, .8fr); align-items: stretch; gap: 32px; margin-bottom: 48px; }
        .dean-profile-copy { align-self: center; }
        .dean-profile-copy h2 { margin: 0 0 12px; color: #064b2a; font: 400 25px/1.2 Georgia, serif; }
        .dean-page p { color: #526158; font-size: 14px; line-height: 1.8; }
        .dean-profile-copy p { margin: 0; }
        .dean-photo { width: 100%; min-height: 320px; max-height: 405px; object-fit: cover; object-position: center 30%; background: #dfe8df; }
        .dean-section { padding: 30px 0; border-top: 1px solid #dce5db; }
        .dean-section h2 { margin: 0 0 14px; color: #064b2a; font: 400 25px/1.2 Georgia, serif; }
        .dean-section h3 { margin: 24px 0 8px; color: #173429; font-size: 12px; font-weight: 800; letter-spacing: .55px; }
        .dean-section p { max-width: 920px; margin: 0 0 15px; }
        .office-topics { display: flex; flex-wrap: wrap; gap: 8px 20px; margin: 20px 0 0; padding: 15px 0; border-top: 1px solid #e1e8df; border-bottom: 1px solid #e1e8df; list-style: none; }
        .office-topics li { color: #347b52; font-size: 10px; font-weight: 800; letter-spacing: .55px; }
        .objectives { display: grid; gap: 10px; margin: 20px 0 0; padding-left: 23px; color: #526158; font-size: 13px; line-height: 1.75; }
        .objectives li::marker { color: #347b52; font-weight: 800; }
        .clinic-list { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px 32px; margin: 18px 0; padding-left: 20px; color: #526158; font-size: 13px; line-height: 1.7; }
        .clinic-list li::marker { color: #347b52; }
        .dean-emphasis { color: #173429 !important; font-weight: 700; }
        @media (max-width: 700px) { .dean-wrap { width: calc(100% - 32px); padding: 35px 0 52px; }.dean-title { font-size: 32px; }.dean-profile { grid-template-columns: 1fr; gap: 19px; margin-bottom: 30px; }.dean-photo { min-height: 240px; max-height: 330px; }.dean-section { padding: 24px 0; }.dean-section h2 { font-size: 22px; }.clinic-list { grid-template-columns: 1fr; gap: 6px; } }
    </style>
</head>
<body>
    @include('header contents.header')
    <main class="dean-page">
        <div class="dean-wrap">
            <p class="dean-kicker">Student Affairs</p>
            <h1 class="dean-title">Dean of Students</h1>

            <section class="dean-profile" aria-labelledby="dean-profile-title">
                <div class="dean-profile-copy">
                    <h2 id="dean-profile-title">Dr. SIMANGO, Benson</h2>
                    <p>Dr. Benson Simango is Dean of Students for Mukuba University. He earned his undergraduate degree at the University of Zambia, his master’s degree in educational administration and management at the National University of Ireland and his Doctor of Education (D.ED.) degree in education management and leadership at the University of South Africa. He began work in the Dean of Students office in 2017 and was appointed substantively as Dean of Students in January 2020. He is responsible for providing leadership, administration and general oversight for the Office of the Dean of Students as well as Student Conduct, Student Services, and facilitates Student Development through the guidance and counselling unit.</p>
                </div>
                <img class="dean-photo" src="https://mukuba.edu.zm/wp-content/uploads/2021/11/DSC_3836.jpg" alt="Dean of Students Dr. Benson Simango">
            </section>

            <section class="dean-section" aria-labelledby="office-title">
                <h2 id="office-title">Office of Dean of Students</h2>
                <p>Dean of Students office is currently located within Chambishi hostels. It is the central office for the unit with overall responsibility for the student’s governance and personnel services, disciplinary control, management of student accommodation records, policy development and coordinating of planned activities. The Office of the Dean of Students serves a central role in student learning and development, advancing the University’s mission of teaching, research, and community service by fostering academic and social networks through which students develop as intentional learners and global citizens. The Office of the Dean of Students creates opportunities to involve students, faculty and staff in diverse learning communities and provides a critical support structure for enriching the overall student experience.</p>
                <ul class="office-topics" aria-label="Student affairs topics">
                    <li>OUR VISION</li>
                    <li>OUR MISSION</li>
                    <li>HALLS OF RESIDENCE</li>
                    <li>CATERING SERVICES</li>
                    <li>CLUBS</li>
                    <li>UNION</li>
                </ul>
            </section>

            <section class="dean-section" aria-labelledby="counselling-title">
                <h2 id="counselling-title">Counseling and Guidance Services</h2>
                <p>The working policy of the career Guidance and Counselling Unit in the Dean of Students’ office outlines the following objectives:</p>
                <ol class="objectives">
                    <li>To offer counselling and Guidance to students on opportunities for chosen careers in the university.</li>
                    <li>To establish and maintain contact between the university and prospective Employers (Government, industry, commerce and professions) so as to acquaint them with the courses and programs of studies being pursued by students at the university and to enable employers acquaint the schools with the areas of studies where students can seek employment.</li>
                    <li>To organise talks, lectures, and seminars on careers through which students could be acquainted with the requirements of various employing agencies. Talks on health related subjects like AIDS will also be organised through the same channels.</li>
                    <li>In conjunction with Deans and Heads of Departments to arrange vacation training schemes including practical attachments to schools and industries.</li>
                    <li>To assist in sourcing for vacancies for appointment and keep in close touch with graduates of the university as to what jobs are available and to use feed-back from graduates to help the schools and Department in preparing future schemes.</li>
                    <li>To help build up a library on careers involving official publications and brochures of employing agencies to serve as an information centre for students.</li>
                    <li>To assist students in all problems arising from academic, personal and social adjustments.</li>
                    <li>To counsel students on special problems.</li>
                    <li>To organise visits to places of employment so that students can observe the various organisations at work.</li>
                    <li>To assist individual students in planning obtaining and deriving maximum educational and social benefits from their potentials and experiences.</li>
                </ol>
                <p>The task of counselling is to give the clients an opportunity to explore, discover and clarify ways of living more resourcefully and towards greater well-being. During your stay in University from year one until the day you graduate, you may require advice on a number of issues. <strong class="dean-emphasis">Do not be lonely share your problems.</strong></p>
            </section>

            <section class="dean-section" aria-labelledby="clinic-title">
                <h2 id="clinic-title">Clinic</h2>
                <p>The university health service operates 24/7. The health services cater for all students including the surrounding area. The clinic offers the following services:</p>
                <ol class="clinic-list">
                    <li>Outpatient department (OPD)</li>
                    <li>Family Planning</li>
                    <li>Male circumcision</li>
                    <li>VCT/HIV testing services (HTS)</li>
                    <li>Adolescent Reproductive health services</li>
                    <li>Anti-Retroviral Therapy Clinic (ART)</li>
                    <li>Nutritional assessment and counselling services</li>
                    <li>Immunization and Growth monitoring</li>
                    <li>Post-natal care</li>
                </ol>
                <p>Serious cases are referred to other facilities including Kitwe Teaching Hospital.</p>
            </section>

            <section class="dean-section" aria-labelledby="sports-title">
                <h2 id="sports-title">Sports</h2>
                <h3>Sport and Recreation</h3>
                <p>The university offers various facilities for sports, recreation and cultural activities. There are many sporting clubs registered with the Dean of Students Office such as: Athletics, Badminton, Basketball, Chess, Football, Netball, Table Tennis, Volleyball and University Drama Society, among many others. All registered students can join any sport or club of their choice. There are several areas of recreation on campus to which all categories of students are welcome.</p>
                <p>Student Engagement and Leadership encourages co-curricular learning, leadership development, and personal development through social engagement, cultural enrichment, community service, artistic exploration, and intellectual growth. The Dean of Students staff engages students in activities supporting self-reflection, skill acquisition, and leadership development.</p>
            </section>
        </div>
    </main>
    @include('header contents.footer')
</body>
</html>
