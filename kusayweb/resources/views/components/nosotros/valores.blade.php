<section id="valores-corporativos" class="bg-[#FBFCFC] py-12 px-4">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-[#114795] text-center font-bold text-2xl sm:text-[32px] mb-4 speakable-title-nosotros">
      NUESTROS VALORES CORPORATIVOS
    </h2>
    <p class="text-[#003A64] text-center italic mb-8 leading-relaxed text-[18px]">
      "Valores que definen nuestro <span class="font-semibold text-[#003A64]">ADN en soluciones tecnológicas</span>
      y nos distinguen como líderes innovadores"
    </p>

    @php
      $valores = [
        ['n' => 1, 't' => 'Calidad Integral Corporativa', 'd' => 'Excelencia en cada proceso, alineada a estándares internacionales'],
        ['n' => 2, 't' => 'Soluciones Personalizadas', 'd' => 'Desarrollos personalizados que resuelven problemas reales'],
        ['n' => 3, 't' => 'Crecimiento Colaborativo', 'd' => 'Desarrollo del equipo para soluciones más eficientes y actualizadas'],
        ['n' => 4, 't' => 'Relaciones Ganar-Ganar', 'd' => 'Negociaciones donde todos alcanzan sus objetivos'],
        ['n' => 5, 't' => 'Innovación y Mejora Continua', 'd' => 'Cultura de mejora continua que nos convierte en tu mejor partner'],
        ['n' => 6, 't' => 'Conocimiento Intensivo', 'd' => 'Conocimiento que convierte desafíos en ventajas'],
        ['n' => 7, 't' => 'Resiliencia Cibernética', 'd' => 'Resiliencia cibernética integrada en cada solución'],
      ];
    @endphp

    <div class="flex flex-wrap justify-center gap-6">
      @foreach ($valores as $v)
        <div class="relative w-[300px] h-[300px] group border border-blue-700 rounded-[15px] overflow-hidden bg-[#F9FAFB] shadow-md">
          <div class="relative z-10 flex flex-col items-center justify-center h-full transition-opacity duration-300 group-hover:opacity-30">
            <div class="flex-shrink-0 w-[50px] h-[50px] bg-[#0C86F3] text-white text-[28px] font-semibold rounded-full flex items-center justify-center mb-2">
              {{ $v['n'] }}
            </div>
            <h3 class="text-center font-bold text-lg md:text-[28px] text-[#114795] speakable-value-title px-3">
              {{ $v['t'] }}
            </h3>
          </div>
          <div class="absolute left-0 top-0 w-full h-0 group-hover:h-full bg-[#FFE785] text-[#003A64]
                      transition-all duration-500 ease-in-out overflow-hidden flex flex-col items-center justify-center z-20">
            <p class="text-[18px] sm:text-[20px] text-[#003A64] text-center leading-[1.9rem] p-4">
              “{{ $v['d'] }}”
            </p>
            <div class="mt-2 flex items-center justify-center w-full">
              <button type="button" class="px-3 py-2 bg-blue-500 text-white rounded-lg">Ver más</button>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
