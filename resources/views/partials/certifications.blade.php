@php
    $certifications = config('portfolio.certifications');
    $totalCertifications = count($certifications);
    $completions = collect($certifications)->where('type', 'Certificate of Completion')->count();
    $participations = collect($certifications)->where('type', 'Certificate of Participation')->count();
    $latestYear = collect($certifications)->max('year') ?: '—';
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
                description="A certification dashboard for the trainings, webinars, and courses I have completed. Select any certificate to view or download the full-size copy."
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

            <div class="p-5 sm:p-6">
                @if ($totalCertifications > 0)
                    <div class="mb-5 flex flex-wrap items-center gap-2" data-cert-filters role="group" aria-label="Filter certifications by type">
                        <button type="button" data-cert-filter="all"
                                class="inline-flex items-center gap-1.5 rounded-full border border-mint-300/30 bg-mint-300/10 px-3.5 py-1.5 text-[0.65rem] font-semibold uppercase tracking-wide text-mint-200 transition"
                                aria-pressed="true">
                            All · {{ $totalCertifications }}
                        </button>
                        <button type="button" data-cert-filter="Certificate of Completion"
                                class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/[0.03] px-3.5 py-1.5 text-[0.65rem] font-semibold uppercase tracking-wide text-slate-400 transition hover:border-mint-300/25 hover:text-mint-200"
                                aria-pressed="false">
                            Completions · {{ $completions }}
                        </button>
                        <button type="button" data-cert-filter="Certificate of Participation"
                                class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/[0.03] px-3.5 py-1.5 text-[0.65rem] font-semibold uppercase tracking-wide text-slate-400 transition hover:border-mint-300/25 hover:text-mint-200"
                                aria-pressed="false">
                            Participations · {{ $participations }}
                        </button>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3" data-cert-grid>
                        @foreach ($certifications as $certificate)
                            <article class="card-hover group flex flex-col overflow-hidden rounded-2xl border border-white/10 bg-ink-900/50"
                                     data-cert-card data-cert-type="{{ $certificate['type'] }}">
                                {{-- Full certificate, framed without cropping for both portrait and landscape images --}}
                                <div class="relative aspect-[4/3] overflow-hidden border-b border-white/10 bg-ink-950">
                                    <img src="{{ asset($certificate['image']) }}" alt="" aria-hidden="true" loading="lazy"
                                         class="absolute inset-0 h-full w-full scale-110 object-cover opacity-30 blur-xl saturate-150">
                                    <a href="{{ asset($certificate['image']) }}" target="_blank" rel="noopener noreferrer" download
                                       class="relative block h-full w-full p-3"
                                       aria-label="Open full-size certificate: {{ $certificate['title'] }}">
                                        <img src="{{ asset($certificate['image']) }}" alt="{{ $certificate['alt'] }}"
                                             loading="lazy" decoding="async"
                                             class="h-full w-full rounded-lg object-contain shadow-2xl shadow-black/50 transition duration-500 group-hover:scale-[1.02]">
                                    </a>
                                    <span class="pointer-events-none absolute left-3 top-3 inline-flex items-center gap-1.5 rounded-full border border-white/15 bg-ink-950/80 px-2.5 py-1 text-[0.62rem] font-semibold uppercase tracking-wide text-mint-200 backdrop-blur">
                                        <x-icon name="award" class="h-3 w-3" />
                                        {{ $certificate['issuer_short'] }}
                                    </span>
                                    <span class="pointer-events-none absolute bottom-3 right-3 inline-flex items-center gap-1.5 rounded-full border border-white/15 bg-ink-950/80 px-2.5 py-1 text-[0.62rem] font-medium text-slate-200 backdrop-blur">
                                        View certificate
                                        <x-icon name="arrow-up-right" class="h-3 w-3" />
                                    </span>
                                </div>

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
                                        @if (! empty($certificate['mode']))
                                            <span class="inline-flex items-center gap-1.5 text-[0.68rem] text-slate-500">
                                                <span class="h-1 w-1 rounded-full bg-slate-600" aria-hidden="true"></span>
                                                {{ $certificate['mode'] }}
                                            </span>
                                        @endif
                                    </div>

                                    <h3 class="mt-3 font-display text-base font-semibold leading-snug text-white">{{ $certificate['title'] }}</h3>

                                    <p class="mt-1.5 text-xs font-medium text-slate-300">
                                        Awarded to {{ $certificate['awarded_to'] ?? config('portfolio.name') }}
                                    </p>

                                    <p class="mt-1 text-xs text-mint-200/80">
                                        @if (! empty($certificate['issuer_url']))
                                            <a href="{{ $certificate['issuer_url'] }}" target="_blank" rel="noopener noreferrer" class="hover:underline">{{ $certificate['issuer'] }}</a>
                                        @else
                                            {{ $certificate['issuer'] }}
                                        @endif
                                    </p>

                                    <p class="mt-3 flex-1 text-xs leading-relaxed text-slate-400">{{ $certificate['description'] }}</p>

                                    @if (! empty($certificate['skills']))
                                        <div class="mt-4">
                                            <p class="text-[0.65rem] font-semibold uppercase tracking-[0.14em] text-slate-500">Skills</p>
                                            <div class="mt-2 flex flex-wrap gap-1.5">
                                                @foreach ($certificate['skills'] as $skill)
                                                    <span class="rounded-md border border-mint-300/15 bg-mint-300/[0.05] px-2 py-0.5 text-[0.65rem] text-mint-200/90">{{ $skill }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    @if (! empty($certificate['tags']))
                                        <div class="mt-3 flex flex-wrap gap-1.5">
                                            @foreach ($certificate['tags'] as $tag)
                                                <span class="rounded border border-white/10 px-1.5 py-0.5 text-[0.62rem] text-slate-400">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if (! empty($certificate['credential_id']) || ! empty($certificate['verify_url']))
                                        <p class="mt-3 break-all text-[0.65rem] text-slate-600">
                                            @if (! empty($certificate['credential_id']))
                                                <span>Credential ID: {{ $certificate['credential_id'] }}</span>
                                            @endif
                                            @if (! empty($certificate['verify_url']))
                                                <a href="{{ $certificate['verify_url'] }}" target="_blank" rel="noopener noreferrer" class="ml-2 font-medium text-mint-200 hover:underline">Verify</a>
                                            @endif
                                        </p>
                                    @endif

                                    <div class="mt-5 flex items-center gap-3 border-t border-white/5 pt-4 text-xs font-medium">
                                        <a href="{{ asset($certificate['image']) }}" target="_blank" rel="noopener noreferrer"
                                           class="inline-flex items-center gap-1.5 text-slate-300 transition hover:text-mint-200">
                                            <x-icon name="arrow-up-right" class="h-3.5 w-3.5" /> View
                                        </a>
                                        <a href="{{ asset($certificate['image']) }}" download
                                           class="inline-flex items-center gap-1.5 text-slate-300 transition hover:text-mint-200">
                                            <x-icon name="download" class="h-3.5 w-3.5" /> Download
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <p class="mt-5 hidden text-center text-xs text-slate-500" data-cert-empty>No certificates match this filter.</p>
                @else
                    <div class="relative overflow-hidden rounded-2xl border border-dashed border-white/12 bg-ink-900/40 px-6 py-12 text-center sm:py-14">
                        <div class="pointer-events-none absolute left-1/2 top-0 h-40 w-40 -translate-x-1/2 -translate-y-1/2 rounded-full bg-mint-300/10 blur-3xl" aria-hidden="true"></div>
                        <span class="relative mx-auto grid h-14 w-14 place-items-center rounded-2xl border border-white/10 bg-white/[0.04] text-mint-300">
                            <x-icon name="award" class="h-6 w-6" />
                        </span>
                        <h3 class="relative mt-5 font-display text-lg font-semibold text-white">No certificates yet</h3>
                        <p class="relative mx-auto mt-2 max-w-md text-sm leading-relaxed text-slate-400">
                            Trainings and courses I complete will appear here with their certificate images. Add an entry to the <span class="font-medium text-slate-300">certifications</span> list in <span class="font-medium text-slate-300">config/portfolio.php</span> to get started.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
