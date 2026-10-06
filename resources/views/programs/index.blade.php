@extends('layouts.app')
@section('content')
<main class="programmes-page">
        <div class="container">
            <header class="page-header">
                <h1>Programmes on Offer</h1>
                <p>Study with purpose</p>
            </header>

            <section class="programmes-grid" aria-label="Mukuba University programmes" data-api-section="{{ route('data.index', 'programs') }}" aria-busy="true" aria-live="polite">@include('partials.loading')

            </section>
        </div>
    </main>
@endsection
