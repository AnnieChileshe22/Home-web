<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application Requirements | Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .requirements-page { min-height: 62vh; padding: 58px 0 72px; background: #f5f7f3; }
        .requirements-content { width: min(900px, calc(100% - 40px)); margin: 0 auto; }
        .requirements-eyebrow { margin: 0 0 9px; color: #087b42; font-size: 10px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; }
        .requirements-title { margin: 0; color: #064b2a; font: 400 38px/1.15 Georgia, serif; }
        .requirements-list { display: grid; gap: 0; margin: 28px 0 0; padding: 0; list-style: none; counter-reset: requirement; }
        .requirements-list li { position: relative; padding: 20px 20px 20px 62px; border-top: 1px solid #dce5db; color: #3e4e44; font-size: 15px; line-height: 1.75; counter-increment: requirement; }
        .requirements-list li::before { position: absolute; top: 21px; left: 4px; color: #347b52; font: 24px/1 Georgia, serif; content: counter(requirement, decimal-leading-zero); }
        .requirements-list li:last-child { border-bottom: 1px solid #dce5db; }
        @media (max-width: 640px) { .requirements-page { padding: 39px 0 52px; }.requirements-content { width: calc(100% - 32px); }.requirements-title { font-size: 32px; }.requirements-list li { padding: 18px 4px 18px 47px; font-size: 14px; }.requirements-list li::before { top: 19px; } }
    </style>
</head>
<body>
    @include('header contents.header')
    <main class="requirements-page">
        <div class="requirements-content">
            <p class="requirements-eyebrow">Admissions</p>
            <h1 class="requirements-title">Application Requirements</h1>
            <ol class="requirements-list">
                <li>Five (5) credits or better in Mathematics, English and a Science related subject plus any other two.</li>
                <li>Applicants for Bachelor of Education (Textiles and Nutritional Sciences) should have passed in any of the following subjects; Food and Nutrition, Home Management, and Fashion and Fabrics</li>
                <li>Applicants for Teaching Methods should have obtained a minimum of a Degree</li>
            </ol>
        </div>
    </main>
    @include('header contents.footer')
</body>
</html>
