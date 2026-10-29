@extends('layouts.app')

@section('content')
    <main class="profile-detail-page">
        <div class="page-width profile-detail-wrap">
            <a class="profile-back-link" href="{{ route('management') }}">&larr; University management</a>
            <article class="profile-detail-card">
                <img class="profile-detail-photo" src="{{ Storage::disk('public')->url($profile->profile_pic) }}" alt="{{ $profile->full_name }}">
                <div class="profile-detail-copy">
                    <p class="profile-detail-kicker">{{ $profile->management_role }}</p>
                    <h1>{{ $profile->full_name }}</h1>
                    <div class="profile-biography">{!! $profile->biography !!}</div>
                </div>
            </article>
        </div>
    </main>
    <style>
        .profile-detail-page{background:linear-gradient(180deg,#f6f9f4,#eef4f0);padding:36px 0 64px;min-height:55vh}
        .profile-detail-wrap{width:min(1100px,calc(100% - 32px));margin:auto}
        .profile-back-link{display:inline-block;margin-bottom:20px;color:#087b42;font-weight:700;text-decoration:none}
        .profile-detail-card{display:grid;grid-template-columns:minmax(260px,380px) minmax(0,1fr);gap:clamp(24px,5vw,56px);align-items:start;padding:clamp(20px,4vw,48px);background:#fff;border:1px solid #dfe8df;border-radius:18px;box-shadow:0 14px 28px #0f2e210d}
        .profile-detail-photo{width:100%;max-height:500px;object-fit:cover;object-position:top;border-radius:12px;background:#e7efe9}
        .profile-detail-kicker{margin:0 0 12px;color:#347b52;font-size:.8rem;font-weight:800;letter-spacing:.12em;text-transform:uppercase}
        .profile-detail-copy h1{margin:0 0 26px;color:#103826;font:clamp(2rem,4vw,3.2rem)/1.15 Georgia,serif}
        .profile-biography{color:#34483c;line-height:1.8}.profile-biography p{margin:0 0 1em}.profile-biography ul,.profile-biography ol{padding-left:1.5em}
        @media(max-width:720px){.profile-detail-card{grid-template-columns:1fr}.profile-detail-photo{max-height:420px}}
    </style>
@endsection
