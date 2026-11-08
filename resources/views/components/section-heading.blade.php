@props(['eyebrow', 'title', 'description' => null])

<div data-reveal>
    <span class="eyebrow">{{ $eyebrow }}</span>
    <h2 class="section-title mt-4 text-balance">{{ $title }}</h2>
    @if ($description)
        <p class="mt-4 max-w-2xl text-sm leading-relaxed text-slate-400 sm:text-base">{{ $description }}</p>
    @endif
</div>
