@extends('layouts.app')
@section('content')
<div data-api-section="{{ route('data.show', ['resource' => 'schools', 'id' => $id]) }}" aria-busy="true" aria-live="polite"><main class="section page-width"><h1>School details</h1>@include('partials.loading')</main></div>
@endsection
