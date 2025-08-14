@extends('layouts.app')
@section('title','KUSAY TECH | Tu socio tecnológico')

@section('content')
  @include('home._hero', ['banners' => $banners ?? []])

  {{-- Valor sobre superficie blanca --}}
  <x-container class="py-12">
    @include('home._value', ['valueProps' => $valueProps ?? []])
  </x-container>

  {{-- Pilares + Guía sobre slate-50 para separar visualmente --}}
  <section class="bg-slate-50 py-12">
    <x-container>
      @include('home._pillars', ['pillars' => $pillars ?? []])
      @include('home._guide')
    </x-container>
  </section>

  {{-- Productos y servicios en blanco --}}
  <x-container class="py-12">
    @include('home._products_services')
  </x-container>

  {{-- FAQ en blanco para máxima legibilidad --}}
  <section class="bg-white py-12">
    <x-container>
      @include('home._faqs', ['faqs' => $faqs ?? []])
    </x-container>
  </section>
@endsection
