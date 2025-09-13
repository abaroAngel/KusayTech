{{-- resources/views/partials/navbar.blade.php --}}

{{-- BARRA SUPERIOR --}}
<div class="bg-[#0B64B1] text-white">
  <div class="max-w-7xl mx-auto w-full px-3 sm:px-6">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-0 items-center py-2">
      {{-- Botón: Busca tu comprobante --}}
      <div class="flex justify-center sm:justify-start p-1">
        <a
          href="/comprobantes"  {{-- ajusta la ruta si es otra --}}
          class="w-full sm:w-auto bg-white hover:bg-sky-100 text-slate-700 font-sans font-semibold py-2.5 px-4 rounded-full
                 flex items-center justify-center sm:justify-start gap-2 transition-colors"
        >
          <i class="fas fa-search" aria-label="fa-search"></i>
          <span class="text-sm">Busca tu comprobante</span>
        </a>
      </div>

      {{-- Botón: Contáctanos (ancla a la sección) --}}
      <div class="flex justify-center p-1">
        <a
          href="/#contactanos"
          class="w-full sm:w-auto bg-white hover:bg-sky-100 text-slate-700 font-sans font-semibold py-2.5 px-6 rounded-full
                 flex items-center justify-center gap-2 transition-colors"
        >
          <span class="text-sm">Contáctanos</span>
        </a>
      </div>

      {{-- Redes sociales --}}
      <div class="flex justify-center sm:justify-end">
        <div class="flex items-center gap-4 sm:gap-5">
          <a href="https://www.youtube.com/@kusaytech" target="_blank" aria-label="youtube" title="YouTube"
             class="text-white hover:text-sky-200 text-lg transition-colors">
            <i class="fab fa-youtube"></i>
          </a>
          <a href="https://web.facebook.com/profile.php?id=61566311862489" target="_blank" aria-label="facebook" title="Facebook"
             class="text-white hover:text-sky-200 text-lg transition-colors">
            <i class="fab fa-facebook"></i>
          </a>
          <a href="https://www.tiktok.com/@kusay.tech" target="_blank" aria-label="tiktok" title="TikTok"
             class="text-white hover:text-sky-200 text-lg transition-colors">
            <i class="fab fa-tiktok"></i>
          </a>
          <a href="https://pe.linkedin.com/company/kusay-tech" target="_blank" aria-label="linkedin" title="LinkedIn"
             class="text-white hover:text-sky-200 text-lg transition-colors">
            <i class="fab fa-linkedin"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- NAV PRINCIPAL --}}
<nav class="bg-white shadow-lg flex items-center justify-between px-4 py-2 relative">
  {{-- Logo --}}
  <div class="flex items-center space-x-4">
    <a href="{{ route('home') }}">
      <img src="{{ asset('assets/kusay/logo.jpg') }}" alt="Kusay Logo" class="h-12 w-auto cursor-pointer">
    </a>
  </div>

  {{-- Botón hamburguesa (mobile) --}}
  <div class="flex sm:hidden">
    <button class="text-[#192435] text-2xl" aria-label="Abrir menú">
      <i class="fas fa-bars"></i>
    </button>
  </div>

  {{-- Links desktop --}}
  <div class="hidden sm:flex items-center space-x-8">

    {{-- Soluciones --}}
    <div class="relative group">
      <button class="flex flex-col items-center text-[#C62828] font-bold uppercase hover:text-[#8b1d1d]
                   transition-transform duration-300 hover:scale-110">
        <span class="flex items-center space-x-2">
          <i class="fas fa-cog text-[28px] text-[#2F3A4A]"></i>
          <span class="hidden sm:group-hover:inline-block md:inline-block text-start leading-tight text-sm">
            Soluciones <br> Tecnológicas
          </span>
          <i class="fas fa-chevron-down text-[14px] text-[#192435]"></i>
        </span>
      </button>

      {{-- Dropdown --}}
      <div class="absolute left-1/2 -translate-x-1/2 top-full mt-3 hidden group-hover:block
                  bg-white border border-slate-200 rounded-lg shadow-xl w-64 p-2">
        <a href="{{ route('erp') }}" class="block px-3 py-2 rounded hover:bg-slate-50">KUSAY ERP</a>
        <a href="{{ route('software') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Software personalizado</a>
        <a href="{{ route('marketing') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Marketing digital</a>
        <a href="{{ route('equipos') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Equipos &amp; accesorios</a>
      </div>
    </div>

    <div class="h-8 border-l border-[#2F3A4A]"></div>

    {{-- Sobre nosotros --}}
    <div class="relative group">
    <button class="flex flex-col items-center text-[#C62828] font-bold uppercase hover:text-[#8b1d1d]
                transition-transform duration-300 hover:scale-110 focus:outline-none">
        <span class="flex items-center space-x-2">
        <i class="fas fa-users text-[28px] text-[#2F3A4A]"></i>
        <span class="hidden sm:group-hover:inline-block md:inline-block text-start leading-tight text-sm">
            Sobre <br> Kusay Tech
        </span>
        <i class="fas fa-chevron-down text-[14px] text-[#192435]"></i>
        </span>
    </button>

    {{-- Dropdown (se mantiene abierto con hover o foco) --}}
    <div class="absolute left-1/2 -translate-x-1/2 top-full mt-3 hidden group-hover:flex group-focus-within:flex
                flex-col bg-white border border-slate-200 rounded-lg shadow-xl w-64 p-2 z-50">
        <a href="{{ route('nosotros') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Nosotros</a>
        <a href="{{ route('nosotros') }}#historia" class="block px-3 py-2 rounded hover:bg-slate-50">Historia</a>
        <a href="{{ route('nosotros') }}#valores-corporativos" class="block px-3 py-2 rounded hover:bg-slate-50">Valores</a>
        <a href="{{ route('trabaja') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Trabaja con nosotros</a>
    </div>
    </div>


    <div class="h-8 border-l border-[#2F3A4A]"></div>

    {{-- Tienda --}}
    <div class="relative group">
      <button class="flex items-center space-x-2 text-[#C62828] font-bold uppercase hover:text-[#8b1d1d]
                   transition-transform duration-300 hover:scale-110">
        <i class="fas fa-shopping-cart text-[28px] text-[#2F3A4A]"></i>
        <span class="hidden sm:group-hover:inline-block md:inline-block text-sm">Tienda Tech</span>
        <i class="fas fa-chevron-down text-[14px] text-[#192435]"></i>
      </button>

      {{-- Dropdown --}}
      <div class="absolute left-1/2 -translate-x-1/2 top-full mt-3 hidden group-hover:block
                  bg-white border border-slate-200 rounded-lg shadow-xl w-64 p-2">
        <a href="{{ route('catalogo') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Ir a catálogo</a>
        <a href="{{ route('ofertas') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Ofertas</a>
        <a href="{{ route('soporte') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Soporte</a>
      </div>
    </div>
  </div>

  {{-- Registrarse --}}
  <a href="{{ route('registro') }}" class="hidden sm:flex ml-4 items-center space-x-2 bg-[#0074C7] text-white sm:px-2 md:px-4 sm:py-1 md:py-2
           rounded-full shadow-md hover:bg-[#005fa3] transition-colors">
    <i class="fas fa-user text-sm md:text-base lg:text-lg"></i>
    <span class="text-xs md:text-sm lg:text-base">Registrarse</span>
  </a>
</nav>

