@extends('layouts.app')
@section('title','Checkout | KUSAY TECH')
@section('content')
<x-container class="py-10" x-data="checkoutPage()">
  <h1 class="text-2xl font-semibold mb-6">Checkout</h1>

  <form @submit.prevent="submit" class="grid md:grid-cols-2 gap-4">
    <div class="md:col-span-2"><h2 class="font-medium mb-2">Datos del cliente</h2></div>
    <x-input name="customer.name" label="Nombre *" x-model="f.customer.name"/>
    <x-input name="customer.email" type="email" label="Email *" x-model="f.customer.email"/>
    <x-input name="customer.phone" label="Teléfono" x-model="f.customer.phone"/>

    <div class="md:col-span-2 mt-4"><h2 class="font-medium mb-2">Facturación</h2></div>
    <x-input name="billing.ruc" label="RUC" x-model="f.billing.ruc"/>
    <x-input name="billing.company" label="Empresa" x-model="f.billing.company"/>
    <x-input name="billing.address" label="Dirección" x-model="f.billing.address" class="md:col-span-2"/>

    <div class="md:col-span-2 mt-4">
      <x-button :loading="loading"><span x-show="!loading">Crear orden</span><span x-show="loading">Procesando…</span></x-button>
      <p class="mt-3 text-sm" x-text="msg"></p>
      <template x-if="code">
        <div class="mt-2 text-sm">
          Orden <span class="font-mono" x-text="code"></span> creada por S/ <span x-text="total.toFixed(2)"></span>.
          <button class="underline ml-2" @click="createPayment">Crear intento de pago</button>
        </div>
      </template>
      <template x-if="paymentRef">
        <p class="mt-1 text-sm">Pago creado: <span class="font-mono" x-text="paymentRef"></span></p>
      </template>
    </div>
  </form>
</x-container>

<script>
function checkout(){
  return {
    code:'', paymentRef:'', msg:'',
    async createPayment(){
      const res = await fetch('/api/orders/'+this.code+'/payments',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify({ provider: 'Otro' })
      });
      const data = await res.json();
      if(res.ok){ this.paymentRef = data.provider_ref; this.msg='Intento de pago creado.'; }
      else { this.msg = data.message || 'No se pudo crear el pago.'; }
    }
  }
}
</script>

@endsection
