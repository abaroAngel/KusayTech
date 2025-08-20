{{-- resources/views/layouts/app.blade.php --}}
<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'KUSAY TECH - Soluciones Tecnológicas')</title>
  <meta name="description" content="Soluciones tecnológicas integrales: ERP en la nube, desarrollo de software, marketing digital y equipos tecnológicos. Transforma tu empresa hoy.">
  <meta name="keywords" content="KUSAY ERP, Software ERP, Gestión Empresarial, Inventario, Ventas, Facturación Electrónica, Contabilidad, Consignación, Perú, Puno">
  <meta name="author" content="KUSAY TECH S.A.C">
  <meta name="robots" content="index, follow">

  {{-- Open Graph --}}
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.kusaytech.com/">
  <meta property="og:title" content="KUSAY TECH">
  <meta property="og:description" content="Empresa dedicada al desarrollo de software, venta de equipos tecnológicos y soluciones ERP.">
  <meta property="og:image" content="/picture.img/erpkusay.png">

  {{-- Twitter --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="https://www.kusaytech.com/">
  <meta name="twitter:title" content="KUSAY TECH">
  <meta name="twitter:description" content="Empresa dedicada al desarrollo de software, venta de equipos tecnológicos y soluciones ERP.">
  <meta name="twitter:image" content="/picture.img/erpkusay.png">

  {{-- Canonical --}}
  <link rel="canonical" href="https://www.kusaytech.com/">

  {{-- Favicon --}}
  <link rel="icon" href="/assets/icons/KkUSAY.svg" type="image/svg+xml">

  {{-- Google Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  {{-- Font Awesome --}}
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- Google Tag Manager --}}
  <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WF29H269');
  </script>

  {{-- JSON-LD Speakable (evitar parse de Blade) --}}
  @verbatim
  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"WebPage",
    "name":"Kusay Tech | Nosotros",
    "description":"KUSAY TECH es una empresa peruana que ofrece soluciones tecnológicas integrales y personalizadas para destacar en mercados competitivos.",
    "speakable":{
      "@type":"SpeakableSpecification",
      "cssSelector":[".speakable-title-nosotros",".speakable-value-title"],
      "xPath":[
        "//h2[contains(translate(text(), 'ÁÉÍÓÚÜÑA-Z', 'aeiouuna-z'), 'nuestros valores corporativos')]",
        "//h3[contains(translate(text(), 'ÁÉÍÓÚÜÑA-Z', 'aeiouuna-z'), 'innovacion')]"
      ]
    }
  }
  </script>
  @endverbatim

  {{-- JSON-LD Website (evitar parse de Blade) --}}
  @verbatim
  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":["WebSite","WebPage"],
    "name":"KUSAY TECH",
    "url":"https://www.kusaytech.com",
    "description":"Empresa que brinda e implementa soluciones tecnológicas integrales para fortalecer tu ventaja competitiva en mercados exigentes",
    "inLanguage":"es",
    "provider":{
      "@type":"Corporation",
      "name":"KUSAY TECH",
      "legalName":"KUSAY TECHNOLOGY S.A.C",
      "taxID":"20611741732",
      "url":"https://www.kusaytech.com",
      "logo":{"@type":"ImageObject","url":"https://www.kusaytech.com/logo.png","width":180,"height":75},
      "foundingDate":"2023-11-23",
      "founders":[{"@type":"Person","name":"Ruswen Zurita","jobTitle":"CEO"}],
      "areaServed":{"@type":"Continent","name":"América"},
      "address":{
        "@type":"PostalAddress",
        "streetAddress":"Jr. Gonzales Prada Nro 249",
        "addressLocality":"Juliaca",
        "addressRegion":"Puno",
        "addressCountry":"PE",
        "postalCode":"21001"
      },
      "contactPoint":[{
        "@type":"ContactPoint",
        "contactType":"Ventas",
        "telephone":"+51967928806",
        "email":"ventas@kusaytech.com",
        "availableLanguage":["Spanish","English"],
        "hoursAvailable":{
          "@type":"OpeningHoursSpecification",
          "dayOfWeek":["Monday","Tuesday","Wednesday","Thursday","Friday"],
          "opens":"08:00",
          "closes":"18:00"
        }
      }]
    }
  }
  </script>
  @endverbatim

  {{-- Vite (Tailwind + JS) --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  {{-- Swiper (para carrusel del hero) --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

  @stack('head') {{-- por si alguna vista empuja estilos/etiquetas extra --}}
</head>
<body class="bg-white text-gray-900 antialiased">
  {{-- GTM noscript --}}
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WF29H269"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>

  <div id="app" class="min-h-dvh flex flex-col">
    {{-- Header / Navbar --}}
    @includeIf('partials.navbar')

    {{-- Contenido --}}
    <main class="flex-1">
      @yield('content')
    </main>

    {{-- Footer --}}
    <x-footer />
  </div>

  {{-- Swiper JS + init seguro (sólo si existe #hero-carousel) --}}
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var el = document.querySelector('#hero-carousel');
      if (el) {
        // Evitar doble init
        if (!el.dataset.inited) {
          new Swiper('#hero-carousel', {
            loop: true,
            autoplay: { delay: 5000 },
            pagination: { el: '.swiper-pagination', clickable: true },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }
          });
          el.dataset.inited = '1';
        }
      }
    });
  </script>

  @stack('scripts') {{-- para scripts adicionales por página --}}
</body>
</html>
