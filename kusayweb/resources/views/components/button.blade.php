@props(['loading'=>false])
<button {{ $attributes->merge(['class'=>'rounded bg-black text-white px-4 py-2 disabled:opacity-60']) }}
        @disabled($loading)>
  {{ $slot }}
</button>
