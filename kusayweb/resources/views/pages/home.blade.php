{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Inicio - KUSAY TECH')

@section('content')
  {{-- HERO con carrusel (Swiper) --}}
  <section class="relative w-full overflow-hidden bg-slate-50"
           role="region" aria-roledescription="carousel" aria-label="Hero principal">
    <div id="hero-carousel" class="swiper w-full h-[460px] sm:h-[520px] lg:h-[600px]">
      <div class="swiper-wrapper">
        {{-- Slide 1 --}}
        <div class="swiper-slide w-full h-full bg-cover bg-center flex items-center justify-center"
             style="background-image: url('{{ asset('assets/images/banners/banner01.png') }}');">
          <div class="text-center bg-[#FFEFAE]/90 px-6 py-8 rounded-lg shadow-lg">
            <img src="{{ asset('assets/kusay/logo.jpg') }}" alt="Logo Kusay Tech" class="mx-auto w-[120px] sm:w-[180px] mb-5">
            <h2 class="text-3xl md:text-5xl font-bold text-[#114795]">Soluciones tecnológicas</h2>
            <p class="mt-2 text-lg text-[#114795]">que optimizan tus operaciones y reducen costos</p>
          </div>
        </div>

        {{-- Slide 2 --}}
        <div class="swiper-slide w-full h-full bg-cover bg-center flex items-center justify-center"
             style="background-image: url('{{ asset('assets/images/banners/banner02.png') }}');">
          <div class="text-center bg-white/80 px-6 py-8 rounded-lg shadow-lg">
            <h2 class="text-3xl md:text-5xl font-bold text-kusay-blue">Transforma tu negocio</h2>
            <p class="mt-2 text-lg text-slate-800">con innovación, calidad y competitividad</p>
          </div>
        </div>

        {{-- Slide 3 --}}
        <div class="swiper-slide w-full h-full bg-cover bg-center flex items-center justify-center"
             style="background-image: url('{{ asset('assets/images/banners/banner03.png') }}');">
          <div class="text-center bg-kusay-blue/80 px-6 py-8 rounded-lg text-white shadow-lg">
            <h2 class="text-3xl md:text-5xl font-bold">ERP en la nube</h2>
            <p class="mt-2 text-lg">Gestión integral para empresas peruanas</p>
          </div>
        </div>
      </div>

      {{-- Controles --}}
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </section>

  {{-- Línea roja + valores (debajo del hero) --}}
  <div class="max-w-6xl mx-auto px-6">
    <div class="max-w-5xl mx-auto mt-6 border-t-4 border-red-600/80"></div>
    <div class="grid grid-cols-3 max-w-3xl mx-auto text-center mt-3">
      <p class="text-sm md:text-base font-bold text-red-700">INNOVACIÓN</p>
      <p class="text-sm md:text-base font-bold text-red-700">CALIDAD</p>
      <p class="text-sm md:text-base font-bold text-red-700">COMPETITIVIDAD</p>
    </div>
  </div>

  {{-- Encabezado sección empresa (como en tu referencia) --}}
  <section class="max-w-7xl mx-auto px-4 pt-8">
    <h3 class="text-center text-2xl md:text-3xl font-extrabold text-kusay-blue">
      KUSAY TECHNOLOGY - KUSAY TECH
    </h3>
    <p class="mt-3 text-center text-slate-700">
      “Empresa peruana que brinda e implementa
      <span class="font-bold text-kusay-blue">soluciones tecnológicas integrales y personalizadas</span>”
    </p>
  </section>

  {{-- PROPUESTA DE VALOR --}}
    <x-hero />

  {{-- CTA: GUÍA GRATUITA --}}

    <x-cta-guide />

  {{-- PRODUCTOS Y SERVICIOS --}}

    <x-products-grid />

  {{-- FAQS --}}
  <section class="max-w-7xl mx-auto px-4 py-12">
    <x-faq />
  </section>

  {{-- SEPARADOR --}}
  <div class="my-12 border-t border-kusay-blue"></div>

  {{-- CONTACTO --}}
  <section id="contacto" class="max-w-7xl mx-auto px-4 py-12">
    <x-contact />
  </section>
@endsection
