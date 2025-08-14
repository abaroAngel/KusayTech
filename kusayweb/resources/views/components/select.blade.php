@props(['name','label'=>null])
<label class="block text-sm mb-1" for="{{ $name }}">{{ $label }}</label>
<select name="{{ $name }}" id="{{ $name }}"
  {{ $attributes->merge(['class'=>'w-full rounded border px-3 py-2 focus:outline-none focus:ring']) }}>
  {{ $slot }}
</select>
@error($name)<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
