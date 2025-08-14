<x-section-title subtitle="Soluciones escalables, seguras y con soporte local.">
  Productos y servicios
</x-section-title>

<div class="mt-8 grid gap-6 md:grid-cols-4">
  @php
    $items = [
      ['route' => route('solutions.erp'), 'title' => 'ERP en la nube', 'desc' => 'Ventas, compras, inventarios, finanzas, RR.HH.', 'icon' => 'M4 6h16v12H4zM2 4h20v2H2zm0 14h20v2H2z'],
      ['route' => route('solutions.software'), 'title' => 'Software a medida', 'desc' => 'APIs, portales, microservicios, automatización.', 'icon' => 'M8 5l-5 7 5 7M16 5l5 7-5 7M10 19h4'],
      ['route' => route('store.index'), 'title' => 'Equipos tecnológicos', 'desc' => 'Suministro, soporte y garantía oficial.', 'icon' => 'M4 6h16v10H4zM2 18h20v2H2z'],
      ['route' => route('solutions.marketing'), 'title' => 'Marketing de performance', 'desc' => 'SEO/SEM, social ads, analítica, CRO.', 'icon' => 'M3 4h4l6 6v10l-6-6H3zM17 7h4v10h-4z'],
    ];
  @endphp

  @foreach($items as $it)
    <a href="{{ $it['route'] }}" class="group rounded-xl border bg-white p-5 shadow-sm transition hover:shadow-md">
      <div class="flex size-10 items-center justify-center rounded-md bg-primary-50 text-primary-700">
        <svg class="size-5" viewBox="0 0 24 24" fill="currentColor"><path d="{{ $it['icon'] }}"/></svg>
      </div>
      <h3 class="mt-4 font-semibold text-slate-900">{{ $it['title'] }}</h3>
      <p class="mt-1 text-sm text-slate-700">{{ $it['desc'] }}</p>
      <span class="mt-3 inline-block text-sm font-semibold text-primary-700 group-hover:text-primary-800">Ver más →</span>
    </a>
  @endforeach
</div>
