<section id="education" class="relative scroll-mt-24 py-20 sm:py-24">
    <div class="absolute inset-x-0 top-0 -z-10 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>

    <div class="container-page">
        <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
            <x-section-heading
                eyebrow="Education"
                title="The road so far."
                description="Every stage taught me something different — from the basics of learning to the fundamentals of building for the web."
            />

            <div data-reveal style="--reveal-delay: 100ms" class="inline-flex shrink-0 items-center gap-3 self-start rounded-full border border-white/10 bg-white/[0.03] px-4 py-2 sm:self-auto">
                <x-icon name="graduation-cap" class="h-4 w-4 text-mint-300" />
                <span class="text-xs font-medium text-slate-300">3 education milestones</span>
            </div>
        </div>

        <div class="timeline mt-12 space-y-6 sm:mt-14">
            @foreach (config('portfolio.education') as $entry)
                <div data-reveal style="--reveal-delay: {{ $loop->index * 80 }}ms" class="relative pl-10 sm:pl-12">
                    <span class="absolute left-0 top-7 grid h-6 w-6 place-items-center rounded-full border-2 border-ink-950 bg-ink-900 shadow-lg shadow-black/40 ring-1 ring-white/15">
                        <span @class(['h-2 w-2 rounded-full', 'bg-mint-300 animate-pulse-dot' => $entry['current'], 'bg-slate-500' => ! $entry['current']])></span>
                    </span>

                    <article class="glass-panel card-hover rounded-2xl p-5 sm:p-7">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                            <div class="flex items-start gap-4">
                                <span class="icon-box shrink-0">
                                    <x-icon name="graduation-cap" class="h-5 w-5" />
                                </span>
                                <div>
                                    <p class="text-[0.68rem] font-semibold uppercase tracking-[0.18em] text-mint-300/80">{{ $entry['level'] }}</p>
                                    <h3 class="mt-1 font-display text-lg font-semibold text-white">{{ $entry['program'] }}</h3>
                                    <p class="mt-0.5 text-sm text-slate-400">{{ $entry['school'] }}</p>
                                </div>
                            </div>

                            <div class="flex shrink-0 flex-wrap items-center gap-2 sm:flex-col sm:items-end">
                                <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/[0.04] px-3 py-1 text-[0.7rem] font-semibold text-slate-300">
                                    <x-icon name="calendar" class="h-3.5 w-3.5 text-slate-500" />
                                    {{ $entry['year'] }}
                                </span>
                                <span @class([
                                    'inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-[0.7rem] font-semibold',
                                    'border border-mint-300/20 bg-mint-300/10 text-mint-200' => $entry['current'],
                                    'border border-white/10 bg-white/[0.03] text-slate-400' => ! $entry['current'],
                                ])>
                                    @if ($entry['current'])
                                        <span class="h-1.5 w-1.5 rounded-full bg-mint-300"></span>
                                    @endif
                                    {{ $entry['status'] }}
                                </span>
                            </div>
                        </div>

                        <p class="mt-5 text-sm leading-relaxed text-slate-400">{{ $entry['description'] }}</p>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
