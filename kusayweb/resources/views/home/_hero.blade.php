<section class="relative overflow-hidden">
  {{-- Gradiente profundo para asegurar contraste --}}
  <div class="absolute inset-0 bg-gradient-to-br from-primary-800 via-primary-700 to-primary-600"></div>
  {{-- halos suaves --}}
  <div class="pointer-events-none absolute -top-24 -left-24 size-[28rem] rounded-full bg-white/10 blur-3xl"></div>
  <div class="pointer-events-none absolute -bottom-24 -right-24 size-[34rem] rounded-full bg-black/10 blur-3xl"></div>

  <x-container class="relative py-16 lg:py-24 text-white">
    <div class="grid items-center gap-12 lg:grid-cols-2">
      <div>
        <span class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-3 py-1 text-xs">
          <span class="inline-flex size-1.5 rounded-full bg-accent-400"></span>
          Integraciones SUNAT · Pasarelas · BI
        </span>

        <h1 class="mt-4 text-4xl font-extrabold leading-tight sm:text-5xl">
          Soluciones tecnológicas <span class="text-accent-200">claras</span> y medibles
        </h1>

        <p class="mt-5 text-lg text-white/90 max-w-2xl">
          ERP en la nube, software a medida, marketing de performance y equipamiento tecnológico con soporte local.
        </p>

        <div class="mt-8 flex flex-wrap gap-3">
          <a href="https://wa.me/51XXXXXXXXX" target="_blank" rel="noopener"
             class="inline-flex items-center gap-2 rounded-md bg-white px-5 py-3 text-sm font-semibold text-slate-900 shadow-sm hover:bg-slate-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/60">
            Hablar por WhatsApp
          </a>
          <a href="{{ route('form.contact') }}"
             class="inline-flex items-center gap-2 rounded-md border border-white/35 bg-white/10 px-5 py-3 text-sm font-semibold text-white hover:bg-white/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white/60">
            Contáctanos
          </a>
        </div>

        <div class="mt-6 flex flex-wrap items-center gap-6 text-sm text-white/85">
          <div class="flex items-center gap-2"><span class="size-2 rounded-full bg-accent-400"></span> Onboarding en semanas</div>
          <div class="flex items-center gap-2"><span class="size-2 rounded-full bg-accent-400"></span> Soporte prioritario</div>
        </div>
      </div>

      <div class="lg:justify-self-end">
        <div class="relative mx-auto w-full max-w-lg">
          <img src="{{ asset('images/hero.png') }}" alt="Kusay Tech"
               class="w-full rounded-xl shadow-2xl ring-1 ring-white/20">
        </div>
      </div>
    </div>
  </x-container>
</section>
