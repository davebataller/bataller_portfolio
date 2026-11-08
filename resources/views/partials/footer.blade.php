<footer class="relative mt-24 border-t border-white/5">
    <div class="container-page py-14">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-[1.4fr_1fr_1fr]">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <span class="grid h-11 w-11 place-items-center rounded-2xl border border-white/10 bg-ink-900 font-display text-sm font-bold text-mint-200">
                        {{ config('portfolio.initials') }}
                    </span>
                    <span class="font-display text-base font-semibold text-white">{{ config('portfolio.name') }}</span>
                </a>
                <p class="mt-4 max-w-sm text-sm leading-relaxed text-slate-400">
                    {{ config('portfolio.tagline') }} Currently studying {{ config('portfolio.course') }} at {{ config('portfolio.school') }}.
                </p>
                <div class="mt-5 flex items-center gap-3">
                    <a href="{{ config('portfolio.github.profile') }}" target="_blank" rel="noopener noreferrer"
                       class="grid h-10 w-10 place-items-center rounded-full border border-white/10 text-slate-300 transition hover:border-mint-300/40 hover:text-mint-200" aria-label="GitHub">
                        <x-icon name="github" class="h-4 w-4" />
                    </a>
                    <a href="mailto:{{ config('portfolio.email') }}"
                       class="grid h-10 w-10 place-items-center rounded-full border border-white/10 text-slate-300 transition hover:border-mint-300/40 hover:text-mint-200" aria-label="Email">
                        <x-icon name="mail" class="h-4 w-4" />
                    </a>
                    <a href="{{ config('portfolio.github.repository') }}" target="_blank" rel="noopener noreferrer"
                       class="grid h-10 w-10 place-items-center rounded-full border border-white/10 text-slate-300 transition hover:border-mint-300/40 hover:text-mint-200" aria-label="Source repository">
                        <x-icon name="code" class="h-4 w-4" />
                    </a>
                </div>
            </div>

            <div>
                <p class="text-[0.7rem] font-semibold uppercase tracking-[0.2em] text-slate-500">Explore</p>
                <ul class="mt-4 space-y-3 text-sm">
                    <li><a href="{{ route('home') }}#about" class="text-slate-400 transition hover:text-mint-200">About me</a></li>
                    <li><a href="{{ route('home') }}#education" class="text-slate-400 transition hover:text-mint-200">Education</a></li>
                    <li><a href="{{ route('home') }}#certifications" class="text-slate-400 transition hover:text-mint-200">Certifications</a></li>
                    <li><a href="{{ route('home') }}#projects" class="text-slate-400 transition hover:text-mint-200">Projects</a></li>
                    <li><a href="{{ route('dashboard') }}" class="text-slate-400 transition hover:text-mint-200">Dashboard</a></li>
                </ul>
            </div>

            <div>
                <p class="text-[0.7rem] font-semibold uppercase tracking-[0.2em] text-slate-500">Get in touch</p>
                <ul class="mt-4 space-y-3 text-sm">
                    <li>
                        <a href="mailto:{{ config('portfolio.email') }}" class="inline-flex items-start gap-2.5 text-slate-400 transition hover:text-mint-200">
                            <x-icon name="mail" class="mt-0.5 h-4 w-4 shrink-0" />
                            <span class="break-all">{{ config('portfolio.email') }}</span>
                        </a>
                    </li>
                    <li class="inline-flex items-start gap-2.5 text-slate-400">
                        <x-icon name="map-pin" class="mt-0.5 h-4 w-4 shrink-0" />
                        <span>{{ config('portfolio.location') }}</span>
                    </li>
                    <li>
                        <a href="{{ config('portfolio.github.repository') }}/blob/main/PROMPT_LOG.md" target="_blank" rel="noopener noreferrer" class="inline-flex items-start gap-2.5 text-slate-400 transition hover:text-mint-200">
                            <x-icon name="book" class="mt-0.5 h-4 w-4 shrink-0" />
                            <span>AI prompt log</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col items-start justify-between gap-4 border-t border-white/5 pt-6 text-xs text-slate-500 sm:flex-row sm:items-center">
            <p>&copy; {{ date('Y') }} {{ config('portfolio.name') }}. All rights reserved.</p>
            <p class="inline-flex items-center gap-1.5">
                Built with <span class="font-medium text-slate-300">Laravel</span>, Blade &amp; Tailwind CSS
                <x-icon name="sparkles" class="h-3.5 w-3.5 text-mint-300" />
            </p>
        </div>
    </div>
</footer>
