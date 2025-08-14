@extends('layouts.app')
@section('title','Guía gratuita | KUSAY TECH')
@section('content')
<x-container class="py-10">
  <h1 class="text-2xl font-semibold mb-6">Descarga nuestra guía GRATIS</h1>

  <form x-data="guideForm()" @submit.prevent="submit" class="grid md:grid-cols-2 gap-4">
    <x-input name="ruc" label="RUC *" x-model="f.ruc"/>
    <x-input name="company" label="Empresa *" x-model="f.company"/>
    <x-input name="email" type="email" label="Email *" x-model="f.email"/>
    <div class="md:col-span-2">
      <label class="inline-flex items-center"><input type="checkbox" x-model="f.consent" class="mr-2"> Acepto políticas y términos.</label>
    </div>
    <div class="md:col-span-2">
      <x-button :loading="loading"><span x-show="!loading">Solicitar descarga</span><span x-show="loading">Enviando…</span></x-button>
      <p class="mt-3 text-sm" x-text="msg"></p>
      <template x-if="link"><a class="underline text-sm" :href="link">Descargar ahora</a></template>
    </div>
  </form>
</x-container>

<script>
function guideForm(){
  return {
    f:{ruc:'',company:'',email:'',consent:false}, loading:false, msg:'', link:'',
    async submit(){
      this.loading=true; this.msg=''; this.link='';
      const res = await fetch('/api/guide/download',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify(this.f)
      });
      const data = await res.json(); this.loading=false;
      if(res.ok){ this.msg='Revisa tu correo. También puedes usar este enlace:'; this.link=data.link; }
      else { this.msg=data.message||'Error.'; }
    }
  }
}
</script>

@endsection
