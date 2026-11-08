@props(['project'])

<article class="group overflow-hidden rounded-2xl border border-white/10 bg-ink-900/60 transition duration-300 hover:-translate-y-1 hover:border-mint-300/30">
    <div class="relative flex h-32 items-center justify-center overflow-hidden border-b border-white/5 bg-gradient-to-br from-mint-300/10 via-ink-900 to-sky-400/10">
        <div class="absolute inset-0 bg-grid opacity-60" aria-hidden="true"></div>
        <span class="relative grid h-12 w-12 place-items-center rounded-2xl border border-white/10 bg-ink-950/70 text-mint-300 shadow-lg shadow-black/30">
            <x-icon name="folder" class="h-5 w-5" />
        </span>
        @if (! empty($project['featured']))
            <span class="absolute right-3 top-3 rounded-full border border-mint-300/20 bg-ink-950/80 px-2.5 py-0.5 text-[0.6rem] font-semibold uppercase tracking-wide text-mint-200">
                Featured
            </span>
        @endif
    </div>

    <div class="p-5">
        <div class="flex items-start justify-between gap-3">
            <h4 class="font-display text-base font-semibold text-white">{{ $project['title'] }}</h4>
            @if (! empty($project['status']))
                <span class="shrink-0 rounded-full border border-white/10 bg-white/[0.03] px-2.5 py-0.5 text-[0.6rem] font-semibold uppercase tracking-wide text-slate-400">
                    {{ $project['status'] }}
                </span>
            @endif
        </div>

        <p class="mt-2 text-sm leading-relaxed text-slate-400">{{ $project['description'] }}</p>

        @if (! empty($project['stack']))
            <div class="mt-4 flex flex-wrap gap-1.5">
                @foreach ($project['stack'] as $tech)
                    <span class="rounded-md border border-white/8 bg-white/[0.03] px-2 py-0.5 text-[0.65rem] text-slate-400">{{ $tech }}</span>
                @endforeach
            </div>
        @endif

        <div class="mt-5 flex items-center gap-4 border-t border-white/5 pt-4 text-xs font-medium">
            @if (! empty($project['repo']))
                <a href="{{ $project['repo'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-slate-300 transition hover:text-mint-200">
                    <x-icon name="github" class="h-3.5 w-3.5" /> Source
                </a>
            @endif
            @if (! empty($project['demo']))
                <a href="{{ $project['demo'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-slate-300 transition hover:text-mint-200">
                    <x-icon name="external" class="h-3.5 w-3.5" /> Live demo
                </a>
            @endif
        </div>
    </div>
</article>
