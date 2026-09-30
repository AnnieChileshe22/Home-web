<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fees and Payment Plan | Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .fees-page { min-height: 62vh; padding: 58px 0 72px; background: #f5f7f3; }
        .fees-content { width: min(900px, calc(100% - 40px)); margin: 0 auto; }
        .fees-eyebrow { margin: 0 0 9px; color: #087b42; font-size: 10px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase; }
        .fees-title { margin: 0; color: #064b2a; font: 400 38px/1.15 Georgia, serif; }
        .fees-lead { max-width: 760px; margin: 15px 0 35px; color: #5c6c62; font-size: 15px; line-height: 1.75; }
        .fees-content h2 { margin: 0 0 13px; color: #064b2a; font: 400 24px/1.2 Georgia, serif; }
        .payment-plan { padding: 23px 0 28px; border-top: 1px solid #dce5db; border-bottom: 1px solid #dce5db; }
        .payment-plan p { max-width: 790px; margin: 0 0 15px; color: #3e4e44; font-size: 14px; line-height: 1.8; }
        .payment-steps { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0; margin: 25px 0 0; padding: 0; list-style: none; }
        .payment-steps li { padding: 12px 20px 10px 0; }
        .payment-steps li + li { padding-left: 20px; border-left: 1px solid #dce5db; }
        .step-number { display: block; margin-bottom: 7px; color: #347b52; font: 24px/1 Georgia, serif; }
        .payment-steps strong { display: block; margin-bottom: 5px; color: #173429; font-size: 12px; }
        .payment-steps span:last-child { color: #6a786f; font-size: 11px; line-height: 1.55; }
        .fee-schedules { padding-top: 31px; }
        .schedule-row { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 0; border-top: 1px solid #dce5db; color: #173429; }
        .schedule-row:last-child { border-bottom: 1px solid #dce5db; }
        .schedule-row h3 { margin: 0; font-size: 11px; font-weight: 800; letter-spacing: .55px; }
        .schedule-row span { color: #758179; font-size: 11px; }
        @media (max-width: 640px) { .fees-page { padding: 39px 0 52px; }.fees-content { width: calc(100% - 32px); }.fees-title { font-size: 32px; }.fees-lead { font-size: 14px; }.payment-steps { grid-template-columns: 1fr; }.payment-steps li, .payment-steps li + li { padding: 13px 0; border-left: 0; border-top: 1px solid #dce5db; }.step-number { display: inline-block; width: 34px; margin: 0; }.schedule-row { align-items: flex-start; flex-direction: column; gap: 4px; } }
    </style>
</head>
<body>
    @include('header contents.header')
    <main class="fees-page">
        <div class="fees-content">
            <p class="fees-eyebrow">Student Finance Office</p>
            <h1 class="fees-title">Fees and payment plan</h1>
            <p class="fees-lead">All students shall be issued with an invoice at the commencement of a new Academic year from the Student Finance Office which indicates the fees payable in an Academic Year. These fees are expected to be paid in full at the beginning of 3rd Term if on payment plan.</p>

            <section class="payment-plan" aria-labelledby="payment-plan-title">
                <h2 id="payment-plan-title">Payment plan</h2>
                <p>The University has made provisions for students failing to meet their payment at once to spread payments in the following manner:</p>
                <ol class="payment-steps">
                    <li><span class="step-number">01</span><strong>Minimum Initial Payment (MIP)</strong><span>Thirty (30%) percent to enable the registration process for an academic year.</span></li>
                    <li><span class="step-number">02</span><strong>Term II payment</strong><span>Make a regular Termly payment of Thirty-Five (35%) at the beginning of Term II.</span></li>
                    <li><span class="step-number">03</span><strong>Term III payment</strong><span>Make a regular Termly payment of Thirty-Five (35%) at the beginning of Term III.</span></li>
                </ol>
            </section>

            <section class="fee-schedules" aria-labelledby="fee-schedules-title">
                <h2 id="fee-schedules-title">Fee structures</h2>
                <div class="schedule-row"><h3>UNDERGRADUATE PROGRAMMES FEE STRUCTURE</h3><span>Contact the Student Finance Office for the current schedule.</span></div>
                <div class="schedule-row"><h3>POSTGRADUATE FEE STRUCTURE</h3><span>Contact the Student Finance Office for the current schedule.</span></div>
            </section>
        </div>
    </main>
    @include('header contents.footer')
</body>
</html>
