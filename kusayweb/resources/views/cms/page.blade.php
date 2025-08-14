@extends('layouts.app')
@section('title', $page->title)
@section('content')
<x-container class="py-10">
  <h1 class="text-3xl font-semibold mb-6">{{ $page->title }}</h1>

  @php $blocks = (array) ($page->content_json ?? []); @endphp

  @forelse($blocks as $block)
    @switch($block['type'] ?? 'text')
      @case('hero')
        <section class="rounded bg-slate-100 p-8 mb-8">
          <h2 class="text-2xl font-semibold">{{ $block['title'] ?? '' }}</h2>
          <p class="mt-2">{{ $block['subtitle'] ?? '' }}</p>
        </section>
      @break
      @case('list')
        <ul class="list-disc pl-6 space-y-1 mb-6">
          @foreach(($block['items'] ?? []) as $it)
            <li>{{ $it }}</li>
          @endforeach
        </ul>
      @break
      @default
        <div class="prose max-w-none mb-6">{!! nl2br(e($block['text'] ?? '')) !!}</div>
    @endswitch
  @empty
    <p>Contenido en preparación.</p>
  @endforelse
</x-container>
@endsection
