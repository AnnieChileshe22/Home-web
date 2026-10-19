@extends('layouts.app')
@section('content')
@php($selectedQualification = in_array(request('qualification'), ['BSc', 'MSc', 'Diploma'], true) ? request('qualification') : '')
<main class="programmes-page">
        <div class="container">
            <header class="page-header">
                <h1>Programmes on Offer</h1>
                <p>Study with purpose</p>
                <nav class="programme-filters" aria-label="Filter programmes" data-programme-filters data-initial-qualification="{{ $selectedQualification }}">
                    <button type="button" class="{{ $selectedQualification === '' ? 'is-active' : '' }}" aria-pressed="{{ $selectedQualification === '' ? 'true' : 'false' }}" data-qualification="">All</button>
                    <button type="button" class="{{ $selectedQualification === 'BSc' ? 'is-active' : '' }}" aria-pressed="{{ $selectedQualification === 'BSc' ? 'true' : 'false' }}" data-qualification="BSc">Bachelors</button>
                    <button type="button" class="{{ $selectedQualification === 'MSc' ? 'is-active' : '' }}" aria-pressed="{{ $selectedQualification === 'MSc' ? 'true' : 'false' }}" data-qualification="MSc">Masters</button>
                    <button type="button" class="{{ $selectedQualification === 'Diploma' ? 'is-active' : '' }}" aria-pressed="{{ $selectedQualification === 'Diploma' ? 'true' : 'false' }}" data-qualification="Diploma">Diploma</button>
                </nav>
            </header>

            <section class="programmes-grid" aria-label="Mukuba University programmes" data-api-section="{{ route('data.index', 'programs') }}" data-programmes-list aria-busy="true" aria-live="polite">@include('partials.loading')

            </section>
        </div>
    </main>
@endsection
