<header class="border-b bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
  <div class="mx-auto max-w-7xl px-4 py-3 flex items-center justify-between">
    <a href="{{ route('home') }}" class="font-semibold tracking-wide">KUSAY TECH</a>

    <nav class="hidden md:flex gap-6 text-sm">
      <a href="{{ route('home') }}">Inicio</a>
      <a href="{{ route('solutions.erp') }}">KUSAY ERP</a>
      <a href="{{ route('solutions.software') }}">Software</a>
      <a href="{{ route('solutions.marketing') }}">Marketing</a>
      <a href="{{ route('store.index') }}">Tienda Tech</a>
      <a href="{{ route('form.voucher') }}">Busca tu comprobante</a>
      <a href="{{ route('form.contact') }}">Contáctanos</a>
    </nav>

    <div class="flex items-center gap-3">
      @auth
        <a href="{{ route('panel') }}" class="text-sm underline">Panel</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="text-sm">Salir</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="text-sm underline">Iniciar sesión</a>
      @endauth
    </div>
  </div>
</header>
