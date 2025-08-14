@extends('layouts.app')
@section('title','Producto | KUSAY TECH')
@section('content')
<x-container class="py-10" x-data="productShow('{{ $idOrSlug }}')" x-init="load()">
  <div class="grid md:grid-cols-2 gap-8">
    <div class="rounded bg-slate-100 aspect-[4/3]"></div>
    <div>
      <h1 class="text-2xl font-semibold" x-text="p.name"></h1>
      <p class="text-xl mt-2">S/ <span x-text="Number(p.price||0).toFixed(2)"></span></p>
      <p class="text-sm text-slate-600 mt-1" x-text="p.brand?.name"></p>
      <div class="mt-4 prose" x-html="p.description"></div>

      <div class="mt-6 flex gap-3 items-center">
        <input type="number" min="1" value="1" x-model.number="qty"
               class="w-24 border rounded px-3 py-2">
        <x-button @click="addToCart">Agregar al carrito</x-button>
        <span class="text-sm" x-text="msg"></span>
      </div>
    </div>
  </div>
</x-container>

<script>
function productShow(idOrSlug){
  return {
    p:{}, qty:1, msg:'',
    async load(){
      const res = await fetch('/api/products/'+idOrSlug);
      this.p = await res.json();
    },
    async addToCart(){
      const res = await fetch('/api/cart/items',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify({ product_id: this.p.id, qty: this.qty })
      });
      const data = await res.json();
      this.msg = res.ok ? 'Agregado.' : (data.message || 'Error');
    }
  }
}
</script>

@endsection
