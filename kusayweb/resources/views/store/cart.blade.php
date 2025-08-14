@extends('layouts.app')
@section('title','Carrito | KUSAY TECH')
@section('content')
<x-container class="py-10" x-data="cartPage()" x-init="load()">
  <h1 class="text-2xl font-semibold mb-6">Carrito</h1>

  <div x-show="items.length" class="space-y-4">
    <template x-for="i in items" :key="i.id">
      <div class="flex items-center justify-between border rounded p-4">
        <div>
          <div class="font-medium" x-text="i.name"></div>
          <div class="text-sm">S/ <span x-text="i.unit_price.toFixed(2)"></span></div>
        </div>
        <div class="flex items-center gap-3">
          <input type="number" min="1" class="w-20 border rounded px-2 py-1" x-model.number="i.qty" @change="update(i)">
          <div class="w-24 text-right">S/ <span x-text="i.total.toFixed(2)"></span></div>
          <button class="text-red-600 underline" @click="remove(i)">Quitar</button>
        </div>
      </div>
    </template>

    <div class="text-right font-semibold text-lg">Subtotal: S/ <span x-text="subtotal.toFixed(2)"></span></div>

    <div class="text-right">
      <a href="{{ route('store.checkout') }}" class="rounded bg-black text-white px-4 py-2 inline-block">Ir a pagar</a>
      <button class="ml-2 underline" @click="clear()">Vaciar</button>
    </div>
  </div>

  <p x-show="!items.length">Tu carrito está vacío.</p>
  <p class="mt-3 text-sm" x-text="msg"></p>
</x-container>

<script>
function cart(){
  return {
    loading:false, cart:{items:[],subtotal:0}, msg:'',
    async load(){ const r=await fetch('/api/cart'); this.cart=await r.json(); },
    async update(i){
      const res = await fetch('/api/cart/items/'+i.id,{
        method:'PATCH',
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify({ qty: i.qty })
      });
      await this.load();
    },
    async remove(i){ await fetch('/api/cart/items/'+i.id,{method:'DELETE'}); await this.load(); },
    async clear(){ await fetch('/api/cart',{method:'DELETE'}); await this.load(); }
  }
}
document.addEventListener('alpine:init', () => { document.querySelector('[x-data*=cart]')?.__x?.load?.() })
</script>

@endsection
