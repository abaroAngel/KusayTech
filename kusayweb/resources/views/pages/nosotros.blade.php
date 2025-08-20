@extends('layouts.app')

@section('title', 'Nosotros - KUSAY TECH')

@section('content')
  <x-nosotros.hero />
  <x-nosotros.cultura />
  <x-nosotros.historia />
  <x-nosotros.valores />
  <x-nosotros.principios />
  <x-nosotros.organigrama />
  <x-nosotros.trabaja />

  {{-- Contacto (reutilizado) --}}
  <section id="contacto" class="max-w-7xl mx-auto px-4 py-12">
    <x-contact />
  </section>
@endsection
