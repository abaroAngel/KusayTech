<footer class="mt-16 border-t">
  <div class="mx-auto max-w-7xl px-4 py-8 grid md:grid-cols-4 gap-8 text-sm">
    <div>
      <div class="font-semibold mb-2">KUSAY TECH</div>
      <p>Tu socio tecnológico que impulsa tu crecimiento.</p>
      <p class="mt-2 text-xs">© KUSAY TECH 2025</p>
    </div>
    <div>
      <div class="font-semibold mb-2">Soluciones</div>
      <ul class="space-y-1">
        <li><a href="{{ route('solutions.erp') }}">ERP en la nube</a></li>
        <li><a href="{{ route('solutions.software') }}">Software personalizado</a></li>
        <li><a href="{{ route('solutions.marketing') }}">Marketing digital</a></li>
      </ul>
    </div>
    <div>
      <div class="font-semibold mb-2">Empresa</div>
      <ul class="space-y-1">
        <li><a href="{{ route('page.show','mision-vision') }}">Misión y visión</a></li>
        <li><a href="{{ route('page.show','historia') }}">Historia</a></li>
        <li><a href="{{ route('page.show','organigrama') }}">Organigrama</a></li>
      </ul>
    </div>
    <div>
      <div class="font-semibold mb-2">Contacto</div>
      <p>Ventas: +51 967 928 806</p>
      <p>Prensa: +51 930 904 401</p>
      <a class="inline-block mt-2 underline" href="{{ route('form.claim') }}">Libro de reclamaciones</a>
    </div>
  </div>
</footer>
