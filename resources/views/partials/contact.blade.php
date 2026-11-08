<section id="contact" class="relative scroll-mt-24 pb-8 pt-20 sm:pt-24">
    <div class="container-page">
        <div data-reveal class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-gradient-to-br from-mint-300/[0.08] via-ink-900/70 to-sky-400/[0.06] p-6 sm:p-10 lg:p-12">
            <div class="pointer-events-none absolute -right-24 -top-24 h-64 w-64 rounded-full bg-sky-400/10 blur-3xl" aria-hidden="true"></div>
            <div class="pointer-events-none absolute -bottom-24 -left-24 h-64 w-64 rounded-full bg-mint-300/10 blur-3xl" aria-hidden="true"></div>
            <div class="pointer-events-none absolute inset-0 bg-grid opacity-40" aria-hidden="true"></div>

            <div class="relative grid grid-cols-1 gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                <div>
                    <span class="eyebrow">Contact</span>
                    <h2 class="mt-4 font-display text-3xl font-semibold leading-[1.1] tracking-[-0.03em] text-white sm:text-4xl lg:text-5xl">
                        Let&rsquo;s build something <span class="text-gradient">together.</span>
                    </h2>
                    <p class="mt-4 max-w-lg text-sm leading-relaxed text-slate-400 sm:text-base">
                        Whether it&rsquo;s an internship, a school project, or a small website idea, my inbox is open. I&rsquo;d be glad to hear from you.
                    </p>

                    <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:items-center">
                        <a href="mailto:{{ config('portfolio.email') }}?subject=Hello%20Janray" class="btn-primary">
                            <x-icon name="mail" class="h-4 w-4" />
                            Send me an email
                        </a>
                        <a href="{{ config('portfolio.github.profile') }}" target="_blank" rel="noopener noreferrer" class="btn-ghost">
                            <x-icon name="github" class="h-4 w-4" />
                            Connect on GitHub
                        </a>
                    </div>

                    <div class="mt-7 inline-flex items-center gap-2 text-xs text-slate-500">
                        <span class="h-1.5 w-1.5 rounded-full bg-mint-300 animate-pulse-dot"></span>
                        {{ config('portfolio.availability') }}
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-3">
                    <div class="glass-panel rounded-2xl p-4">
                        <p class="text-[0.65rem] font-semibold uppercase tracking-[0.18em] text-slate-500">Email</p>
                        <div class="mt-2 flex items-center gap-2">
                            <a href="mailto:{{ config('portfolio.email') }}" class="min-w-0 flex-1 break-all text-sm font-medium text-slate-200 transition hover:text-mint-200">{{ config('portfolio.email') }}</a>
                            <button type="button" data-copy-email="{{ config('portfolio.email') }}" data-label="Copy"
                                    class="shrink-0 rounded-lg border border-white/10 bg-white/[0.03] px-2.5 py-1 text-[0.65rem] font-semibold text-slate-400 transition hover:border-mint-300/30 hover:text-mint-200">
                                Copy
                            </button>
                        </div>
                    </div>

                    <div class="glass-panel rounded-2xl p-4">
                        <p class="text-[0.65rem] font-semibold uppercase tracking-[0.18em] text-slate-500">Phone</p>
                        @if (config('portfolio.phone_link'))
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('portfolio.phone_link')) }}" class="mt-2 block text-sm font-medium text-slate-200 transition hover:text-mint-200">{{ config('portfolio.phone') }}</a>
                            <p class="mt-1 text-[0.68rem] text-slate-500">Tap to call</p>
                        @else
                            <p class="mt-2 text-sm font-medium text-slate-200">{{ config('portfolio.phone') }}</p>
                            <p class="mt-1 text-[0.68rem] text-slate-500">Best reached by email for now.</p>
                        @endif
                    </div>

                    <div class="glass-panel rounded-2xl p-4">
                        <p class="text-[0.65rem] font-semibold uppercase tracking-[0.18em] text-slate-500">Location</p>
                        <p class="mt-2 inline-flex items-center gap-2 text-sm font-medium text-slate-200">
                            <x-icon name="map-pin" class="h-4 w-4 text-mint-300" />
                            {{ config('portfolio.location') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
