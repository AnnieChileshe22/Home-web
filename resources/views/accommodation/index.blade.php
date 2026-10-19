@extends('layouts.app')
@section('content')
    <main class="accommodation-page">
        <div class="container">
            <header class="page-header"><h1>University Hostels</h1></header>
            @forelse ($hostels->groupBy('gender') as $gender => $group)
                <section class="category-section" aria-labelledby="{{ $gender }}-hostels">
                    <div class="category-heading" id="{{ $gender }}-hostels">{{ ucfirst($gender) }} Hostels</div>
                    <div class="hostel-grid">
                        @foreach ($group as $hostel)
                            <a href="{{ route('hostels.public.show', $hostel) }}" class="hostel-card">
                                <div class="hostel-image">
                                    @if ($hostel->images->first())<img src="{{ Storage::disk('public')->url($hostel->images->first()->path) }}" alt="{{ $hostel->name }}">@else<div aria-hidden="true" class="hostel-image-placeholder">{{ $hostel->name }}</div>@endif
                                </div>
                                <div class="hostel-body">
                                    <h2>{{ $hostel->name }}</h2>
                                    <p>{{ \Illuminate\Support\Str::limit($hostel->description ?: 'Student accommodation at Mukuba University.', 180) }}</p>
                                    <p><strong>ZMW {{ number_format((float) $hostel->price, 2) }}</strong> per semester</p>
                                    @if ($hostel->features)<div class="services">@foreach ($hostel->features as $feature)<span class="service-pill">{{ $feature }}</span>@endforeach</div>@endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @empty
                <p class="page-description">Hostel information will be available soon.</p>
            @endforelse
        </div>
    </main>
@endsection
