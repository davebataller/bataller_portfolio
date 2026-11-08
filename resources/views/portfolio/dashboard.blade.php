@extends('layouts.app')

@section('title', 'Project Dashboard — ' . config('portfolio.name'))
@section('description', 'A snapshot of the portfolio project workspace for ' . config('portfolio.name') . '.')

@php
    $projects = config('portfolio.projects');
    $totalProjects = count($projects);
    $completed = collect($projects)->where('status', 'Completed')->count();
    $inProgress = collect($projects)->where('status', '!=', 'Completed')->count();
    $certifications = config('portfolio.certifications');

    $checklist = [
        ['label' => 'Laravel project setup', 'done' => true],
        ['label' => 'Blade layout and design system', 'done' => true],
        ['label' => 'Portfolio content and sections', 'done' => true],
        ['label' => 'GitHub repository links', 'done' => true],
        ['label' => 'Add first project', 'done' => false],
        ['label' => 'Deploy the portfolio online', 'done' => false],
    ];
    $doneCount = collect($checklist)->where('done', true)->count();
    $progress = (int) round(($doneCount / count($checklist)) * 100);

    $summary = [
        ['label' => 'Projects published', 'value' => $totalProjects, 'icon' => 'folder', 'tone' => 'mint'],
        ['label' => 'Completed', 'value' => $completed, 'icon' => 'check', 'tone' => 'sky'],
        ['label' => 'In progress', 'value' => $inProgress, 'icon' => 'clock', 'tone' => 'amber'],
        ['label' => 'Education milestones', 'value' => count(config('portfolio.education')), 'icon' => 'graduation-cap', 'tone' => 'violet'],
    ];
@endphp

@section('content')
    <div class="relative pb-10 pt-32 sm:pt-36">
        <div class="container-page">
            <div data-reveal class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <nav class="flex items-center gap-2 text-[0.7rem] font-medium uppercase tracking-[0.16em] text-slate-500" aria-label="Breadcrumb">
                        <a href="{{ route('home') }}" class="transition hover:text-mint-200">Portfolio</a>
                        <span class="text-slate-700">/</span>
                        <span class="text-slate-300">Dashboard</span>
                    </nav>
                    <h1 class="mt-4 font-display text-3xl font-semibold tracking-[-0.03em] text-white sm:text-4xl">Project dashboard</h1>
                    <p class="mt-3 max-w-2xl text-sm leading-relaxed text-slate-400">
                        A quick snapshot of what is in the portfolio, what is still being built, and where everything lives.
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('home') }}#projects" class="btn-ghost">
                        <x-icon name="arrow-right" class="h-4 w-4 rotate-180" />
                        Back to portfolio
                    </a>
                    <a href="{{ config('portfolio.github.repository') }}" target="_blank" rel="noopener noreferrer" class="btn-primary">
                        <x-icon name="github" class="h-4 w-4" />
                        Repository
                    </a>
                </div>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
                @php
                    $tones = [
                        'mint' => 'border-mint-300/20 bg-mint-300/[0.06] text-mint-200',
                        'sky' => 'border-sky-400/20 bg-sky-400/[0.06] text-sky-300',
                        'amber' => 'border-amber-400/20 bg-amber-400/[0.06] text-amber-300',
                        'violet' => 'border-violet-400/20 bg-violet-400/[0.06] text-violet-300',
                    ];
                @endphp

                @foreach ($summary as $card)
                    <div data-reveal style="--reveal-delay: {{ $loop->index * 60 }}ms" class="glass-panel card-hover rounded-2xl p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-[0.65rem] font-semibold uppercase tracking-[0.16em] text-slate-500">{{ $card['label'] }}</p>
                            <span class="grid h-8 w-8 place-items-center rounded-lg border {{ $tones[$card['tone']] }}">
                                <x-icon :name="$card['icon']" class="h-4 w-4" />
                            </span>
                        </div>
                        <p class="mt-3 font-display text-3xl font-semibold text-white">{{ $card['value'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-[1.6fr_1fr]">
                <div data-reveal class="overflow-hidden rounded-3xl border border-white/10 bg-white/[0.025]">
                    <div class="flex flex-col gap-3 border-b border-white/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                        <div class="flex items-center gap-3">
                            <span class="icon-box !h-9 !w-9 !rounded-xl"><x-icon name="folder" class="h-4 w-4" /></span>
                            <div>
                                <h2 class="font-display text-sm font-semibold text-white">Projects</h2>
                                <p class="text-[0.7rem] text-slate-500">{{ $totalProjects }} project{{ $totalProjects === 1 ? '' : 's' }} in the workspace</p>
                            </div>
                        </div>
                        <span class="inline-flex w-fit items-center gap-1.5 rounded-full border border-amber-400/20 bg-amber-400/[0.07] px-3 py-1 text-[0.65rem] font-semibold uppercase tracking-wide text-amber-300">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-300"></span>
                            In progress
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[36rem] text-left text-sm">
                            <thead>
                                <tr class="border-b border-white/5 text-[0.65rem] uppercase tracking-[0.14em] text-slate-500">
                                    <th scope="col" class="px-6 py-3 font-semibold">Project</th>
                                    <th scope="col" class="px-4 py-3 font-semibold">Stack</th>
                                    <th scope="col" class="px-4 py-3 font-semibold">Status</th>
                                    <th scope="col" class="px-6 py-3 text-right font-semibold">Links</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr class="border-b border-white/5 transition hover:bg-white/[0.02]">
                                        <td class="px-6 py-4">
                                            <p class="font-medium text-white">{{ $project['title'] }}</p>
                                            <p class="mt-0.5 max-w-xs truncate text-xs text-slate-500">{{ $project['description'] }}</p>
                                        </td>
                                        <td class="px-4 py-4">
                                            <div class="flex flex-wrap gap-1.5">
                                                @foreach ($project['stack'] ?? [] as $tech)
                                                    <span class="rounded border border-white/10 px-1.5 py-0.5 text-[0.62rem] text-slate-400">{{ $tech }}</span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-xs text-slate-400">{{ $project['status'] ?? 'Draft' }}</td>
                                        <td class="px-6 py-4 text-right">
                                            @if (! empty($project['repo']))
                                                <a href="{{ $project['repo'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1 text-xs font-medium text-mint-200 hover:underline">
                                                    Source <x-icon name="arrow-up-right" class="h-3 w-3" />
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-12">
                                            <div class="mx-auto max-w-sm text-center">
                                                <span class="mx-auto grid h-12 w-12 place-items-center rounded-2xl border border-white/10 bg-white/[0.03] text-mint-300">
                                                    <x-icon name="folder" class="h-5 w-5" />
                                                </span>
                                                <p class="mt-4 font-display text-sm font-semibold text-white">No projects listed yet</p>
                                                <p class="mt-1.5 text-xs leading-relaxed text-slate-500">
                                                    The workspace is ready. Projects will appear here once they are published to the repository.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col gap-3 border-t border-white/5 px-6 py-4 text-xs text-slate-500 sm:flex-row sm:items-center sm:justify-between">
                        <span>Showing {{ $totalProjects }} of {{ $totalProjects }} project{{ $totalProjects === 1 ? '' : 's' }}</span>
                        <span class="inline-flex items-center gap-1.5">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-300"></span>
                            Project data is managed in one config file
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 content-start gap-6">
                    <div data-reveal style="--reveal-delay: 80ms" class="rounded-3xl border border-white/10 bg-white/[0.025] p-6">
                        <div class="flex items-center justify-between">
                            <h2 class="font-display text-sm font-semibold text-white">Portfolio readiness</h2>
                            <span class="text-sm font-semibold text-mint-200">{{ $progress }}%</span>
                        </div>
                        <div class="mt-3 h-1.5 overflow-hidden rounded-full bg-white/5">
                            <div class="h-full rounded-full bg-gradient-to-r from-mint-300 to-sky-400" style="width: {{ $progress }}%"></div>
                        </div>
                        <ul class="mt-5 space-y-3">
                            @foreach ($checklist as $item)
                                <li class="flex items-start gap-2.5 text-xs">
                                    <span @class([
                                        'mt-0.5 grid h-4 w-4 shrink-0 place-items-center rounded-full border',
                                        'border-mint-300/30 bg-mint-300/10 text-mint-200' => $item['done'],
                                        'border-white/10 bg-white/[0.03] text-slate-600' => ! $item['done'],
                                    ])>
                                        @if ($item['done'])
                                            <x-icon name="check" class="h-2.5 w-2.5" />
                                        @else
                                            <span class="h-1 w-1 rounded-full bg-slate-600"></span>
                                        @endif
                                    </span>
                                    <span @class(['text-slate-300' => $item['done'], 'text-slate-500' => ! $item['done']])>{{ $item['label'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div data-reveal style="--reveal-delay: 140ms" class="rounded-3xl border border-white/10 bg-white/[0.025] p-6">
                        <div class="flex items-center gap-3">
                            <span class="icon-box !h-9 !w-9 !rounded-xl"><x-icon name="graduation-cap" class="h-4 w-4" /></span>
                            <h2 class="font-display text-sm font-semibold text-white">Education</h2>
                        </div>
                        <ul class="mt-5 space-y-4">
                            @foreach (config('portfolio.education') as $entry)
                                <li class="flex gap-3">
                                    <span @class([
                                        'mt-1 h-2 w-2 shrink-0 rounded-full',
                                        'bg-mint-300' => $entry['current'],
                                        'bg-slate-600' => ! $entry['current'],
                                    ])></span>
                                    <div class="min-w-0">
                                        <p class="truncate text-xs font-medium text-slate-200">{{ $entry['school'] }}</p>
                                        <p class="mt-0.5 text-[0.68rem] text-slate-500">{{ $entry['level'] }} &middot; {{ $entry['year'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div data-reveal style="--reveal-delay: 170ms" class="rounded-3xl border border-white/10 bg-white/[0.025] p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span class="icon-box !h-9 !w-9 !rounded-xl"><x-icon name="award" class="h-4 w-4" /></span>
                                <h2 class="font-display text-sm font-semibold text-white">Certifications</h2>
                            </div>
                            <span class="text-xs font-semibold text-mint-200">{{ count($certifications) }}</span>
                        </div>
                        <ul class="mt-5 space-y-4">
                            @foreach ($certifications as $certificate)
                                <li class="flex gap-3">
                                    <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-mint-300"></span>
                                    <div class="min-w-0">
                                        <p class="text-xs font-medium leading-snug text-slate-200">{{ $certificate['title'] }}</p>
                                        <p class="mt-0.5 text-[0.68rem] text-slate-500">{{ $certificate['issuer_short'] }} &middot; {{ $certificate['date'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('home') }}#certifications" class="mt-5 inline-flex items-center gap-1.5 text-xs font-medium text-mint-200 hover:underline">
                            View certificate dashboard
                            <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                        </a>
                    </div>

                    <div data-reveal style="--reveal-delay: 200ms" class="rounded-3xl border border-white/10 bg-white/[0.025] p-6">
                        <div class="flex items-center gap-3">
                            <span class="icon-box !h-9 !w-9 !rounded-xl"><x-icon name="link" class="h-4 w-4" /></span>
                            <h2 class="font-display text-sm font-semibold text-white">Quick links</h2>
                        </div>
                        <div class="mt-4 space-y-2">
                            <a href="{{ config('portfolio.github.repository') }}" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between rounded-xl border border-white/5 bg-white/[0.02] px-3.5 py-2.5 text-xs text-slate-300 transition hover:border-mint-300/25 hover:text-mint-200">
                                Source repository
                                <x-icon name="arrow-up-right" class="h-3.5 w-3.5 text-slate-600 transition group-hover:text-mint-200" />
                            </a>
                            <a href="{{ config('portfolio.github.repository') }}/blob/main/PROMPT_LOG.md" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between rounded-xl border border-white/5 bg-white/[0.02] px-3.5 py-2.5 text-xs text-slate-300 transition hover:border-mint-300/25 hover:text-mint-200">
                                AI prompt log
                                <x-icon name="arrow-up-right" class="h-3.5 w-3.5 text-slate-600 transition group-hover:text-mint-200" />
                            </a>
                            <a href="{{ route('home') }}#certifications" class="group flex items-center justify-between rounded-xl border border-white/5 bg-white/[0.02] px-3.5 py-2.5 text-xs text-slate-300 transition hover:border-mint-300/25 hover:text-mint-200">
                                Certifications
                                <x-icon name="arrow-up-right" class="h-3.5 w-3.5 text-slate-600 transition group-hover:text-mint-200" />
                            </a>
                            <a href="{{ route('home') }}#contact" class="group flex items-center justify-between rounded-xl border border-white/5 bg-white/[0.02] px-3.5 py-2.5 text-xs text-slate-300 transition hover:border-mint-300/25 hover:text-mint-200">
                                Contact details
                                <x-icon name="arrow-up-right" class="h-3.5 w-3.5 text-slate-600 transition group-hover:text-mint-200" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
