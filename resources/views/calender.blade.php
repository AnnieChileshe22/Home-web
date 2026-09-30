<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academic Calendar | Mukuba University</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('header contents.header')
    <main><h1>Academic Calendar</h1></main>
    @include('header contents.footer')
</body>
</html>
