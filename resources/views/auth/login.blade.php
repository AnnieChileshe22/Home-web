<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#064b2a">
    <title>Sign in | Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { min-height: 100vh; display: grid; place-items: center; padding: 24px; background: #f4f7f4; }
        .login-card { width: min(100%, 440px); padding: 36px; border: 1px solid #e2e9e3; border-radius: 12px; background: #fff; box-shadow: 0 18px 50px #064b2a12; }
        .login-brand { display: flex; align-items: center; gap: 14px; margin-bottom: 30px; color: #173a28; text-decoration: none; }
        .login-brand img { width: 54px; height: 54px; object-fit: contain; }
        .login-brand strong, .login-brand small { display: block; }
        .login-brand small { margin-top: 4px; color: #68786d; }
        h1 { margin: 0; color: #173a28; font-size: 28px; }
        .login-intro { margin: 8px 0 24px; color: #68786d; }
        .login-field { display: block; margin-top: 18px; color: #263b2f; font-weight: 600; }
        .login-field input { display: block; width: 100%; margin-top: 7px; padding: 12px 13px; border: 1px solid #ccd8ce; border-radius: 6px; font: inherit; }
        .login-field input:focus { outline: 3px solid #b9d6c3; border-color: #17643c; }
        .login-error { margin: 7px 0 0; color: #a33131; font-size: 14px; }
        .login-remember { display: flex; align-items: center; gap: 9px; margin: 18px 0; color: #526158; font-size: 14px; }
        .login-submit { width: 100%; padding: 13px; border: 0; border-radius: 6px; background: #07532f; color: #fff; font: inherit; font-weight: 700; cursor: pointer; }
        .login-submit:hover { background: #063f25; }
        @media (max-width: 480px) { .login-card { padding: 26px 22px; } }
    </style>
</head>
<body>
    <main class="login-card">
        <a class="login-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
            <span><strong>Mukuba University</strong><small>Website administration</small></span>
        </a>
        <h1>Welcome back</h1>
        <p class="login-intro">Sign in to manage the university website.</p>
        @if ($errors->any())
            <div class="login-error" role="alert">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <label class="login-field" for="email">Email address
                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus>
            </label>
            <label class="login-field" for="password">Password
                <input id="password" name="password" type="password" autocomplete="current-password" required>
            </label>
            <label class="login-remember"><input type="checkbox" name="remember" value="1"> Keep me signed in</label>
            <button class="login-submit" type="submit">Sign in</button>
        </form>
    </main>
</body>
</html>
