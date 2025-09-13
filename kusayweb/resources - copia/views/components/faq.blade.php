<section aria-labelledby="faq-title" class="mt-8">
  <div class="text-center space-y-4 mb-8">
    <h2 id="faq-title" class="font-open-sans font-bold text-2xl md:text-4xl text-kusay-blue tracking-tight">
      PREGUNTAS FRECUENTES
    </h2>
    <p class="text-base md:text-lg text-kusay-blue">
      Inquietudes comunes que nuestros clientes tienen sobre la empresa y sobre nuestras soluciones tecnológicas
    </p>
  </div>

  <div class="flex items-center w-full mb-4">
    <div class="p-4 rounded-t-lg border border-blue-100 bg-yellow-200 h-11 flex items-center">
      <span class="text-blue-800 text-2xl font-bold">FAQs</span>
    </div>
    <div class="border-b-2 border-blue-100 w-full h-11"></div>
  </div>

  <div id="faq-accordion" class="space-y-4">
    @php
      $items = [
        [
          'q' => '¿Qué diferencia a KUSAY TECH de otras empresas de tecnología en Perú?',
          'a' => 'KUSAY TECH ofrece soluciones integrales que combinan software, hardware y consultoría personalizada, con soporte técnico local y experiencia en transformación digital adaptada al mercado peruano.'
        ],
        [
          'q' => '¿Por qué elegir su sistema de gestión empresarial KUSAY ERP?',
          'a' => 'KUSAY ERP es una plataforma en la nube que centraliza módulos clave (inventario, ventas, compras, finanzas), con interfaz intuitiva, escalable para PYMES y con actualizaciones continuas basadas en el feedback de clientes peruanos.'
        ],
        [
          'q' => '¿Cuál es la diferencia entre KUSAY TECH y KUSAY ERP?',
          'a' => 'KUSAY TECH es la empresa que desarrolla y ofrece soluciones; KUSAY ERP es uno de sus productos: un sistema de gestión empresarial para optimizar procesos.'
        ],
        [
          'q' => '¿Colaboran con investigaciones tecnológicas y científicas?',
          'a' => 'Sí, apoyamos proyectos en IA, automatización, análisis de datos y eficiencia de procesos de gestión.'
        ],
        [
          'q' => '¿Ofrecen pasantías o prácticas preprofesionales?',
          'a' => 'Sí. Programa de pasantías para carreras tecnológicas y administrativas, con proyectos reales y mentores. Revisa “Trabaja con nosotros”.'
        ],
      ];
    @endphp

    @foreach ($items as $i => $item)
      <div class="rounded-xl bg-neutral-50 shadow-md text-kusay-blue">
        <button
          type="button"
          class="faq-toggle flex w-full items-center justify-between px-6 py-4 text-left"
          aria-expanded="false"
          aria-controls="faq-panel-{{ $i }}"
          id="faq-btn-{{ $i }}"
        >
          <span class="font-open-sans">{{ $item['q'] }}</span>
          <span class="faq-icon text-4xl text-kusay-blue transition-transform duration-300">+</span>
        </button>

        <div
          id="faq-panel-{{ $i }}"
          class="faq-panel px-6 transition-all duration-300 ease-in-out transform text-gray-600 max-h-0 opacity-0 -translate-y-2 overflow-hidden"
          role="region"
          aria-labelledby="faq-btn-{{ $i }}"
          aria-hidden="true"
        >
          <p class="text-gray-600 py-3">{{ $item['a'] }}</p>
        </div>
      </div>
    @endforeach
  </div>
</section>
