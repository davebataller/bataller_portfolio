@php
    $projects = config('portfolio.projects');
    $totalProjects = count($projects);
    $completed = collect($projects)->where('status', 'Completed')->count();
    $inProgress = collect($projects)->where('status', '!=', 'Completed')->count();
    $featured = collect($projects)->where('featured', true)->count();
    $projectStats = [
        ['label' => 'Total projects', 'value' => $totalProjects, 'icon' => 'folder'],
        ['label' => 'Completed', 'value' => $completed, 'icon' => 'check'],
        ['label' => 'In progress', 'value' => $inProgress, 'icon' => 'clock'],
        ['label' => 'Featured', 'value' => $featured, 'icon' => 'sparkles'],
    ];
@endphp

<section id="projects" class="relative scroll-mt-24 py-20 sm:py-24">
    <div class="container-page">
        <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
            <x-section-heading
                eyebrow="Projects"
                title="A workspace in progress."
                description="A home for the systems, experiments, and class projects I build along the way. The dashboard below keeps track of everything."
            />

            <a data-reveal href="{{ route('dashboard') }}" class="btn-ghost shrink-0 self-start sm:self-auto">
                <x-icon name="dashboard" class="h-4 w-4" />
                Open dashboard
            </a>
        </div>

        <div data-reveal style="--reveal-delay: 80ms" class="mt-12 overflow-hidden rounded-3xl border border-white/10 bg-white/[0.025]">
            <div class="flex flex-col gap-3 border-b border-white/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div class="flex items-center gap-3">
                    <span class="icon-box !h-9 !w-9 !rounded-xl"><x-icon name="dashboard" class="h-4 w-4" /></span>
                    <div>
                        <h3 class="font-display text-sm font-semibold text-white">Project dashboard</h3>
                        <p class="text-[0.7rem] text-slate-500">A live snapshot of my project workspace</p>
                    </div>
                </div>
                <span class="inline-flex w-fit items-center gap-1.5 rounded-full border border-white/10 bg-white/[0.03] px-3 py-1 text-[0.65rem] font-semibold uppercase tracking-wide text-slate-400">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-300"></span>
                    Building soon
                </span>
            </div>

            <div class="grid grid-cols-2 gap-px bg-white/[0.06] sm:grid-cols-4">
                @foreach ($projectStats as $stat)
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
                @if ($totalProjects > 0)
                    <div class="grid gap-4 md:grid-cols-2">
                        @foreach ($projects as $project)
                            <x-project-card :project="$project" />
                        @endforeach
                    </div>
                @else
                    <div class="relative overflow-hidden rounded-2xl border border-dashed border-white/12 bg-ink-900/40 px-6 py-12 text-center sm:py-14">
                        <div class="pointer-events-none absolute left-1/2 top-0 h-40 w-40 -translate-x-1/2 -translate-y-1/2 rounded-full bg-mint-300/10 blur-3xl" aria-hidden="true"></div>
                        <span class="relative mx-auto grid h-14 w-14 place-items-center rounded-2xl border border-white/10 bg-white/[0.04] text-mint-300">
                            <x-icon name="folder" class="h-6 w-6" />
                        </span>
                        <h3 class="relative mt-5 font-display text-lg font-semibold text-white">The first project is on its way</h3>
                        <p class="relative mx-auto mt-2 max-w-md text-sm leading-relaxed text-slate-400">
                            I&rsquo;m currently planning my capstone and a few practice builds. New work will show up here as soon as it&rsquo;s ready.
                        </p>
                        <div class="relative mt-6 flex flex-col items-center justify-center gap-3 sm:flex-row">
                            <a href="{{ config('portfolio.github.profile') }}" target="_blank" rel="noopener noreferrer" class="btn-primary">
                                <x-icon name="github" class="h-4 w-4" />
                                Follow along on GitHub
                            </a>
                            <a href="{{ route('dashboard') }}" class="btn-ghost">
                                View dashboard
                                <x-icon name="arrow-right" class="h-4 w-4" />
                            </a>
                        </div>
                    </div>
                @endif

                <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-[0.7rem] uppercase tracking-[0.16em] text-slate-500">Planned categories</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach (config('portfolio.project_categories') as $category)
                            <span class="chip">{{ $category }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
