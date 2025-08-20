<section id="historia" class="bg-[#FBFCFC] py-14 px-6 max-w-7xl mx-auto">
  <h2 class="text-center text-[#114795] font-bold text-xl sm:text-[28px] mb-8">
    NUESTRA HISTORIA
  </h2>

  {{-- Item: Resumen --}}
  <div class="border border-gray-300 border-b">
    <button
      class="history-toggle w-full flex justify-between px-4 py-3 text-left text-[20px] font-semibold
             hover:bg-[#0074C7] hover:text-white text-black focus:outline-none"
      aria-expanded="false"
      data-target="#hist-resumen"
    >
      Resumen
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4 transition-transform duration-300">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </button>
    <div id="hist-resumen" class="history-panel max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
      <div class="px-4 py-3 text-slate-700">
        <p>
          KUSAY TECH nació en el año 2019 bajo el nombre de TIAM (Tecnología de la Información al Alcance de tus Manos), el objetivo era digitalizar los procesos de gestión empresarial y ofrecer soluciones integrales que abarquen tecnologías de hardware y software como servicio y producto. A lo largo del tiempo, las ideas fueron madurando y consolidándose, lo que llevó a la formación de un equipo especializado en cada área. Fue entonces, a finales del año 2023, cuando la empresa se formalizó en el sur este andino del Perú, específicamente en la ciudad de Juliaca, bajo el nombre jurídico de KUSAY TECHNOLOGY S.A.C.
        </p>
      </div>
    </div>
  </div>

  {{-- Item: Conocer más --}}
  <div class="border border-gray-300 border-b shadow-lg">
    <button
      class="history-toggle w-full flex justify-between px-4 py-3 text-left text-[20px] font-semibold
             hover:bg-[#0074C7] hover:text-white text-black focus:outline-none"
      aria-expanded="false"
      data-target="#hist-mas"
    >
      Conocer más
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4 transition-transform duration-300">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </button>
    <div id="hist-mas" class="history-panel max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
      <div class="px-4 py-3 text-slate-700 space-y-3">
        <p>
        La palabra "KUSAY" tiene su origen en el aimara – K’USA - y significa "bueno" o "excelente", mientras que "TECHNOLOGY" es una palabra en inglés que se traduce al español como "tecnología". La combinación de ambas palabras transmite el mensaje de "tecnología buena" o "tecnología excelente". Los fundadores eligieron esta nomenclatura jurídica y de marca para representar el origen y la identidad de la empresa. El origen, porque uno de los fundadores tiene raíces aimaras. La identidad, porque la calidad es un aspecto distintivo y representativo de KUSAY TECH, y la tecnología, porque se enfocan en el uso de tecnologías innovadoras y de vanguardia. Todo esto refleja el compromiso de la empresa con la "calidad integral corporativa" que parte desde su origen, su identidad, su diseño y su enfoque práctico de gestión.
        </p>
        <ul class="list-disc pl-5">
          <li>Ciberseguridad y resiliencia.</li>
          <li>Ágil + mejora continua.</li>
          <li>Multi-industria / multi-sede.</li>
        </ul>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>
    document.querySelectorAll('.history-toggle').forEach(btn => {
      btn.addEventListener('click', () => {
        const target = document.querySelector(btn.dataset.target);
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!expanded));
        if (!expanded) {
          target.style.maxHeight = target.scrollHeight + 'px';
          btn.querySelector('svg')?.classList.add('rotate-180');
        } else {
          target.style.maxHeight = '0px';
          btn.querySelector('svg')?.classList.remove('rotate-180');
        }
      });
    });
  </script>
  @endpush
</section>
