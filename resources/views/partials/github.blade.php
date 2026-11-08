<section id="github" class="relative scroll-mt-24 py-20 sm:py-24">
    <div class="container-page">
        <x-section-heading
            eyebrow="GitHub"
            title="The code lives here."
            description="Every version of this portfolio and the projects around it is tracked in the open. Take a look around the repository."
        />

        <div class="mt-12 grid grid-cols-1 gap-5 lg:grid-cols-[1.45fr_1fr]">
            <div data-reveal class="relative min-w-0 overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-white/[0.06] via-white/[0.02] to-transparent p-6 sm:p-8">
                <div class="pointer-events-none absolute -right-16 -top-16 h-48 w-48 rounded-full bg-mint-300/10 blur-3xl" aria-hidden="true"></div>

                <div class="relative flex flex-wrap items-start justify-between gap-3">
                    <div class="flex min-w-0 items-center gap-3">
                        <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl border border-white/10 bg-ink-950 text-white">
                            <x-icon name="github" class="h-6 w-6" />
                        </span>
                        <div class="min-w-0">
                            <p class="text-[0.65rem] font-semibold uppercase tracking-[0.18em] text-mint-300/80">Featured repository</p>
                            <p class="mt-0.5 truncate text-xs text-slate-500">github.com/{{ config('portfolio.github.username') }}</p>
                        </div>
                    </div>
                    <span class="inline-flex shrink-0 items-center gap-1.5 rounded-full border border-mint-300/20 bg-mint-300/[0.07] px-3 py-1 text-[0.65rem] font-semibold text-mint-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-mint-300"></span>
                        Public
                    </span>
                </div>

                <h3 class="relative mt-6 break-words font-display text-xl font-semibold text-white sm:text-3xl">bataller_portfolio</h3>
                <p class="relative mt-3 max-w-lg text-sm leading-relaxed text-slate-400">
                    My personal portfolio built with Laravel, Blade, and Tailwind CSS — no database, just clean server-rendered views, a documented build process, and a Git history that shows the work.
                </p>

                <div class="relative mt-5 flex flex-wrap gap-2">
                    @foreach (config('portfolio.repo_stack') as $tech)
                        <span class="chip">{{ $tech }}</span>
                    @endforeach
                </div>

                <div class="relative mt-7 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ config('portfolio.github.repository') }}" target="_blank" rel="noopener noreferrer" class="btn-primary">
                        <x-icon name="github" class="h-4 w-4" />
                        View repository
                    </a>
                    <a href="{{ config('portfolio.github.repository') }}/archive/refs/heads/main.zip" class="btn-ghost">
                        <x-icon name="download" class="h-4 w-4" />
                        Download source
                    </a>
                </div>
            </div>

            <div class="grid min-w-0 grid-cols-1 gap-4">
                <a data-reveal style="--reveal-delay: 60ms" href="{{ config('portfolio.github.profile') }}" target="_blank" rel="noopener noreferrer"
                   class="glass-panel card-hover group flex items-center gap-4 rounded-2xl p-5">
                    <span class="icon-box shrink-0"><x-icon name="github" class="h-5 w-5" /></span>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-white">GitHub profile</p>
                        <p class="truncate text-xs text-slate-500">github.com/{{ config('portfolio.github.username') }}</p>
                    </div>
                    <x-icon name="arrow-up-right" class="h-4 w-4 text-slate-500 transition group-hover:text-mint-200" />
                </a>

                <a data-reveal style="--reveal-delay: 110ms" href="{{ config('portfolio.github.repository') }}/blob/main/PROMPT_LOG.md" target="_blank" rel="noopener noreferrer"
                   class="glass-panel card-hover group flex items-center gap-4 rounded-2xl p-5">
                    <span class="icon-box shrink-0"><x-icon name="book" class="h-5 w-5" /></span>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-white">AI prompt log</p>
                        <p class="truncate text-xs text-slate-500">How this portfolio was built with AI</p>
                    </div>
                    <x-icon name="arrow-up-right" class="h-4 w-4 text-slate-500 transition group-hover:text-mint-200" />
                </a>

                <a data-reveal style="--reveal-delay: 160ms" href="{{ config('portfolio.github.repository') }}" target="_blank" rel="noopener noreferrer"
                   class="glass-panel card-hover group flex items-center gap-4 rounded-2xl p-5">
                    <span class="icon-box shrink-0"><x-icon name="code" class="h-5 w-5" /></span>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold text-white">Source code</p>
                        <p class="truncate text-xs text-slate-500">Laravel + Blade + Tailwind CSS</p>
                    </div>
                    <x-icon name="arrow-up-right" class="h-4 w-4 text-slate-500 transition group-hover:text-mint-200" />
                </a>

                <div data-reveal style="--reveal-delay: 210ms" class="flex items-center gap-3 rounded-2xl border border-dashed border-white/10 px-5 py-4 text-xs text-slate-500">
                    <x-icon name="git-branch" class="h-4 w-4 shrink-0 text-mint-300/70" />
                    Built in public with descriptive commits from start to finish.
                </div>
            </div>
        </div>
    </div>
</section>
