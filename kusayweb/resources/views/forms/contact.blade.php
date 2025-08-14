@extends('layouts.app')
@section('title','Contáctanos | KUSAY TECH')
@section('content')
<x-container>
  <h1 class="text-2xl font-semibold my-6">Contáctanos</h1>

  <form x-data="contactForm()" @submit.prevent="submit" class="grid md:grid-cols-2 gap-4">
    <x-input name="full_name" label="Nombres y Apellidos *" x-model="form.full_name"/>
    <x-input name="ruc" label="RUC *" x-model="form.ruc"/>
    <x-input name="company" label="Empresa *" x-model="form.company"/>
    <x-input name="role" label="Cargo" x-model="form.role"/>
    <x-input name="phone" label="Celular" x-model="form.phone"/>
    <x-input name="email" type="email" label="Email *" x-model="form.email"/>
    <div>
      <label class="block text-sm mb-1">Interesado en *</label>
      <select class="w-full rounded border px-3 py-2" x-model="form.interest">
        <option value="">Seleccionar</option>
        <option>ERP</option><option>Software</option><option>Marketing</option>
        <option>Tienda</option><option>Soporte</option>
      </select>
    </div>
    <div class="md:col-span-2">
      <x-textarea name="message" label="Descripción *" x-model="form.message"/>
      <label class="inline-flex items-center mt-3">
        <input type="checkbox" x-model="form.consent" class="mr-2"> Acepto políticas y términos.
      </label>
    </div>
    <div class="md:col-span-2">
      <button class="rounded bg-black text-white px-4 py-2" :disabled="loading">
        <span x-show="!loading">Enviar</span>
        <span x-show="loading">Enviando…</span>
      </button>
      <p class="mt-3 text-sm" x-text="msg"></p>
    </div>
  </form>
</x-container>

<script>
function contactForm(){
  return {
    loading:false,
    msg:'',
    form:{full_name:'',ruc:'',company:'',role:'',phone:'',email:'',interest:'',message:'',consent:false},
    async submit(){
      this.loading=true; this.msg='';
      const res = await fetch('/api/contact',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify(this.form)
      });
      const data = await res.json(); this.loading=false;
      this.msg = res.ok ? '¡Gracias! Te contactaremos.' : (data.message || 'Ocurrió un error.');
      if(res.ok){ this.form={full_name:'',ruc:'',company:'',role:'',phone:'',email:'',interest:'',message:'',consent:false}; }
    }
  }
}
</script>

@endsection
