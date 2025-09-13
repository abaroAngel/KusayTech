@php
  // Usa el mismo arreglo $items del componente FAQ
@endphp
<script type="application/ld+json">
{
 "@context":"https://schema.org",
 "@type":"FAQPage",
 "mainEntity":[
  @foreach($items as $i => $item)
    {
      "@type":"Question",
      "name": @json($item['q']),
      "acceptedAnswer": {"@type":"Answer","text": @json($item['a'])}
    }@if(!$loop->last),@endif
  @endforeach
 ]
}
</script>
