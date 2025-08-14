<x-section-title subtitle="Si tienes otra consulta, escríbenos y respondemos hoy.">
  Preguntas frecuentes
</x-section-title>

<div class="mt-6 grid gap-3">
  @forelse($faqs as $faq)
    <x-faq-item :q="$faq->question">
      {!! $faq->answer !!}
    </x-faq-item>
  @empty
    <p class="text-sm text-slate-500">Pronto publicaremos preguntas frecuentes.</p>
  @endforelse
</div>
