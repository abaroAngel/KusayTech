@extends('layouts.app')
@section('title','Libro de Reclamaciones | KUSAY TECH')
@section('content')
<x-container class="py-10" x-data="claimForm()">
  <h1 class="text-2xl font-semibold mb-6">Libro de Reclamaciones</h1>

  <form @submit.prevent="submit" class="grid md:grid-cols-2 gap-4">
    <x-select name="type" label="Tipo *" x-model="f.type">
      <option value="">Seleccionar</option>
      <option value="reclamo">Reclamo</option>
      <option value="queja">Queja</option>
    </x-select>

    <x-input name="consumer.name" label="Nombres y Apellidos *" x-model="f.consumer.name"/>
    <x-input name="consumer.document" label="Documento" x-model="f.consumer.document"/>
    <x-input name="consumer.email" type="email" label="Email *" x-model="f.consumer.email"/>
    <x-input name="consumer.phone" label="Teléfono" x-model="f.consumer.phone"/>
    <x-input name="consumer.address" label="Dirección" x-model="f.consumer.address"/>

    <div class="md:col-span-2 mt-4">
      <h2 class="font-medium mb-2">Producto/Servicio</h2>
    </div>
    <x-input name="product.description" label="Descripción *" x-model="f.product.description"/>
    <x-input name="product.amount" label="Monto (S/)" x-model="f.product.amount"/>
    <x-input name="product.date" label="Fecha (YYYY-MM-DD)" x-model="f.product.date"/>

    <div class="md:col-span-2">
      <x-textarea name="detail" label="Detalle del reclamo/queja *" x-model="f.detail" rows="5"/>
    </div>
    <div class="md:col-span-2">
      <x-textarea name="request_text" label="Pedido del consumidor *" x-model="f.request_text" rows="4"/>
    </div>

    <div class="md:col-span-2">
      <label class="block text-sm mb-1">Adjuntos (PDF/Imágenes)</label>
      <input type="file" multiple @change="handleFiles" class="w-full border rounded px-3 py-2">
      <p class="text-xs mt-1" x-text="`${files.length} archivo(s) seleccionado(s)`"></p>
    </div>

    <div class="md:col-span-2">
      <x-button :loading="loading"><span x-show="!loading">Registrar</span><span x-show="loading">Enviando…</span></x-button>
      <p class="mt-3 text-sm" x-text="msg"></p>
      <template x-if="code"><p class="mt-1 text-sm">Código: <span class="font-mono" x-text="code"></span></p></template>
    </div>
  </form>
</x-container>
<script>
function claimForm(){
  return {
    f:{
      type:'',
      consumer:{ name:'', document:'', email:'', phone:'', address:'' },
      product:{ description:'', amount:'', date:'' },
      detail:'',
      request_text:''
    },
    files:[], loading:false, msg:'', code:'',
    handleFiles(e){ this.files = [...e.target.files]; },
    async submit(){
      this.loading = true; this.msg=''; this.code='';
      const fd = new FormData();
      for (const [k,v] of Object.entries(this.f)) {
        if (typeof v === 'object') fd.append(k, JSON.stringify(v)); else fd.append(k, v);
      }
      this.files.forEach(f => fd.append('attachments[]', f));
      const res  = await fetch('/api/claims',{ method:'POST', body: fd });
      const data = await res.json(); this.loading=false;
      if(res.ok){ this.msg='Registrado correctamente.'; this.code=data.code; this.files=[]; }
      else { this.msg = data.message || 'Error al registrar.'; }
    }
  }
}
</script>

@endsection
