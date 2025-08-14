@extends('layouts.app')

@section('title','Panel')

@section('content')
<x-container class="py-10">
  <div class="flex items-center justify-between mb-6">
    <div>
      <h1 class="text-2xl font-semibold">Panel</h1>
      <p class="text-sm text-slate-500">Hola, {{ auth()->user()->name }}.</p>
    </div>
    <div class="flex gap-3">
      <a href="{{ url('/admin') }}" class="inline-flex items-center gap-2 rounded border px-3 py-2 text-sm hover:bg-slate-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M3 3h7v7H3zM14 3h7v7h-7zM14 14h7v7h-7zM3 14h7v7H3z"/></svg>
        Admin
      </a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="inline-flex items-center gap-2 rounded bg-slate-900 text-white px-3 py-2 text-sm hover:bg-slate-800">
          Cerrar sesión
        </button>
      </form>
    </div>
  </div>

  {{-- KPIs --}}
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="rounded-lg border p-4">
      <p class="text-xs text-slate-500">Leads (hoy)</p>
      <p class="text-2xl font-semibold">{{ $stats['leadsToday'] }}</p>
    </div>
    <div class="rounded-lg border p-4">
      <p class="text-xs text-slate-500">Órdenes pendientes</p>
      <p class="text-2xl font-semibold">{{ $stats['ordersPending'] }}</p>
    </div>
    <div class="rounded-lg border p-4">
      <p class="text-xs text-slate-500">Productos</p>
      <p class="text-2xl font-semibold">{{ $stats['products'] }}</p>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
{{-- Órdenes recientes --}}
<div class="rounded-lg border">
  <div class="px-4 py-3 border-b font-medium">Órdenes recientes</div>
  <div class="divide-y">
    @forelse ($recentOrders as $o)
      <div class="px-4 py-3 text-sm flex items-center justify-between">
        <div>
          <div class="font-medium">#{{ $o->id }} · {{ ucfirst($o->status) }}</div>
          <div class="text-slate-500">{{ $o->customer_label ?? '—' }}</div>
        </div>
        <div class="text-right">
          <div>S/ {{ number_format($o->amount_value ?? 0, 2) }}</div>
          <div class="text-xs text-slate-500">{{ $o->created_at->format('Y-m-d H:i') }}</div>
        </div>
      </div>
    @empty
      <div class="px-4 py-8 text-center text-slate-500 text-sm">Sin registros</div>
    @endforelse
  </div>
</div>


    {{-- Leads recientes --}}
    <div class="rounded-lg border">
      <div class="px-4 py-3 border-b font-medium">Leads recientes</div>
      <div class="divide-y">
        @forelse ($recentLeads as $l)
          <div class="px-4 py-3 text-sm flex items-center justify-between">
            <div>
              <div class="font-medium">{{ $l->full_name }}</div>
              <div class="text-slate-500">{{ $l->company }} · {{ $l->interest }}</div>
            </div>
            <div class="text-xs text-slate-500">{{ $l->created_at->format('Y-m-d H:i') }}</div>
          </div>
        @empty
          <div class="px-4 py-8 text-center text-slate-500 text-sm">Sin registros</div>
        @endforelse
      </div>
    </div>
  </div>
</x-container>
@endsection
