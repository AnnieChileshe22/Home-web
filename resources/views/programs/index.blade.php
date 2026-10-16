@extends('layouts.app')
@section('content')
<main class="programmes-page">
        <div class="container">
            <header class="page-header">
                <h1>Programmes on Offer</h1>
                <p>Study with purpose</p>
                <nav class="programme-filters" aria-label="Filter programmes" data-programme-filters>
                    <button type="button" class="is-active" aria-pressed="true" data-qualification="">All</button>
                    <button type="button" aria-pressed="false" data-qualification="BSc">Bachelors</button>
                    <button type="button" aria-pressed="false" data-qualification="MSc">Masters</button>
                    <button type="button" aria-pressed="false" data-qualification="Diploma">Diploma</button>
                </nav>
            </header>

            <section class="programmes-grid" aria-label="Mukuba University programmes" data-api-section="{{ route('data.index', 'programs') }}" data-programmes-list aria-busy="true" aria-live="polite">@include('partials.loading')

            </section>
        </div>
    </main>
@endsection
