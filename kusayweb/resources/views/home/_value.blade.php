<x-section-title subtitle="Beneficios tangibles desde el primer mes.">
  Nuestra propuesta de valor
</x-section-title>

<div class="mt-8 grid gap-6 sm:grid-cols-2 md:grid-cols-4">
  @forelse($valueProps as $v)
    <article class="rounded-xl border bg-white p-5 shadow-sm">
      <span class="inline-flex items-center rounded-md bg-primary-50 px-2 py-1 text-xs font-medium text-primary-700">
        {{ $v->badge ?? 'Valor' }}
      </span>
      <h3 class="mt-3 text-lg font-semibold text-slate-900">{{ $v->title }}</h3>
      <p class="mt-2 text-sm leading-6 text-slate-700">{{ $v->description }}</p>
    </article>
  @empty
    <p class="text-sm text-slate-500">Estamos preparando nuestra propuesta de valor.</p>
  @endforelse
</div>
