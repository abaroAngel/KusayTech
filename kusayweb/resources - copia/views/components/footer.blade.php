<footer class="bg-slate-50 shadow-inner mt-12">
  {{-- Contenido principal --}}
  <div class="flex flex-col lg:flex-row justify-between gap-8 px-4 sm:px-8 py-6">

    {{-- Columna 1 - Sobre nosotros --}}
    <div class="p-2.5 font-open-sans w-full lg:w-[335px] flex flex-col items-center lg:items-start">
      <h2 class="font-bold text-kusay-blue text-2xl mb-3">Sobre nosotros:</h2>
      <ul class="flex flex-col gap-1 pl-0 lg:pl-5 text-lg text-kusay-gray">
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/">Home</a></li>
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/nosotros#mision-vision">Misión y visión</a></li>
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/nosotros#historia">Historia</a></li>
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/nosotros#organigrama">Organigrama</a></li>
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/nosotros#principios-rectores">Principios rectores</a></li>
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/nosotros#valores-corporativos">Valores corporativos</a></li>
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/#contactanos">Contáctanos</a></li>
      </ul>
    </div>

    {{-- Columna 2 - Soluciones --}}
    <div class="p-2.5 font-open-sans w-full lg:w-[335px] flex flex-col items-center">
      <h2 class="font-bold text-kusay-blue text-2xl mb-3">Soluciones tecnológicas:</h2>
      <ul class="flex flex-col gap-1 px-0 lg:px-5 text-lg text-kusay-gray mb-6">
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/erp">KUSAY ERP</a></li>
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/desarrollo-software">Software personalizado</a></li>
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/marketing-digital">Marketing digital</a></li>
      </ul>
      <div class="flex flex-col items-center">
        <p class="text-center text-kusay-blue font-bold text-2xl mb-2">
          Almacenamiento seguro<br>en la nube con:
        </p>
        <div class="cursor-pointer text-amber-500">
          <i class="fa-brands fa-aws text-[100px] md:text-[120px]" aria-label="AWS"></i>
        </div>
      </div>
    </div>

    {{-- Columna 3 - Tienda y redes --}}
    <div class="p-2.5 font-open-sans w-full lg:w-[335px] flex flex-col items-center">
      <h2 class="font-bold text-kusay-blue text-2xl mb-3">Tienda tecnológica</h2>
      <ul class="flex flex-col gap-1 px-0 lg:px-5 text-lg text-kusay-gray mb-6">
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/equipos-software">Equipos y software</a></li>
        <li><a class="hover:text-kusay-blue-t hover:underline" href="/accesorios">Accesorios</a></li>
      </ul>

      <div class="flex flex-col items-center gap-4">
        <p class="font-bold text-kusay-blue text-2xl">Síguenos en:</p>
        <div class="flex items-center gap-5 text-4xl md:text-5xl">
          <a href="https://www.tiktok.com/@kusay.tech" target="_blank" rel="noopener" aria-label="TikTok" class="hover:text-kusay-light-blue">
            <i class="fa-brands fa-tiktok"></i>
          </a>
          <a href="https://pe.linkedin.com/company/kusay-tech" target="_blank" rel="noopener" aria-label="LinkedIn" class="text-blue-900 hover:text-kusay-light-blue">
            <i class="fa-brands fa-linkedin"></i>
          </a>
          <a href="https://www.youtube.com/@kusaytech" target="_blank" rel="noopener" aria-label="YouTube" class="text-red-500 hover:text-kusay-light-blue">
            <i class="fa-brands fa-youtube"></i>
          </a>
          <a href="https://web.facebook.com/profile.php?id=61566311862489" target="_blank" rel="noopener" aria-label="Facebook" class="text-blue-700 hover:text-kusay-light-blue">
            <i class="fa-brands fa-facebook"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  {{-- Línea de copyright --}}
  <div class="p-3 flex justify-center items-center font-bold font-open-sans text-sm">
    <p class="text-kusay-blue">COPYRIGHT © KUSAY TECH {{ now()->year }}</p>
  </div>

  {{-- Enlaces legales --}}
  <div class="p-3 text-center text-white text-sm font-bold font-open-sans bg-kusay-blue-t">
    <span class="space-x-2">
      <a class="hover:underline" href="/politicas-privacidad">Privacidad y Protección de Datos</a><span>|</span>
      <a class="hover:underline" href="/codigo-etica">Código de Ética</a><span>|</span>
      <a class="hover:underline" href="/terminos-condiciones">Términos y Condiciones de Uso</a>
    </span>
  </div>
</footer>
