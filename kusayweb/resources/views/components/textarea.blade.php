@props(['name','label'=>null,'placeholder'=>null,'value'=>null,'rows'=>5])
<label class="block text-sm mb-1" for="{{ $name }}">{{ $label }}</label>
<textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}"
  {{ $attributes->merge(['class'=>'w-full rounded border px-3 py-2 focus:outline-none focus:ring']) }}
  placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
@error($name)<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
