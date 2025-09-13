<section id="contactanos" aria-labelledby="contact-title" class="mt-8">
  <h2 id="contact-title" class="text-4xl font-bold text-center text-kusay-blue font-open-sans p-2.5">CONTÁCTANOS</h2>

  <div class="mt-4 flex flex-nowrap gap-4 items-start overflow-x-auto">
    {{-- Puntos de contacto --}}
    <div class="flex-shrink-0 p-2.5 rounded-lg border border-[#eaeef6] w-[420px] h-[780px]">
      <div class="flex flex-col items-center gap-2.5">
        <span class="text-lg font-bold text-kusay-blue-t font-open-sans">Puntos de contacto</span>

        <div class="w-full space-y-4">
          <div>
            <span class="text-lg font-semibold text-kusay-blue-opa">Puno:</span>
            <div class="pl-2.5 mt-1">
              <div class="flex items-center gap-2.5">
                <i class="fa-solid fa-circle text-xs text-kusay-blue-cicle"></i>
                <span class="text-base">Juliaca - San Román - Jr. Gonzales Prada N° 249</span>
              </div>
            </div>
          </div>

          <div>
            <span class="text-lg font-semibold text-kusay-blue-opa">Lima:</span>
            <div class="pl-2.5 mt-1">
              <div class="flex items-center gap-2.5">
                <i class="fa-solid fa-circle text-xs text-kusay-blue-cicle"></i>
                <span class="text-base">Chorrillos - Av. Defensores del Morro 2265</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Formulario (solo UI) --}}
    <div class="flex-shrink-0 p-2.5 flex flex-col items-center gap-2.5 rounded-lg border border-[#cfd8ed] bg-[#fbfcfc] w-[420px] h-[780px]">
      <span class="text-lg font-bold text-kusay-blue-t">Registrar consulta</span>

      <form id="contact-form" class="w-full px-5 flex flex-col gap-3 overflow-auto" novalidate>
        <div class="flex flex-col gap-1">
          <label for="fullName" class="text-base text-kusay-text-contactanos font-semibold">Nombres y Apellidos: <span class="text-red-500">*</span></label>
          <input id="fullName" name="fullName" type="text" placeholder="Nombres y Apellidos" required minlength="3"
                 class="border border-kusay-light-blue rounded-sm p-2">
          <p class="form-error hidden text-sm text-red-600">Ingresa tu nombre completo (mínimo 3 caracteres).</p>
        </div>

        <div class="flex flex-col gap-1">
          <label for="ruc" class="text-base text-kusay-text-contactanos font-semibold">RUC y nombre de la empresa: <span class="text-red-500">*</span></label>
          <input id="ruc" name="ruc" type="text" placeholder="20976992513 - LOS CHOCLITOS S.A.C." required
                 class="border border-kusay-light-blue rounded-sm p-2">
          <p class="form-error hidden text-sm text-red-600">Ingresa RUC y Razón Social.</p>
        </div>

        <div class="flex flex-col gap-1">
          <label for="cargo" class="text-base text-kusay-text-contactanos font-semibold">Cargo: <span class="text-red-500">*</span></label>
          <select id="cargo" name="cargo" required class="border border-kusay-light-blue rounded-sm p-2 bg-white">
            <option value="" selected disabled>Seleccionar</option>
            <option>Gerente</option>
            <option>SubGerente</option>
            <option>Otro</option>
          </select>
          <p class="form-error hidden text-sm text-red-600">Selecciona tu cargo.</p>
        </div>

        <div class="flex flex-col gap-1">
          <label for="phone" class="text-base text-kusay-text-contactanos font-semibold">Celular de contacto: <span class="text-red-500">*</span></label>
          <input id="phone" name="phone" type="tel" inputmode="numeric" pattern="^\d{9}$" maxlength="9"
                 placeholder="999999999" required
                 class="border border-kusay-light-blue rounded-sm p-2">
          <p class="form-error hidden text-sm text-red-600">Ingresa 9 dígitos (Perú).</p>
        </div>

        <div class="flex flex-col gap-1">
          <label for="email" class="text-base text-kusay-text-contactanos font-semibold">Email: <span class="text-red-500">*</span></label>
          <input id="email" name="email" type="email" placeholder="nombre@empresa.com" required
                 class="border border-kusay-light-blue rounded-sm p-2" autocomplete="email">
          <p class="form-error hidden text-sm text-red-600">Ingresa un correo válido.</p>
        </div>

        <div class="flex flex-col gap-1">
          <label for="interest" class="text-base text-kusay-text-contactanos font-semibold">Interesado en: <span class="text-red-500">*</span></label>
          <select id="interest" name="interest" required class="border border-kusay-light-blue rounded-sm p-2 bg-white">
            <option value="" selected disabled>Seleccionar</option>
            <option value="kusay-erp">KUSAY ERP</option>
            <option value="software-personalizado">Software personalizado</option>
            <option value="marketing-digital">Marketing digital</option>
            <option value="equipos-software">Equipos y software</option>
            <option value="accesorios">Accesorios</option>
          </select>
          <p class="form-error hidden text-sm text-red-600">Selecciona una opción.</p>
        </div>

        <div class="flex flex-col gap-1">
          <label for="about" class="text-base text-kusay-text-contactanos font-semibold">Descripción: <span class="text-red-500">*</span></label>
          <textarea id="about" name="about" rows="3" placeholder="Cuéntanos brevemente tu necesidad"
                    required minlength="10"
                    class="border border-kusay-light-blue rounded-sm p-2"></textarea>
          <p class="form-error hidden text-sm text-red-600">Mínimo 10 caracteres.</p>
        </div>

        <label class="flex items-start gap-2 text-base">
          <input id="acceptTerms" type="checkbox" required class="w-5 h-5">
          <span>He leído y acepto las
            <a href="/politicas-privacidad" class="text-kusay-blue-t hover:underline">Políticas de privacidad</a>,
            <a href="/politicas-privacidad" class="text-kusay-blue-t hover:underline">Políticas de protección de datos</a> y
            <a href="/terminos-condiciones" class="text-kusay-blue-t hover:underline">Términos y condiciones de uso</a> de KUSAY COMPANY.
          </span>
        </label>
        <p class="form-error hidden text-sm text-red-600" data-for="acceptTerms">Debes aceptar los términos.</p>

        <div class="w-full flex justify-center">
          <button type="submit" class="bg-yellow-300 rounded-sm w-[190px] h-[38px] mt-2 font-bold hover:bg-yellow-400">
            Enviar
          </button>
        </div>

        {{-- Mensaje UI (solo front) --}}
        <p id="form-msg" class="hidden text-sm mt-2"></p>
      </form>
    </div>

    {{-- Información lateral --}}
    <div class="flex-shrink-0 border rounded-lg border-[#eaeef6] w-[420px] h-[780px] overflow-auto">
      <div class="p-2.5 border-b border-[#eaeef6] bg-[#fbfcfc]">
        <span class="text-lg font-bold text-kusay-blue-t block">Teléfonos:</span>
        <span class="text-[16px] text-kusay-text-contactanos block">Ventas:
          <a href="tel:+51967928806" class="hover:text-kusay-blue-t">+51 967 928 806</a>
        </span>
        <span class="text-[16px] text-kusay-text-contactanos block">Prensa:
          <a href="tel:+51930904401" class="hover:text-kusay-blue-t">+51 930 904 401</a>
        </span>
      </div>

      <div class="p-2.5 border-b border-[#eaeef6] bg-white">
        <span class="text-lg font-bold text-kusay-blue-t block">Horario de atención</span>
        <span class="text-[16px] block">Lunes a viernes</span>
        <span class="text-[16px] block">Mañana: 8:00 - 12:30</span>
        <span class="text-[16px] block">Tarde: 14:00 - 16:00</span>
        <span class="text-[16px] block">Noche (WhatsApp): 18:00 - 21:00</span>
      </div>

      <div class="p-2.5 border-b border-[#eaeef6] bg-[#fbfcfc]">
        <span class="text-lg font-bold text-kusay-blue-t block">Emails:</span>
        <a href="mailto:gerencia@kusaytech.com" class="block hover:text-kusay-blue-t">gerencia@kusaytech.com</a>
        <a href="mailto:dpto.software@kusaytech.com" class="block hover:text-kusay-blue-t">dpto.software@kusaytech.com</a>
        <a href="mailto:ventas@kusaytech.com" class="block hover:text-kusay-blue-t">ventas@kusaytech.com</a>
      </div>

      <div class="pt-2.5 px-2.5 bg-white space-y-4">
        <span class="text-lg font-bold text-kusay-blue-t block">Reclamos y quejas:</span>

        <div class="py-2.5 border-b border-[#eaeef6] text-center">
          <span class="text-[17px] font-semibold text-kusay-blue block">a. Conducta antiética</span>
          <i class="fa-solid fa-gavel text-3xl block my-1"></i>
          <span class="text-base">
            Si fue testigo de algún incumplimiento del
            <a class="text-kusay-blue-t hover:underline" href="/codigo-etica">código de ética</a> de KUSAY COMPANY por parte de un colaborador,
            repórtelo por este medio.
            <button class="text-kusay-blue-t hover:underline">Reportar</button>.
          </span>
        </div>

        <div class="py-2.5 text-center">
          <span class="text-[17px] font-semibold text-kusay-blue block">b. Libro de reclamaciones</span>
          <div class="flex justify-center h-[83px] overflow-hidden my-2">
            <img loading="lazy" src="/assets/images/libro-reclamaciones.png" width="198" height="83" alt="Libro de reclamaciones">
          </div>
          <span class="text-base">
            Contamos con Libro de Reclamaciones virtual y físico a tu disposición.
            <button class="text-kusay-blue-t hover:underline">Registrar su reclamo</button>.
          </span>
        </div>
      </div>
    </div>
  </div>

  {{-- Mapa (placeholder UI sin API key) --}}
  <div class="p-2 w-full h-[520px] overflow-hidden shadow-md flex flex-col justify-center text-center mt-6">
    <div>
      <div class="text-lg font-bold text-kusay-text-contactanos mb-2">Juliaca - San Román - Puno</div>
      <div class="text-base text-kusay-text-contactanos">Jr. Gonzales Prada N° 249</div>
    </div>
    <div class="flex justify-center">
      <div class="w-full max-w-[1200px] h-[458px] mt-4 rounded-lg overflow-hidden shadow-md bg-gray-100 flex items-center justify-center">
        <p class="text-gray-600">Mapa deshabilitado en desarrollo. Integra tu Google Maps o Leaflet aquí.</p>
      </div>
    </div>
  </div>
</section>
