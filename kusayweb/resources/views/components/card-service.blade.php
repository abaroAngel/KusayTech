@props([
  'icon' => 'fa-circle-nodes',
  'title' => 'Título',
  'text' => 'Descripción',
  'link' => '#',
  'cta'  => 'Ver más',
  'class' => '',
])

<article {{ $attributes->merge([
  'class' => "rounded-xl border border-sky-200 bg-white p-6 shadow-sm hover:shadow-md transition $class"
]) }}>
  <div class="text-kusay-blue text-5xl mb-4">
    <i class="fa-solid {{ $icon }}"></i>
  </div>

  <h3 class="text-center font-bold text-kusay-blue">{{ $title }}</h3>
  <div class="mx-auto my-2 h-[2px] w-40 bg-sky-200"></div>

  <p class="text-center text-slate-700 text-sm">
    {{ $text }}
  </p>

  <div class="mt-4">
    <a href="{{ $link }}" class="block text-center rounded-lg bg-green-600 hover:bg-green-700 text-white font-bold py-2">
      ➜ {{ $cta }}
    </a>
  </div>
</article>
