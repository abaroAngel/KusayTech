@extends('layouts.app')
@section('title','Reporte de Conducta Antiética | KUSAY TECH')
@section('content')
<x-container class="py-10" x-data="ethicsForm()">
  <h1 class="text-2xl font-semibold mb-6">Reporte de Conducta Antiética</h1>

  <form @submit.prevent="submit" class="grid md:grid-cols-2 gap-4">
    <label class="inline-flex items-center mb-2 md:col-span-2">
      <input type="checkbox" x-model="f.is_anonymous" class="mr-2"> Enviar de manera anónima
    </label>

    <div class="md:col-span-2" x-show="!f.is_anonymous">
      <h2 class="font-medium mb-2">Tus datos</h2>
    </div>
    <div x-show="!f.is_anonymous">
      <x-input name="reporter.name" label="Nombre *" x-model="f.reporter.name"/>
    </div>
    <div x-show="!f.is_anonymous">
      <x-input name="reporter.email" type="email" label="Email *" x-model="f.reporter.email"/>
    </div>
    <div x-show="!f.is_anonymous" class="md:col-span-2">
      <x-input name="reporter.phone" label="Teléfono" x-model="f.reporter.phone"/>
    </div>

    <x-input name="subject" label="Asunto *" x-model="f.subject" class="md:col-span-2"/>
    <x-textarea name="detail" label="Detalle *" x-model="f.detail" rows="6" class="md:col-span-2"/>

    <x-select name="visibility_scope" label="Visibilidad interna" class="md:col-span-2" x-model="f.visibility_scope">
      <option value="compliance_only">Solo compliance</option>
      <option value="restricted">Restringido</option>
    </x-select>

    <div class="md:col-span-2">
      <label class="block text-sm mb-1">Adjuntos</label>
      <input type="file" multiple @change="handleFiles" class="w-full border rounded px-3 py-2">
      <p class="text-xs mt-1" x-text="`${files.length} archivo(s)`"></p>
    </div>

    <div class="md:col-span-2">
      <x-button :loading="loading"><span x-show="!loading">Enviar reporte</span><span x-show="loading">Enviando…</span></x-button>
      <p class="mt-3 text-sm" x-text="msg"></p>
      <template x-if="code"><p class="mt-1 text-sm">Código: <span class="font-mono" x-text="code"></span></p></template>
    </div>
  </form>
</x-container>

<script>
function ethicsForm(){
  return {
    f:{is_anonymous:true, reporter:{name:'',email:'',phone:''}, subject:'', detail:'', visibility_scope:'compliance_only'},
    files:[], loading:false, msg:'', code:'',
    handleFiles(e){ this.files=[...e.target.files]; },
    async submit(){
      this.loading=true; this.msg=''; this.code='';
      const fd=new FormData();
      fd.append('is_anonymous', this.f.is_anonymous ? 1 : 0);
      fd.append('subject', this.f.subject);
      fd.append('detail', this.f.detail);
      fd.append('visibility_scope', this.f.visibility_scope);
      if(!this.f.is_anonymous){ fd.append('reporter', JSON.stringify(this.f.reporter)); }
      this.files.forEach(f=>fd.append('attachments[]', f));
      const res = await fetch('/api/ethics',{method:'POST', body: fd});
      const data = await res.json(); this.loading=false;
      if(res.ok){ this.msg='Reporte registrado.'; this.code=data.code; this.files=[]; }
      else { this.msg = data.message || 'Error al registrar.'; }
    }
  }
}
</script>
@endsection
