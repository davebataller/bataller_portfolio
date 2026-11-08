@php
    $certifications = config('portfolio.certifications');
    $totalCertifications = count($certifications);
    $completions = collect($certifications)->where('type', 'Certificate of Completion')->count();
    $participations = collect($certifications)->where('type', 'Certificate of Participation')->count();
    $latestYear = collect($certifications)->max('year') ?? date('Y');
    $certificationStats = [
        ['label' => 'Credentials', 'value' => $totalCertifications, 'icon' => 'award'],
        ['label' => 'Completed', 'value' => $completions, 'icon' => 'check'],
        ['label' => 'Participations', 'value' => $participations, 'icon' => 'users'],
        ['label' => 'Latest year', 'value' => $latestYear, 'icon' => 'calendar'],
    ];
@endphp

<section id="certifications" class="relative scroll-mt-24 py-20 sm:py-24">
    <div class="absolute inset-x-0 top-0 -z-10 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>

    <div class="container-page">
        <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
            <x-section-heading
                eyebrow="Certifications"
                title="Proof of the learning."
                description="A certification dashboard for the trainings, webinars, and courses I have completed. Select any certificate to open the full-size copy."
            />

            <div data-reveal style="--reveal-delay: 100ms" class="inline-flex shrink-0 items-center gap-3 self-start rounded-full border border-white/10 bg-white/[0.03] px-4 py-2 sm:self-auto">
                <x-icon name="award" class="h-4 w-4 text-mint-300" />
                <span class="text-xs font-medium text-slate-300">{{ $totalCertifications }} credentials on file</span>
            </div>
        </div>

        <div data-reveal style="--reveal-delay: 80ms" class="mt-12 overflow-hidden rounded-3xl border border-white/10 bg-white/[0.025]">
            <div class="flex flex-col gap-3 border-b border-white/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div class="flex items-center gap-3">
                    <span class="icon-box !h-9 !w-9 !rounded-xl"><x-icon name="award" class="h-4 w-4" /></span>
                    <div>
                        <h3 class="font-display text-sm font-semibold text-white">Certification dashboard</h3>
                        <p class="text-[0.7rem] text-slate-500">A running tally of certificates earned</p>
                    </div>
                </div>
                <span class="inline-flex w-fit items-center gap-1.5 rounded-full border border-mint-300/20 bg-mint-300/[0.07] px-3 py-1 text-[0.65rem] font-semibold uppercase tracking-wide text-mint-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-mint-300"></span>
                    Up to date
                </span>
            </div>

            <div class="grid grid-cols-2 gap-px bg-white/[0.06] sm:grid-cols-4">
                @foreach ($certificationStats as $stat)
                    <div class="bg-ink-950/60 px-5 py-5">
                        <div class="flex items-center justify-between">
                            <p class="text-[0.65rem] font-semibold uppercase tracking-[0.14em] text-slate-500">{{ $stat['label'] }}</p>
                            <x-icon :name="$stat['icon']" class="h-3.5 w-3.5 text-mint-300/70" />
                        </div>
                        <p class="mt-2 font-display text-2xl font-semibold text-white">{{ $stat['value'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="grid gap-5 p-5 md:grid-cols-2 lg:grid-cols-3 sm:p-6">
                @foreach ($certifications as $certificate)
                    <article class="card-hover group flex flex-col overflow-hidden rounded-2xl border border-white/10 bg-ink-900/50">
                        <a href="{{ asset($certificate['image']) }}" target="_blank" rel="noopener noreferrer"
                           class="relative block aspect-[4/3] overflow-hidden border-b border-white/10 bg-ink-950"
                           aria-label="Open full-size certificate: {{ $certificate['title'] }}">
                            <img src="{{ asset($certificate['image']) }}" alt="{{ $certificate['alt'] }}"
                                 loading="lazy" decoding="async"
                                 class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-[1.03]">
                            <span class="absolute inset-0 bg-gradient-to-t from-ink-950/80 via-transparent to-transparent opacity-70 transition group-hover:opacity-90"></span>
                            <span class="absolute left-3 top-3 inline-flex items-center gap-1.5 rounded-full border border-white/15 bg-ink-950/80 px-2.5 py-1 text-[0.62rem] font-semibold uppercase tracking-wide text-mint-200 backdrop-blur">
                                <x-icon name="award" class="h-3 w-3" />
                                {{ $certificate['issuer_short'] }}
                            </span>
                            <span class="absolute bottom-3 right-3 inline-flex items-center gap-1.5 rounded-full border border-white/15 bg-ink-950/80 px-2.5 py-1 text-[0.62rem] font-medium text-slate-200 backdrop-blur">
                                View certificate
                                <x-icon name="arrow-up-right" class="h-3 w-3" />
                            </span>
                        </a>

                        <div class="flex flex-1 flex-col p-5">
                            <div class="flex flex-wrap items-center gap-2">
                                <span @class([
                                    'inline-flex items-center rounded-full border px-2.5 py-0.5 text-[0.62rem] font-semibold uppercase tracking-wide',
                                    'border-mint-300/20 bg-mint-300/[0.07] text-mint-200' => $certificate['type'] === 'Certificate of Completion',
                                    'border-sky-400/20 bg-sky-400/[0.07] text-sky-300' => $certificate['type'] !== 'Certificate of Completion',
                                ])>{{ $certificate['type'] }}</span>
                                <span class="inline-flex items-center gap-1.5 text-[0.68rem] text-slate-500">
                                    <x-icon name="calendar" class="h-3 w-3" />
                                    {{ $certificate['date'] }}
                                </span>
                            </div>

                            <h3 class="mt-3 font-display text-base font-semibold leading-snug text-white">{{ $certificate['title'] }}</h3>
                            <p class="mt-1.5 text-xs font-medium text-mint-200/80">{{ $certificate['issuer'] }}</p>
                            <p class="mt-3 flex-1 text-xs leading-relaxed text-slate-400">{{ $certificate['description'] }}</p>

                            <div class="mt-4 flex flex-wrap gap-1.5">
                                @foreach ($certificate['tags'] as $tag)
                                    <span class="rounded border border-white/10 px-1.5 py-0.5 text-[0.62rem] text-slate-400">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
