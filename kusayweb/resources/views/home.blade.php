@extends('layouts.app')

@section('title', 'Kusay Tech — Soluciones tecnológicas')

@section('content')

{{-- =========================
      HERO
========================= --}}
<section class="relative overflow-hidden">
  {{-- Fondo gradiente + decoración --}}
  <div class="absolute inset-0 bg-gradient-to-br from-primary-600 to-accent-500"></div>
  <div class="pointer-events-none absolute -top-20 -left-20 size-[28rem] rounded-full bg-white/10 blur-3xl"></div>
  <div class="pointer-events-none absolute -bottom-24 -right-24 size-[34rem] rounded-full bg-white/10 blur-3xl"></div>

  <x-container class="relative py-20 lg:py-28 text-white">
    <div class="grid items-center gap-12 lg:grid-cols-2">
      <div>
        <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1 text-xs">
          <span class="inline-flex size-1.5 rounded-full bg-accent-400"></span>
          Nuevo: Integraciones con SUNAT & pasarelas de pago
        </div>

        <h1 class="text-4xl font-extrabold leading-tight sm:text-5xl">
          Digitaliza tu empresa con un socio <span class="text-accent-200">experto</span>
        </h1>
        <p class="mt-5 text-lg text-white/90">
          ERP en la nube, desarrollo a medida, marketing de performance y equipamiento
          tecnológico. Todo desde un solo partner.
        </p>

        <div class="mt-8 flex flex-wrap gap-3">
          <a href="https://wa.me/51XXXXXXXXX" target="_blank" rel="noopener"
             class="inline-flex items-center gap-2 rounded-md bg-white px-5 py-3 text-sm font-semibold text-slate-900 shadow-sm hover:bg-slate-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/60">
            <svg class="size-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.52 3.48A11.94 11.94 0 0 0 12.06 0C5.49.03.16 5.36.19 11.92c0 2.1.58 4.14 1.69 5.93L0 24l6.33-1.82a12 12 0 0 0 5.73 1.48h.05c6.56 0 11.89-5.34 11.9-11.9 0-3.18-1.24-6.16-3.49-8.28ZM12.02 22a9.94 9.94 0 0 1-5.06-1.39l-.36-.21-3.76 1.08 1.07-3.66-.24-.38A9.94 9.94 0 0 1 2.1 12 9.94 9.94 0 1 1 12.02 22Zm5.74-7.42c-.31-.16-1.84-.9-2.12-1-.28-.1-.48-.16-.68.16-.2.31-.78 1-.95 1.2-.18.2-.35.23-.66.08-1.8-.9-2.98-1.6-4.16-3.63-.32-.55.32-.51.92-1.7.1-.2.05-.37-.02-.52-.06-.16-.68-1.64-.93-2.24-.24-.58-.49-.5-.68-.5h-.58c-.2 0-.52.08-.79.37-.27.28-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.16.2 2.1 3.2 5.1 4.49.71.31 1.26.5 1.69.64.71.22 1.36.19 1.87.11.57-.08 1.84-.75 2.1-1.48.26-.73.26-1.36.18-1.49-.07-.11-.27-.18-.58-.34Z"/></svg>
            Hablar por WhatsApp
          </a>

          <a href="#servicios"
             class="inline-flex items-center gap-2 rounded-md border border-white/30 bg-white/10 px-5 py-3 text-sm font-semibold text-white hover:bg-white/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/60">
            Ver servicios
          </a>
        </div>

        <div class="mt-8 flex flex-wrap items-center gap-6 text-sm text-white/80">
          <div class="flex items-center gap-2">
            <svg class="size-5" viewBox="0 0 24 24" fill="currentColor"><path d="M9 12l2 2 4-4 1.5 1.5L11 17l-4.5-4.5L9 12z"/></svg>
            Implementaciones en <strong>semanas</strong>, no meses
          </div>
          <div class="flex items-center gap-2">
            <svg class="size-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm1 10.59V7h-2v7h5v-2h-3Z"/></svg>
            Soporte <strong>prioritario</strong>
          </div>
        </div>
      </div>

      <div class="lg:justify-self-end">
        <img src="{{ asset('images/hero.png') }}" alt="Kusay Tech"
             class="mx-auto w-full max-w-lg drop-shadow-2xl">
      </div>
    </div>
  </x-container>
</section>

{{-- =========================
      KPIs
========================= --}}
<x-container class="py-10">
  <div class="grid gap-4 rounded-2xl border bg-white p-6 shadow-sm sm:grid-cols-2 lg:grid-cols-4">
    <div><p class="text-xs text-slate-500">Empresas atendidas</p><p class="mt-1 text-2xl font-semibold text-slate-900">+120</p></div>
    <div><p class="text-xs text-slate-500">Proyectos entregados</p><p class="mt-1 text-2xl font-semibold text-slate-900">+240</p></div>
    <div><p class="text-xs text-slate-500">Tiempo de implementación</p><p class="mt-1 text-2xl font-semibold text-slate-900">3-6 semanas</p></div>
    <div><p class="text-xs text-slate-500">Satisfacción (NPS)</p><p class="mt-1 text-2xl font-semibold text-slate-900">92/100</p></div>
  </div>
</x-container>

{{-- =========================
      SERVICIOS
========================= --}}
<section id="servicios" class="py-16">
  <x-container>
    <x-section-title subtitle="Soluciones escalables, seguras y de alto impacto." align="center">
      Servicios
    </x-section-title>

    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      {{-- ERP en la nube --}}
      <div class="rounded-xl border bg-white p-6 shadow-sm transition hover:shadow-md">
        <div class="flex size-10 items-center justify-center rounded-md bg-primary-50 text-primary-700">
          <svg class="size-5" viewBox="0 0 24 24" fill="currentColor"><path d="M4 6h16v12H4zM2 4h20v2H2zm0 14h20v2H2z"/></svg>
        </div>
        <h3 class="mt-4 text-lg font-semibold text-slate-900">ERP en la nube</h3>
        <p class="mt-2 text-sm text-slate-600">Inventarios, ventas, compras, finanzas y RR.HH. con auditoría y roles.</p>
        <ul class="mt-4 space-y-1 text-sm text-slate-700">
          <li>• Onboarding en semanas</li>
          <li>• Integración SUNAT</li>
          <li>• Reportes en tiempo real</li>
        </ul>
        <a href="{{ route('solutions.erp') }}" class="mt-4 inline-block text-sm font-semibold text-primary-700 hover:text-primary-800">Ver más →</a>
      </div>

      {{-- Desarrollo de software --}}
      <div class="rounded-xl border bg-white p-6 shadow-sm transition hover:shadow-md">
        <div class="flex size-10 items-center justify-center rounded-md bg-primary-50 text-primary-700">
          <svg class="size-5" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5l-5 7 5 7M16 5l5 7-5 7M10 19h4"/></svg>
        </div>
        <h3 class="mt-4 text-lg font-semibold text-slate-900">Software a medida</h3>
        <p class="mt-2 text-sm text-slate-600">APIs, microservicios, portales y automatizaciones.</p>
        <ul class="mt-4 space-y-1 text-sm text-slate-700">
          <li>• Escalable y seguro</li>
          <li>• Integraciones (REST/GraphQL)</li>
          <li>• QA & CI/CD</li>
        </ul>
        <a href="{{ route('solutions.software') }}" class="mt-4 inline-block text-sm font-semibold text-primary-700 hover:text-primary-800">Ver más →</a>
      </div>

      {{-- Marketing digital --}}
      <div class="rounded-xl border bg-white p-6 shadow-sm transition hover:shadow-md">
        <div class="flex size-10 items-center justify-center rounded-md bg-primary-50 text-primary-700">
          <svg class="size-5" viewBox="0 0 24 24" fill="currentColor"><path d="M3 4h4l6 6v10l-6-6H3zM17 7h4v10h-4z"/></svg>
        </div>
        <h3 class="mt-4 text-lg font-semibold text-slate-900">Marketing de performance</h3>
        <p class="mt-2 text-sm text-slate-600">SEO/SEM, social ads y analítica para crecer con ROI.</p>
        <ul class="mt-4 space-y-1 text-sm text-slate-700">
          <li>• Dashboards de resultados</li>
          <li>• Experimentos A/B</li>
          <li>• Automatización de leads</li>
        </ul>
        <a href="{{ route('solutions.marketing') }}" class="mt-4 inline-block text-sm font-semibold text-primary-700 hover:text-primary-800">Ver más →</a>
      </div>

      {{-- Equipos tecnológicos --}}
      <div class="rounded-xl border bg-white p-6 shadow-sm transition hover:shadow-md">
        <div class="flex size-10 items-center justify-center rounded-md bg-primary-50 text-primary-700">
          <svg class="size-5" viewBox="0 0 24 24" fill="currentColor"><path d="M4 6h16v10H4zM2 18h20v2H2z"/></svg>
        </div>
        <h3 class="mt-4 text-lg font-semibold text-slate-900">Equipos tecnológicos</h3>
        <p class="mt-2 text-sm text-slate-600">Suministro y soporte de hardware y periféricos.</p>
        <ul class="mt-4 space-y-1 text-sm text-slate-700">
          <li>• Marcas oficiales</li>
          <li>• Garantía y RMA</li>
          <li>• Opciones a medida</li>
        </ul>
        <a href="{{ route('store.index') }}" class="mt-4 inline-block text-sm font-semibold text-primary-700 hover:text-primary-800">Ir a tienda →</a>
      </div>
    </div>
  </x-container>
</section>

{{-- =========================
      PROCESO
========================= --}}
<section class="bg-slate-50 py-16">
  <x-container>
    <x-section-title subtitle="Un marco simple que reduce riesgo y tiempo de salida a producción." align="center">
      ¿Cómo trabajamos?
    </x-section-title>

    <ol class="mx-auto mt-10 max-w-4xl space-y-6">
      <li class="rounded-xl border bg-white p-5 shadow-sm">
        <div class="flex items-start gap-4">
          <span class="flex size-8 items-center justify-center rounded-full bg-primary-600 text-white">1</span>
          <div>
            <h4 class="font-semibold text-slate-900">Descubrimiento & roadmap</h4>
            <p class="text-sm text-slate-600">Entendemos objetivos, priorizamos quick wins y definimos un plan realista.</p>
          </div>
        </div>
      </li>
      <li class="rounded-xl border bg-white p-5 shadow-sm">
        <div class="flex items-start gap-4">
          <span class="flex size-8 items-center justify-center rounded-full bg-primary-600 text-white">2</span>
          <div>
            <h4 class="font-semibold text-slate-900">Implementación ágil</h4>
            <p class="text-sm text-slate-600">Sprints cortos con entregables visibles y feedback continuo.</p>
          </div>
        </div>
      </li>
      <li class="rounded-xl border bg-white p-5 shadow-sm">
        <div class="flex items-start gap-4">
          <span class="flex size-8 items-center justify-center rounded-full bg-primary-600 text-white">3</span>
          <div>
            <h4 class="font-semibold text-slate-900">Integración & capacitación</h4>
            <p class="text-sm text-slate-600">Integraciones (SUNAT, pagos, BI) y entrenamiento del equipo.</p>
          </div>
        </div>
      </li>
      <li class="rounded-xl border bg-white p-5 shadow-sm">
        <div class="flex items-start gap-4">
          <span class="flex size-8 items-center justify-center rounded-full bg-primary-600 text-white">4</span>
          <div>
            <h4 class="font-semibold text-slate-900">Soporte & evolución</h4>
            <p class="text-sm text-slate-600">Monitoreo, soporte proactivo y mejoras continuas orientadas a KPIs.</p>
          </div>
        </div>
      </li>
    </ol>
  </x-container>
</section>

{{-- =========================
      LOGOS
========================= --}}
<section id="clientes" class="py-16">
  <x-container>
    <x-section-title subtitle="Empresas que ya confían en nuestro trabajo." align="center">
      Clientes
    </x-section-title>

    <div class="mt-10 grid grid-cols-2 gap-6 opacity-80 sm:grid-cols-3 lg:grid-cols-6">
      <img src="{{ asset('images/clientes/cliente1.svg') }}" alt="Cliente 1" class="mx-auto h-8 sm:h-10">
      <img src="{{ asset('images/clientes/cliente2.svg') }}" alt="Cliente 2" class="mx-auto h-8 sm:h-10">
      <img src="{{ asset('images/clientes/cliente3.svg') }}" alt="Cliente 3" class="mx-auto h-8 sm:h-10">
      <img src="{{ asset('images/clientes/cliente4.svg') }}" alt="Cliente 4" class="mx-auto h-8 sm:h-10">
      <img src="{{ asset('images/clientes/cliente5.svg') }}" alt="Cliente 5" class="mx-auto h-8 sm:h-10">
      <img src="{{ asset('images/clientes/cliente6.svg') }}" alt="Cliente 6" class="mx-auto h-8 sm:h-10">
    </div>
  </x-container>
</section>

{{-- =========================
      TESTIMONIOS
========================= --}}
<section class="bg-white py-16">
  <x-container>
    <x-section-title subtitle="Resultados reales, problemas resueltos." align="center">
      Testimonios
    </x-section-title>

    <div class="mx-auto mt-10 grid max-w-5xl gap-6 lg:grid-cols-3">
      @foreach ([
        ['txt' => 'Migramos a ERP en 5 semanas y bajamos 32% el tiempo de cierre contable.', 'name' => 'Ana G.', 'role' => 'CFO, Retail'],
        ['txt' => 'Su equipo de dev integró pasarela + facturación sin fricción.', 'name' => 'Marco P.', 'role' => 'CTO, Servicios'],
        ['txt' => 'Marketing con foco en performance: +64% leads calificados.', 'name' => 'Valeria R.', 'role' => 'CMO, Educación'],
      ] as $t)
        <figure class="rounded-xl border bg-white p-6 shadow-sm">
          <blockquote class="text-slate-700">“{{ $t['txt'] }}”</blockquote>
          <figcaption class="mt-4 text-sm text-slate-500">{{ $t['name'] }} · {{ $t['role'] }}</figcaption>
        </figure>
      @endforeach
    </div>
  </x-container>
</section>

{{-- =========================
      FAQ
========================= --}}
<section class="bg-slate-50 py-16">
  <x-container>
    <x-section-title subtitle="Si tienes otra consulta, escríbenos y te respondemos hoy." align="center">
      Preguntas frecuentes
    </x-section-title>

    <div class="mx-auto mt-10 grid max-w-4xl gap-4">
      <x-faq-item q="¿Cuánto demora una implementación ERP?">
        Entre 3 y 6 semanas según módulos y migración de datos.
      </x-faq-item>
      <x-faq-item q="¿Pueden integrarse con mis sistemas actuales?">
        Sí, trabajamos con APIs REST/GraphQL y conectores a medida (incluye SUNAT, pagos y BI).
      </x-faq-item>
      <x-faq-item q="¿Ofrecen soporte y capacitación?">
        Claro. Incluye onboarding, documentación y soporte con SLA.
      </x-faq-item>
      <x-faq-item q="¿Cómo cotizo un proyecto a medida?">
        Escríbenos con tu caso y en 24h te enviamos alcance y roadmap sugerido.
      </x-faq-item>
    </div>
  </x-container>
</section>

{{-- =========================
      CTA FINAL
========================= --}}
<section class="py-16">
  <x-container>
    <div class="rounded-2xl border bg-gradient-to-br from-primary-50 to-accent-400/10 p-8 text-center lg:p-12">
      <h3 class="text-2xl font-bold text-slate-900">¿Listo para acelerar tu transformación digital?</h3>
      <p class="mt-2 text-slate-600">Agenda una demo y te ayudamos a elegir la solución ideal.</p>
      <div class="mt-6 flex justify-center gap-3">
        <a href="mailto:ventas@kusaytech.com"
           class="inline-flex items-center gap-2 rounded-md bg-primary-600 px-6 py-3 text-sm font-semibold text-white hover:bg-primary-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500">
          Agendar demo
        </a>
        <a href="{{ route('form.contact') }}"
           class="inline-flex items-center gap-2 rounded-md border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-900 hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500">
          Contáctanos
        </a>
      </div>
    </div>
  </x-container>
</section>

@endsection
