{{-- resources/views/pages/search.blade.php --}}
@extends('layouts.app')

@section('title', 'Buscar | KUSAY TECH')
@section('meta_description', 'Resultados de búsqueda en KUSAY TECH.')

@push('head')
  <meta name="robots" content="noindex,follow">
@endpush

@section('content')
  <section class="max-w-7xl mx-auto px-4 py-10" aria-labelledby="search-title">
    <h1 id="search-title" class="text-2xl md:text-3xl font-bold text-kusay-blue mb-6">Resultados de búsqueda</h1>

    <form action="{{ route('search') }}" method="GET" role="search" class="mb-6 flex gap-2">
      <label for="q" class="sr-only">Buscar</label>
      <input id="q" name="q" value="{{ request('q') }}" type="search" placeholder="Buscar…"
             class="w-full border border-slate-300 rounded-md px-3 py-2" autocomplete="off">
      <button type="submit" class="px-4 py-2 rounded bg-kusay-blue text-white font-semibold">Buscar</button>
    </form>

    @php
      // Placeholder de resultados. Sustituye por tu lógica real.
      $query = trim((string)request('q'));
      $results = [];
    @endphp

    @if($query === '')
      <p class="text-slate-600">Escribe un término para comenzar.</p>
    @else
      @if(empty($results))
        <p class="text-slate-600">No se encontraron resultados para <strong>{{ e($query) }}</strong>.</p>
      @else
        <ul class="space-y-4">
          @foreach($results as $r)
            <li class="p-4 border rounded">
              <a href="{{ $r['url'] }}" class="text-kusay-blue font-semibold hover:underline">{{ $r['title'] }}</a>
              <p class="text-slate-700 text-sm">{{ $r['excerpt'] }}</p>
            </li>
          @endforeach
        </ul>
      @endif
    @endif
  </section>
@endsection
