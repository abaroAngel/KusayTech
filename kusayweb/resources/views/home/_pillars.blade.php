<x-section-title subtitle="Marco simple que reduce riesgo y acelera resultados.">
  Nuestro enfoque (4 pilares)
</x-section-title>

<div class="mt-8 grid gap-6 sm:grid-cols-2 md:grid-cols-4">
  @forelse($pillars as $i => $p)
    <div class="relative rounded-xl border bg-white p-5 shadow-sm hover:shadow-md transition">
      <span class="absolute -top-3 left-4 inline-flex size-8 items-center justify-center rounded-full bg-primary-600 text-sm font-semibold text-white">
        {{ $i + 1 }}
      </span>
      <div class="pt-3">
        <h3 class="font-semibold text-slate-900">{{ $p->title }}</h3>
        <p class="mt-2 text-sm leading-6 text-slate-700">{{ $p->description }}</p>
      </div>
    </div>
  @empty
    <p class="text-sm text-slate-500">Pronto publicaremos nuestros pilares.</p>
  @endforelse
</div>
