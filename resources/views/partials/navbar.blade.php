@php
    $navItems = [
        ['label' => 'About', 'href' => route('home') . '#about'],
        ['label' => 'Education', 'href' => route('home') . '#education'],
        ['label' => 'Certifications', 'href' => route('home') . '#certifications'],
        ['label' => 'Projects', 'href' => route('home') . '#projects'],
        ['label' => 'GitHub', 'href' => route('home') . '#github'],
        ['label' => 'Contact', 'href' => route('home') . '#contact'],
    ];
@endphp

<header data-site-header class="fixed inset-x-0 top-0 z-50 border-b border-transparent transition-all duration-300">
    <div class="container-page flex h-20 items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="group flex items-center gap-3" aria-label="{{ config('portfolio.name') }} — home">
            <span class="relative grid h-11 w-11 place-items-center overflow-hidden rounded-2xl border border-white/10 bg-ink-900 font-display text-sm font-bold text-mint-200 shadow-lg shadow-black/30">
                <span class="absolute inset-0 bg-gradient-to-br from-mint-300/20 via-transparent to-sky-400/20"></span>
                <span class="relative">{{ config('portfolio.initials') }}</span>
            </span>
            <span class="hidden sm:block leading-tight">
                <span class="block font-display text-sm font-semibold tracking-tight text-white">{{ config('portfolio.name') }}</span>
                <span class="block text-[0.68rem] uppercase tracking-[0.22em] text-slate-500">BSIT Portfolio</span>
            </span>
        </a>

        <nav class="hidden items-center gap-6 lg:flex" aria-label="Primary">
            @foreach ($navItems as $item)
                <a href="{{ $item['href'] }}" class="nav-link" data-nav-link>{{ $item['label'] }}</a>
            @endforeach
        </nav>

        <div class="hidden items-center gap-3 lg:flex">
            <a href="{{ config('portfolio.github.profile') }}" target="_blank" rel="noopener noreferrer"
               class="grid h-10 w-10 place-items-center rounded-full border border-white/10 bg-white/[0.03] text-slate-300 transition hover:border-mint-300/40 hover:text-mint-200"
               aria-label="GitHub profile">
                <x-icon name="github" class="h-[1.15rem] w-[1.15rem]" />
            </a>
            <a href="{{ route('dashboard') }}" @class(['btn-ghost', '!border-mint-300/40' => request()->routeIs('dashboard')])>
                <x-icon name="dashboard" class="h-4 w-4" />
                Dashboard
            </a>
        </div>

        <button type="button" data-menu-button aria-expanded="false" aria-controls="mobile-menu"
                class="grid h-11 w-11 place-items-center rounded-xl border border-white/10 bg-white/[0.03] text-slate-200 lg:hidden">
            <span class="sr-only">Toggle navigation</span>
            <x-icon name="menu" class="h-5 w-5" data-menu-icon-open />
            <x-icon name="x" class="hidden h-5 w-5" data-menu-icon-close />
        </button>
    </div>

    <div id="mobile-menu" data-mobile-menu class="hidden border-t border-white/10 bg-ink-950/95 backdrop-blur-xl lg:hidden">
        <nav class="container-page flex flex-col gap-1 py-5" aria-label="Mobile">
            @foreach ($navItems as $item)
                <a href="{{ $item['href'] }}" class="rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/5 hover:text-white">
                    {{ $item['label'] }}
                </a>
            @endforeach
            <div class="mt-3 grid grid-cols-2 gap-3 border-t border-white/10 pt-4">
                <a href="{{ route('dashboard') }}" class="btn-ghost">
                    <x-icon name="dashboard" class="h-4 w-4" /> Dashboard
                </a>
                <a href="{{ config('portfolio.github.profile') }}" target="_blank" rel="noopener noreferrer" class="btn-primary">
                    <x-icon name="github" class="h-4 w-4" /> GitHub
                </a>
            </div>
        </nav>
    </div>

    <div class="absolute inset-x-0 bottom-0 h-px bg-white/5">
        <span data-scroll-progress class="block h-full w-0 bg-gradient-to-r from-mint-300 to-sky-400"></span>
    </div>
</header>
