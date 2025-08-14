@props([
    'id' => null,
    'slug' => null,
    'name' => '',
    'brand' => null,
    'image' => null,         // URL absoluta o relativa
    'price' => 0,
    'compare' => null,       // precio anterior para descuento
    'badge' => null,         // texto de insignia, ej: "Nuevo" / "Oferta"
    'active' => true,
])

@php
    $url = $slug
        ? route('store.show', ['idOrSlug' => $slug])
        : route('store.show', ['idOrSlug' => $id]);

    $hasDiscount = is_numeric($compare) && $compare > $price;
    $discountPct = $hasDiscount ? max(0, round( (1 - ($price / $compare)) * 100 )) : null;

    $fmt = fn($n) => number_format((float)$n, 2);
@endphp

<article {{ $attributes->class('group rounded-xl border bg-white p-3 shadow-sm transition hover:shadow-md') }}>
    <a href="{{ $url }}" class="block">
        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-lg bg-slate-100">
            @if($image)
                <img src="{{ $image }}" alt="{{ $name }}"
                     loading="lazy"
                     class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.03]" />
            @else
                <div class="flex h-full w-full items-center justify-center text-slate-400">
                    <svg class="size-10" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M3 7l5-3 5 3 5-3 3 2v11l-3 2-5-3-5 3-5-3V6z"/>
                    </svg>
                </div>
            @endif

            @if($badge || $discountPct)
                <div class="pointer-events-none absolute left-2 top-2 flex gap-2">
                    @if($badge)
                        <span class="rounded bg-slate-900/90 px-2 py-0.5 text-xs font-medium text-white">{{ $badge }}</span>
                    @endif
                    @if($discountPct)
                        <span class="rounded bg-rose-600 px-2 py-0.5 text-xs font-semibold text-white">-{{ $discountPct }}%</span>
                    @endif
                </div>
            @endif
        </div>

        <div class="mt-3 space-y-1">
            @if($brand)
                <p class="text-xs uppercase tracking-wide text-slate-500">{{ $brand }}</p>
            @endif

            <h3 class="line-clamp-2 text-sm font-medium text-slate-900">
                {{ $name }}
            </h3>

            <div class="mt-1 flex items-center gap-2">
                <span class="text-base font-semibold text-slate-900">S/ {{ $fmt($price) }}</span>
                @if($hasDiscount)
                    <span class="text-sm text-slate-400 line-through">S/ {{ $fmt($compare) }}</span>
                @endif
            </div>
        </div>
    </a>

    {{ $slot }}
</article>
