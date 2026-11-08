<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('portfolio.name') . ' — Portfolio')</title>
    <meta name="description" content="@yield('description', 'The online portfolio of ' . config('portfolio.name') . ', a ' . config('portfolio.role') . ' at ' . config('portfolio.school') . '.')">
    <meta name="author" content="{{ config('portfolio.name') }}">
    <meta name="theme-color" content="#05070d">

    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', config('portfolio.name') . ' — Portfolio')">
    <meta property="og:description" content="@yield('description', config('portfolio.tagline'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/profile.svg') }}">

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative min-h-screen overflow-x-hidden bg-ink-950 font-sans text-slate-300">
    <a href="#main-content" class="skip-link">Skip to content</a>

    <div class="pointer-events-none fixed inset-0 -z-10 bg-grid" aria-hidden="true"></div>
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden" aria-hidden="true">
        <div class="glow left-1/2 top-[-12rem] h-[26rem] w-[26rem] -translate-x-1/2 bg-mint-300/30"></div>
        <div class="glow right-[-10rem] top-[28rem] h-[24rem] w-[24rem] bg-sky-400/20"></div>
        <div class="glow bottom-[-8rem] left-[-8rem] h-[22rem] w-[22rem] bg-violet-500/15"></div>
    </div>

    @include('partials.navbar')

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
