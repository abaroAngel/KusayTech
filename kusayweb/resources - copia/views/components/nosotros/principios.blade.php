<section id="principios-rectores" class="bg-[#FBFCFC] py-12 px-4">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-[#1B1F3B] font-extrabold text-2xl sm:text-3xl mb-6">
      NUESTROS PRINCIPIOS RECTORES
    </h2>

    <div class="w-full overflow-x-auto">
      <div class="flex gap-6 py-6">
        @php
          $principios = [
            ['t' => 'Cumplimiento normativo', 'd' => 'Responsabilidad y respeto a leyes locales e internacionales.'],
            ['t' => 'Interdependencia', 'd' => 'Base de nuestras relaciones y operaciones.'],
            ['t' => 'Ciberseguridad', 'd' => 'Estándares y resiliencia cibernética en procesos.'],
            ['t' => 'Desarrollo y crecimiento sostenible', 'd' => 'Responsabilidad ambiental y económica.'],
            ['t' => 'Creación y co-creación de valor', 'd' => 'Generamos valor colaborando con stakeholders.'],
            ['t' => 'Before time & just in time', 'd' => 'Antes de tiempo o justo a tiempo acordado.'],
            ['t' => 'Confidencialidad', 'd' => 'Ética y confidencialidad en todas las interacciones.'],
          ];
        @endphp

        @foreach ($principios as $p)
          <div class="[perspective:1000px] w-[250px] h-[270px] flex-shrink-0">
            <div class="relative w-full h-full [transform-style:preserve-3d] transition-transform duration-500 hover:[transform:rotateY(180deg)]">
              <div class="absolute inset-0 bg-[#0D1D4D] text-white rounded-lg flex items-center justify-center p-4 [backface-visibility:hidden]">
                <h3 class="text-center font-bold text-lg sm:text-[20px]">{{ $p['t'] }}</h3>
              </div>
              <div class="absolute inset-0 bg-[#0F4DC9] text-white rounded-lg p-4 [transform:rotateY(180deg)] [backface-visibility:hidden] overflow-y-auto">
                <p class="text-[14px] sm:text-[16px] leading-relaxed">{{ $p['d'] }}</p>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </div>
</section>
