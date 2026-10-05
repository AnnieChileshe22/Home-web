@extends('layouts.app')
    @section('content')
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
  @endsection
