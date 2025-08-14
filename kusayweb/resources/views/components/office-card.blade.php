@props([
    'name' => '',
    'city' => null,
    'address' => null,
    'phones' => [],           // array, json o string
    'emails' => [],           // array, json o string
    'lat' => null,
    'lng' => null,
    'mapEmbed' => null,       // opcional: HTML embed (iframe) si lo tuvieras
])

@php
    // Normalizar phones/emails (acepta array, json o string simple)
    $phonesNorm = $phones;
    if (is_string($phonesNorm)) {
        $phonesNorm = json_decode($phonesNorm, true);
        if (!is_array($phonesNorm)) $phonesNorm = array_filter([$phones]);
    }

    $emailsNorm = $emails;
    if (is_string($emailsNorm)) {
        $emailsNorm = json_decode($emailsNorm, true);
        if (!is_array($emailsNorm)) $emailsNorm = array_filter([$emails]);
    }

    // Construir URL de mapa
    $mapUrl = null;
    if ($lat && $lng) {
        $mapUrl = "https://www.google.com/maps?q={$lat},{$lng}";
    } elseif ($address) {
        $mapUrl = 'https://www.google.com/maps?q=' . urlencode($address);
    }
@endphp

<article {{ $attributes->class('rounded-xl border bg-white p-5 shadow-sm transition hover:shadow-md') }}>
    <header class="mb-3">
        <h3 class="text-lg font-semibold text-slate-900">{{ $name }}</h3>
        @if($city)
            <p class="text-sm text-slate-500">{{ $city }}</p>
        @endif
    </header>

    @if($address)
        <p class="mb-3 text-sm text-slate-700">
            <svg class="mr-2 inline size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 21s-6-5.686-6-10a6 6 0 1112 0c0 4.314-6 10-6 10z"/><circle cx="12" cy="11" r="2"/></svg>
            {{ $address }}
        </p>
    @endif

    @if(!empty($phonesNorm))
        <div class="mb-2 text-sm">
            <span class="font-medium text-slate-900">Teléfonos:</span>
            <ul class="mt-1 space-y-1">
                @foreach($phonesNorm as $k => $v)
                    @php $label = is_string($k) ? $k : ''; $val = is_array($phonesNorm) ? $v : $phonesNorm; @endphp
                    <li class="text-slate-700">
                        @if($label)<span class="text-slate-500">{{ $label }}:</span>@endif
                        <a href="tel:{{ preg_replace('/\s+/', '', $v) }}" class="underline hover:no-underline">{{ $v }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(!empty($emailsNorm))
        <div class="mb-3 text-sm">
            <span class="font-medium text-slate-900">Emails:</span>
            <ul class="mt-1 space-y-1">
                @foreach($emailsNorm as $k => $v)
                    @php $label = is_string($k) ? $k : ''; @endphp
                    <li class="text-slate-700">
                        @if($label)<span class="text-slate-500">{{ $label }}:</span>@endif
                        <a href="mailto:{{ $v }}" class="underline hover:no-underline">{{ $v }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($mapUrl)
        <div class="mt-4">
            <a href="{{ $mapUrl }}" target="_blank" rel="noopener"
               class="inline-flex items-center gap-2 rounded-md border px-3 py-2 text-sm hover:bg-slate-50">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 21s-6-5.686-6-10a6 6 0 1112 0c0 4.314-6 10-6 10z"/><circle cx="12" cy="11" r="2"/></svg>
                Ver en mapa
            </a>
        </div>
    @endif

    {{ $slot }}
</article>
