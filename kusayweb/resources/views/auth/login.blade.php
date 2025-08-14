@extends('layouts.app')

@section('title','Ingresar')

@section('content')
<x-container class="py-16">
  <div class="mx-auto max-w-md bg-white border rounded-xl shadow-sm p-6">
    <h1 class="text-2xl font-semibold mb-1">Bienvenido</h1>
    <p class="text-sm text-slate-500 mb-6">Accede con tu cuenta de administrador.</p>

    @if ($errors->any())
      <div class="mb-4 rounded border border-red-200 bg-red-50 p-3 text-sm text-red-700">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login.attempt') }}" class="space-y-4">
      @csrf
      <x-input name="email" type="email" label="Correo" placeholder="admin@kusaytech.com" value="{{ old('email') }}" />
      <x-input name="password" type="password" label="Contraseña" placeholder="••••••••" />
      <label class="inline-flex items-center gap-2 text-sm">
        <input type="checkbox" name="remember" class="rounded border-slate-300">
        <span>Recordarme</span>
      </label>
      <x-button class="w-full justify-center">Ingresar</x-button>
    </form>
  </div>
</x-container>
@endsection
