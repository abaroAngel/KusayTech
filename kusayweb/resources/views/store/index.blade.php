@extends('layouts.app')
@section('title','Tienda Tech | KUSAY TECH')
@section('content')
<x-container>
  <h1 class="text-2xl font-semibold my-6">Tienda Tech</h1>

  <div x-data="catalog()" class="space-y-4">
    <div class="flex gap-3">
      <input class="border rounded px-3 py-2" placeholder="Buscar..." x-model="q">
      <button class="rounded bg-black text-white px-4 py-2" @click="load">Buscar</button>
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <template x-for="p in items" :key="p.id">
        <a class="rounded border p-4 block hover:shadow" :href="`/tienda/producto/${p.slug}`">
          <div class="aspect-[4/3] bg-slate-100 mb-3"></div>
          <div class="font-medium" x-text="p.name"></div>
          <div class="text-sm">S/ <span x-text="Number(p.price).toFixed(2)"></span></div>
        </a>
      </template>
    </div>

    <p x-text="msg" class="text-sm"></p>
  </div>
</x-container>

<script>
function catalog(){
  return {
    q:'', items:[], msg:'',
    async load(){
      const res = await fetch('/api/products?q='+encodeURIComponent(this.q));
      const data = await res.json();
      this.items = data.data || data; this.msg = !this.items.length ? 'No hay productos.' : '';
    }
  }
}
document.addEventListener('alpine:init', () => { document.querySelector('[x-data*=catalog]')?.__x?.load?.() })
</script>
@endsection
