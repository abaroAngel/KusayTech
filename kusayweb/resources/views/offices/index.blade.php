@extends('layouts.app')
@section('title','Oficinas | KUSAY TECH')
@section('content')
<x-container class="py-10" x-data="officesPage()" x-init="load()">
  <h1 class="text-2xl font-semibold mb-6">Oficinas</h1>

  <div class="grid md:grid-cols-2 gap-6">
    <template x-for="o in offices" :key="o.id">
      <div class="rounded border p-4">
        <div class="font-semibold text-lg" x-text="o.name"></div>
        <p class="text-sm" x-text="o.address"></p>
        <p class="text-sm" x-text="o.city"></p>
        <div class="mt-2 text-sm">
          <div><span class="font-medium">Teléfonos:</span> <span x-text="(o.phones_json||[]).join(', ')"></span></div>
          <div><span class="font-medium">Emails:</span> <span x-text="(o.emails_json||[]).join(', ')"></span></div>
        </div>
        <div class="mt-3 text-sm">
          <div class="font-medium">Horarios</div>
          <ul class="list-disc pl-5">
            <template x-for="h in o.hours" :key="h.id">
              <li x-text="`${['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'][h.day_of_week]}: ${h.start_time} - ${h.end_time}${h.label?(' ('+h.label+')'):''}`"></li>
            </template>
          </ul>
        </div>
      </div>
    </template>
  </div>

  <p class="mt-4 text-sm" x-text="msg"></p>
</x-container>

<script>
function officesPage(){
  return {
    offices:[], msg:'',
    async load(){
      const res = await fetch('/api/offices'); const data = await res.json();
      this.offices = Array.isArray(data) ? data : []; this.msg = !this.offices.length ? 'Sin oficinas.' : '';
    }
  }
}
</script>
@endsection
