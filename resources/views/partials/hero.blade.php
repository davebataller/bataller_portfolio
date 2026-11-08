<section id="home" class="relative overflow-hidden pb-16 pt-32 sm:pt-36 lg:pb-24 lg:pt-40">
    <div class="container-page grid grid-cols-1 items-center gap-14 lg:grid-cols-[1.12fr_0.88fr] lg:gap-16">
        <div class="relative z-10">
            <div data-reveal class="inline-flex items-center gap-2.5 rounded-full border border-mint-300/20 bg-mint-300/[0.06] px-3.5 py-1.5 text-[0.72rem] font-medium text-mint-200">
                <span class="h-1.5 w-1.5 rounded-full bg-mint-300 animate-pulse-dot"></span>
                {{ config('portfolio.availability') }}
            </div>

            <p data-reveal style="--reveal-delay: 80ms" class="mt-7 text-sm font-medium uppercase tracking-[0.2em] text-slate-500">
                Hello, I&rsquo;m
            </p>

            <h1 data-reveal style="--reveal-delay: 140ms" class="mt-3 font-display text-4xl font-semibold leading-[1.04] tracking-[-0.04em] text-white sm:text-6xl xl:text-7xl">
                Janray Dave T.<br>
                <span class="text-gradient">Bataller</span>
            </h1>

            <div data-reveal style="--reveal-delay: 200ms" class="mt-5 flex flex-wrap items-center gap-x-3 gap-y-2 text-sm text-slate-400 sm:text-base">
                <span class="font-medium text-slate-200">{{ config('portfolio.role') }}</span>
                <span class="h-1 w-1 rounded-full bg-slate-600"></span>
                <span>{{ config('portfolio.school') }}</span>
            </div>

            <p data-reveal style="--reveal-delay: 260ms" class="mt-6 max-w-xl text-base leading-relaxed text-slate-400 sm:text-lg">
                {{ config('portfolio.tagline') }} I&rsquo;m a fourth-year IT student from Abra who enjoys turning ideas into responsive, easy-to-use websites.
            </p>

            <div data-reveal style="--reveal-delay: 320ms" class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                <a href="#projects" class="btn-primary">
                    Explore my work
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
                <a href="{{ config('portfolio.github.profile') }}" target="_blank" rel="noopener noreferrer" class="btn-ghost">
                    <x-icon name="github" class="h-4 w-4" />
                    Visit GitHub
                </a>
            </div>

            <div data-reveal style="--reveal-delay: 380ms" class="mt-9 flex flex-wrap items-center gap-x-6 gap-y-3 text-xs text-slate-500">
                <span class="inline-flex items-center gap-2">
                    <x-icon name="map-pin" class="h-4 w-4 text-mint-300/80" />
                    {{ config('portfolio.location') }}
                </span>
                <span class="inline-flex items-center gap-2">
                    <x-icon name="graduation-cap" class="h-4 w-4 text-mint-300/80" />
                    {{ config('portfolio.year_level') }} &middot; {{ config('portfolio.course') }}
                </span>
            </div>
        </div>

        <div data-reveal style="--reveal-delay: 220ms" class="relative mx-auto w-full max-w-[22rem] sm:max-w-sm lg:max-w-[25rem]">
            <div class="absolute -inset-6 -z-10 rounded-[3rem] bg-gradient-to-br from-mint-300/15 via-transparent to-sky-400/15 blur-2xl" aria-hidden="true"></div>

            <div class="relative rounded-[2rem] border border-white/10 bg-white/[0.03] p-2.5 shadow-2xl shadow-black/40 backdrop-blur-sm">
                <div class="overflow-hidden rounded-[1.55rem] border border-white/10 bg-ink-900">
                    <img src="{{ asset(config('portfolio.profile_image', 'images/profile.svg')) }}" alt="{{ config('portfolio.profile_alt', 'Portrait of ' . config('portfolio.name')) }}"
                         class="aspect-[4/5] w-full object-cover object-top" width="976" height="1100" fetchpriority="high">
                </div>

                <div class="flex items-center justify-between gap-3 px-3 py-3">
                    <div>
                        <p class="font-display text-sm font-semibold text-white">{{ config('portfolio.name') }}</p>
                        <p class="text-[0.7rem] uppercase tracking-[0.18em] text-slate-500">{{ config('portfolio.year_level') }} &middot; BSIT</p>
                    </div>
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-mint-300/20 bg-mint-300/[0.07] px-2.5 py-1 text-[0.65rem] font-semibold uppercase tracking-wide text-mint-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-mint-300"></span>
                        Available
                    </span>
                </div>
            </div>

            <div class="absolute -left-4 top-10 hidden animate-float rounded-2xl border border-white/10 bg-ink-850/90 px-3.5 py-2.5 shadow-xl shadow-black/40 backdrop-blur sm:block">
                <div class="flex items-center gap-2.5">
                    <span class="grid h-8 w-8 place-items-center rounded-lg bg-[#FF2D20]/15 text-[#FF7A70]">
                        <x-icon name="code" class="h-4 w-4" />
                    </span>
                    <div>
                        <p class="text-[0.68rem] font-semibold text-white">Laravel + Blade</p>
                        <p class="text-[0.6rem] text-slate-500">My main stack</p>
                    </div>
                </div>
            </div>

            <div class="absolute -right-3 bottom-24 hidden animate-float-slow rounded-2xl border border-white/10 bg-ink-850/90 px-3.5 py-2.5 shadow-xl shadow-black/40 backdrop-blur sm:block">
                <div class="flex items-center gap-2.5">
                    <span class="grid h-8 w-8 place-items-center rounded-lg bg-mint-300/10 text-mint-300">
                        <x-icon name="sparkles" class="h-4 w-4" />
                    </span>
                    <div>
                        <p class="text-[0.68rem] font-semibold text-white">Always learning</p>
                        <p class="text-[0.6rem] text-slate-500">One project at a time</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-page mt-16 lg:mt-20">
        <div data-reveal class="grid grid-cols-2 gap-px overflow-hidden rounded-2xl border border-white/10 bg-white/5 sm:grid-cols-4">
            @foreach (config('portfolio.stats') as $stat)
                <div class="bg-ink-950/80 px-5 py-6 text-center sm:text-left">
                    <p class="font-display text-2xl font-semibold text-white sm:text-3xl">{{ $stat['value'] }}</p>
                    <p class="mt-1 text-[0.7rem] uppercase tracking-[0.14em] text-slate-500">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
