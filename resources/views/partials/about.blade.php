<section id="about" class="relative scroll-mt-24 py-20 sm:py-24">
    <div class="container-page">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:gap-16">
            <div>
                <x-section-heading
                    eyebrow="About me"
                    title="Curious by nature, builder by practice."
                />

                <div data-reveal style="--reveal-delay: 80ms" class="mt-6 space-y-4 text-sm leading-relaxed text-slate-400 sm:text-base">
                    @foreach (config('portfolio.bio') as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>

                <div data-reveal style="--reveal-delay: 140ms" class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="mailto:{{ config('portfolio.email') }}" class="btn-primary">
                        <x-icon name="mail" class="h-4 w-4" />
                        Let&rsquo;s talk
                    </a>
                    <a href="{{ config('portfolio.github.profile') }}" target="_blank" rel="noopener noreferrer" class="btn-ghost">
                        <x-icon name="github" class="h-4 w-4" />
                        See my code
                    </a>
                </div>

                <div data-reveal style="--reveal-delay: 200ms" class="mt-10 rounded-2xl border border-white/10 bg-white/[0.025] p-5">
                    <div class="flex items-center gap-3">
                        <span class="grid h-10 w-10 place-items-center rounded-xl bg-mint-300/10 text-mint-300">
                            <x-icon name="sparkles" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-sm font-semibold text-white">Currently focused on</p>
                            <p class="text-xs text-slate-500">What keeps me busy this semester</p>
                        </div>
                    </div>
                    <ul class="mt-4 grid gap-2.5 sm:grid-cols-2">
                        @foreach (config('portfolio.learning') as $item)
                            <li class="flex items-start gap-2 text-xs leading-relaxed text-slate-400">
                                <x-icon name="check" class="mt-0.5 h-3.5 w-3.5 shrink-0 text-mint-300" />
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="grid grid-cols-1 content-start gap-4 sm:grid-cols-2">
                <div data-reveal style="--reveal-delay: 30ms" class="glass-panel card-hover overflow-hidden rounded-2xl sm:col-span-2">
                    <div class="flex flex-col gap-5 p-5 sm:flex-row sm:items-center">
                        <a href="{{ asset(config('portfolio.profile_image', 'images/profile.svg')) }}" target="_blank" rel="noopener noreferrer"
                           class="relative mx-auto block h-28 w-28 shrink-0 overflow-hidden rounded-2xl border border-white/12 bg-ink-950 shadow-lg shadow-black/30 sm:mx-0"
                           aria-label="Open full-size profile photo">
                            <img src="{{ asset(config('portfolio.profile_image', 'images/profile.svg')) }}" alt="{{ config('portfolio.profile_alt', 'Portrait of ' . config('portfolio.name')) }}"
                                 class="h-full w-full object-cover object-top" width="976" height="1100" loading="lazy" decoding="async">
                        </a>
                        <div class="min-w-0 flex-1 text-center sm:text-left">
                            <p class="text-[0.68rem] font-semibold uppercase tracking-[0.18em] text-mint-300/80">Profile</p>
                            <p class="mt-1 font-display text-lg font-semibold leading-tight text-white">{{ config('portfolio.name') }}</p>
                            <p class="mt-1 text-xs leading-relaxed text-slate-400">{{ config('portfolio.role') }}</p>
                            <p class="mt-0.5 text-xs text-slate-500">{{ config('portfolio.school') }} &middot; {{ config('portfolio.year_level') }}</p>
                            <span class="mt-3 inline-flex items-center gap-1.5 rounded-full border border-mint-300/20 bg-mint-300/[0.07] px-2.5 py-1 text-[0.65rem] font-semibold uppercase tracking-wide text-mint-200">
                                <span class="h-1.5 w-1.5 rounded-full bg-mint-300"></span>
                                {{ config('portfolio.availability') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div data-reveal style="--reveal-delay: 60ms" class="glass-panel card-hover rounded-2xl p-5 sm:col-span-2">
                    <div class="flex items-start gap-4">
                        <span class="icon-box shrink-0"><x-icon name="mail" class="h-5 w-5" /></span>
                        <div class="min-w-0">
                            <p class="text-[0.68rem] font-semibold uppercase tracking-[0.18em] text-slate-500">Email</p>
                            <a href="mailto:{{ config('portfolio.email') }}" class="mt-1 block break-all text-sm font-medium text-slate-200 transition hover:text-mint-200">
                                {{ config('portfolio.email') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div data-reveal style="--reveal-delay: 100ms" class="glass-panel card-hover rounded-2xl p-5">
                    <div class="flex items-start gap-4">
                        <span class="icon-box shrink-0"><x-icon name="phone" class="h-5 w-5" /></span>
                        <div>
                            <p class="text-[0.68rem] font-semibold uppercase tracking-[0.18em] text-slate-500">Contact</p>
                            @if (config('portfolio.phone_link'))
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('portfolio.phone_link')) }}" class="mt-1 block text-sm font-medium text-slate-200 transition hover:text-mint-200">
                                    {{ config('portfolio.phone') }}
                                </a>
                            @else
                                <p class="mt-1 text-sm font-medium text-slate-200">{{ config('portfolio.phone') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div data-reveal style="--reveal-delay: 140ms" class="glass-panel card-hover rounded-2xl p-5">
                    <div class="flex items-start gap-4">
                        <span class="icon-box shrink-0"><x-icon name="map-pin" class="h-5 w-5" /></span>
                        <div>
                            <p class="text-[0.68rem] font-semibold uppercase tracking-[0.18em] text-slate-500">Location</p>
                            <p class="mt-1 text-sm font-medium text-slate-200">{{ config('portfolio.location') }}</p>
                        </div>
                    </div>
                </div>

                <div data-reveal style="--reveal-delay: 180ms" class="glass-panel card-hover rounded-2xl p-5 sm:col-span-2">
                    <div class="flex items-start gap-4">
                        <span class="icon-box shrink-0"><x-icon name="graduation-cap" class="h-5 w-5" /></span>
                        <div>
                            <p class="text-[0.68rem] font-semibold uppercase tracking-[0.18em] text-slate-500">Currently studying</p>
                            <p class="mt-1 text-sm font-medium text-slate-200">{{ config('portfolio.course') }}</p>
                            <p class="mt-0.5 text-xs text-slate-500">{{ config('portfolio.school') }} &middot; {{ config('portfolio.year_level') }}</p>
                        </div>
                    </div>
                </div>

                <div data-reveal style="--reveal-delay: 220ms" class="relative overflow-hidden rounded-2xl border border-mint-300/15 bg-gradient-to-br from-mint-300/[0.08] via-transparent to-sky-400/[0.06] p-5 sm:col-span-2">
                    <div class="flex items-center gap-3">
                        <span class="grid h-10 w-10 place-items-center rounded-xl border border-mint-300/20 bg-mint-300/10 text-mint-200">
                            <x-icon name="github" class="h-5 w-5" />
                        </span>
                        <div class="min-w-0">
                            <p class="text-[0.68rem] font-semibold uppercase tracking-[0.18em] text-mint-300/80">GitHub</p>
                            <a href="{{ config('portfolio.github.profile') }}" target="_blank" rel="noopener noreferrer" class="mt-0.5 block truncate text-sm font-medium text-slate-200 transition hover:text-mint-200">
                                github.com/{{ config('portfolio.github.username') }}
                            </a>
                        </div>
                        <a href="{{ config('portfolio.github.profile') }}" target="_blank" rel="noopener noreferrer" class="ml-auto grid h-8 w-8 shrink-0 place-items-center rounded-full border border-white/10 text-slate-400 transition hover:border-mint-300/40 hover:text-mint-200" aria-label="Open GitHub profile">
                            <x-icon name="arrow-up-right" class="h-4 w-4" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-14 grid grid-cols-1 gap-4 sm:grid-cols-3">
            @php
                $skillIcons = ['Frontend' => 'palette', 'Backend' => 'database', 'Tools' => 'tools'];
            @endphp
            @foreach (config('portfolio.skills') as $group => $skills)
                <div data-reveal style="--reveal-delay: {{ $loop->index * 60 }}ms" class="glass-panel card-hover rounded-2xl p-5">
                    <div class="flex items-center gap-3">
                        <span class="icon-box !h-10 !w-10"><x-icon :name="$skillIcons[$group] ?? 'code'" class="h-4.5 w-4.5" /></span>
                        <h3 class="font-display text-sm font-semibold text-white">{{ $group }}</h3>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach ($skills as $skill)
                            <span class="chip">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
