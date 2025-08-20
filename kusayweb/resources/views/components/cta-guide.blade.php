{{-- CTA: GUÍA GRATUITA --}}
<section class="bg-kusay-blue-t w-full py-10 md:py-16 px-4">
  <div class="max-w-6xl mx-auto flex flex-col items-center text-center gap-6">
    {{-- Título --}}
    <h2 class="text-white text-3xl md:text-[50px] font-bold tracking-wide">
      Guía para digitalizar tu negocio
    </h2>
    <span class="text-white text-lg md:text-xl font-bold tracking-wide">
      Descarga nuestra guía GRATIS
    </span>

    {{-- Formulario --}}
    <form class="w-full flex flex-col md:flex-row justify-center items-center gap-4 md:gap-6 max-w-4xl">
      {{-- Ruc --}}
      <div class="p-2 bg-white rounded-md w-full md:w-48">
        <input type="text" placeholder="Ruc"
          class="text-[#44546f] text-lg bg-transparent w-full border-none focus:outline-none" />
      </div>

      {{-- Empresa --}}
      <div class="p-2 bg-white rounded-md w-full md:w-48">
        <input type="text" placeholder="Empresa"
          class="text-[#44546f] text-lg bg-transparent w-full border-none focus:outline-none" />
      </div>

      {{-- Email con ícono --}}
      <div class="p-2 bg-white rounded-md w-full md:w-48">
        <div class="flex items-center justify-between">
          <input type="email" placeholder="Email"
            class="text-[#44546f] text-lg bg-transparent w-full border-none focus:outline-none" />
          <i class="fa-solid fa-location-arrow fa-beat-fade text-2xl text-kusay-blue-t cursor-pointer"></i>
        </div>
      </div>

      {{-- Botón --}}
      <button type="button"
        class="w-full md:w-auto bg-kusay-green hover:bg-kusay-green-hover text-white font-semibold text-lg px-6 py-3 rounded-lg flex items-center justify-center gap-2 transition">
        <i class="fa-solid fa-download"></i> Descargar Ahora
      </button>
    </form>

    {{-- Texto adicional --}}
    <div class="mt-2">
      <h3 class="text-white text-lg md:text-[20px] font-bold text-center">
        " <span class="text-xl md:text-[25px]">¡+0</span> empresarios ya descargaron esta guía! "
      </h3>
    </div>
  </div>
</section>
