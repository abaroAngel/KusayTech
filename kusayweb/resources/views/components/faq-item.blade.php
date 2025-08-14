@props([
    'q' => '',           // Pregunta (string)
    'a' => null,         // Respuesta (string|html) - si no viene, usa el slot
    'open' => false,     // Abierto por defecto
])

@php
    $isOpen = filter_var($open, FILTER_VALIDATE_BOOLEAN);
@endphp

<details {{ $isOpen ? 'open' : '' }}
    {{ $attributes->class('group rounded-lg border bg-white p-4 transition hover:shadow-sm') }}>
    <summary class="flex cursor-pointer list-none items-center justify-between gap-3">
        <h3 class="text-base font-medium text-slate-900">
            {{ $q }}
        </h3>
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 shrink-0 transition-transform group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M6 9l6 6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </summary>

    <div class="mt-3 text-sm leading-6 text-slate-600">
        @if(!is_null($a))
            {!! $a !!}
        @else
            {{ $slot }}
        @endif
    </div>
</details>
