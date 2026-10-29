@extends('layouts.app')

@section('content')
    @php
        $roles = \App\Http\Controllers\ProfileController::MANAGEMENT_ROLES;
        $roleProfiles = $profiles->keyBy('management_role');
        $renderCard = function ($role, $classes = '') use ($roleProfiles) {
            $profile = $roleProfiles->get($role);
            if (!$profile) return;
            $image = Storage::disk('public')->url($profile->profile_pic);
            $url = route('profiles.show', $profile);
            echo '<article class="management-card ' . e($classes) . '">';
            echo '<a class="management-card-hitarea" href="' . e($url) . '" aria-label="View profile for ' . e($profile->full_name) . '"></a>';
            echo '<img src="' . e($image) . '" alt="' . e($profile->full_name) . '">';
            echo '<div class="management-body"><h2>' . e($profile->full_name) . '</h2><p class="management-role">' . e($profile->management_role) . '</p><a href="' . e($url) . '" class="management-link">Profile</a></div></article>';
        };
    @endphp
    <main class="management-page">
        <div class="page-width management-wrap">
            <p class="management-kicker">Mukuba University</p>
            <h1 class="management-title">Management</h1>
            <div class="management-grid">
                <div class="management-row management-row-single">{!! $renderCard($roles[0], 'management-card-featured management-card-centered') !!}</div>
                <div class="management-row management-row-dual">{!! $renderCard($roles[1]) !!}{!! $renderCard($roles[2]) !!}</div>
                <div class="management-row management-row-single">{!! $renderCard($roles[3], 'management-card-centered-standalone') !!}</div>
                <div class="management-row management-row-triple">{!! $renderCard($roles[4]) !!}{!! $renderCard($roles[5]) !!}{!! $renderCard($roles[6]) !!}</div>
            </div>
        </div>
    </main>
@endsection
