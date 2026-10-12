@extends('layouts.app')
@section('content')
<main class="schools-page">
        <div class="container">
            <header class="page-header">
                <h1 >Our Schools</h1>
                <p>Academic excellence</p>
            </header>

            <section class="school-grid" aria-label="Schools at Mukuba University" data-api-section="{{ route('data.index', 'schools') }}" aria-busy="true" aria-live="polite">@include('partials.loading')  
            </section>
        </div>
    </main>
@endsection
