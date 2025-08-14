@props(['name','type'=>'text','label'=>null,'placeholder'=>null,'value'=>null])
<label class="block text-sm mb-1" for="{{ $name }}">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
  value="{{ old($name, $value) }}"
  {{ $attributes->merge(['class'=>'w-full rounded border px-3 py-2 focus:outline-none focus:ring']) }}
  placeholder="{{ $placeholder }}">
@error($name)<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
