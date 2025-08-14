@extends('layouts.app')
@section('title','Busca tu comprobante | KUSAY TECH')
@section('content')
<x-container>
  <h1 class="text-2xl font-semibold my-6">Busca tu comprobante</h1>

  <div x-data="voucherSearch()" class="space-y-4">
    <div class="grid md:grid-cols-5 gap-4">
      <x-input name="ruc_emisor" label="RUC Emisor" x-model="q.ruc_emisor"/>
      <x-input name="ruc_cliente" label="RUC Cliente" x-model="q.ruc_cliente"/>
      <x-input name="serie" label="Serie" x-model="q.serie"/>
      <x-input name="numero" label="Número" x-model="q.numero"/>
      <x-input name="fecha" label="Fecha (YYYY-MM-DD)" x-model="q.fecha"/>
    </div>
    <div>
      <button class="rounded bg-black text-white px-4 py-2" @click="search" :disabled="loading">Buscar</button>
    </div>

    <div x-show="results.length" class="overflow-x-auto">
      <table class="min-w-full text-sm">
        <thead><tr class="text-left border-b">
          <th class="py-2 pr-4">Documento</th>
          <th class="py-2 pr-4">Cliente</th>
          <th class="py-2 pr-4">Fecha</th>
          <th class="py-2 pr-4">Total</th>
          <th class="py-2 pr-4">Acciones</th>
        </tr></thead>
        <tbody>
          <template x-for="v in results" :key="v.id">
            <tr class="border-b">
              <td class="py-2 pr-4" x-text="`${v.tipo}-${v.serie}-${v.numero}`"></td>
              <td class="py-2 pr-4" x-text="v.razon_social || v.ruc_cliente"></td>
              <td class="py-2 pr-4" x-text="v.fecha_emision"></td>
              <td class="py-2 pr-4" x-text="`S/ ${v.total.toFixed(2)}`"></td>
              <td class="py-2 pr-4">
                <a :href="v.pdf_url" class="underline mr-3" x-show="v.pdf_url">PDF</a>
                <a :href="v.xml_url" class="underline" x-show="v.xml_url">XML</a>
              </td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>

    <p x-text="msg" class="text-sm"></p>
  </div>
</x-container>

<script>
function voucherSearch(){
  return {
    q:{ruc_emisor:'',ruc_cliente:'',serie:'',numero:'',fecha:''},
    results:[], msg:'', loading:false,
    async search(){
      this.loading=true; this.msg=''; this.results=[];
      const params = new URLSearchParams(this.q);
      const res = await fetch('/api/vouchers/search?'+params.toString());
      const data = await res.json(); this.loading=false;
      if(res.ok){ this.results=data.results; this.msg = data.count ? '' : 'No se encontraron comprobantes.'; }
      else { this.msg = data.message || 'Error en la búsqueda.'; }
    }
  }
}
</script>
@endsection
