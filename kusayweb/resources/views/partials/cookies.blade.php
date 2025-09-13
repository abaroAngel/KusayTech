<div id="cookie-banner" class="fixed bottom-4 left-4 right-4 md:right-6 z-50 max-w-md p-4 rounded-lg shadow-lg bg-white border border-slate-200"
     role="dialog" aria-live="polite" aria-label="Preferencias de cookies" hidden>
  <p class="text-sm text-slate-800">Usamos cookies para analizar el tráfico y mejorar tu experiencia.</p>
  <div class="mt-3 flex gap-2">
    <button id="cookie-accept" class="px-3 py-2 rounded bg-green-600 text-white text-sm">Aceptar todas</button>
    <button id="cookie-reject" class="px-3 py-2 rounded bg-slate-200 text-slate-800 text-sm">Rechazar</button>
  </div>
  <p class="mt-2 text-xs">Más info en <a href="{{ url('/politicas-cookies') }}" class="underline">Políticas de Cookies</a>.</p>
</div>

@push('scripts')
<script defer>
(function(){
  const KEY='cookieConsentV2';
  const banner=document.getElementById('cookie-banner');
  if(!localStorage.getItem(KEY)) banner.hidden=false;
  function setConsent(ok){
    gtag('consent','update',{
      ad_storage: ok?'granted':'denied',
      ad_user_data: ok?'granted':'denied',
      ad_personalization: ok?'granted':'denied',
      analytics_storage: ok?'granted':'denied'
    });
    localStorage.setItem(KEY, ok?'all':'none');
    banner.hidden=true;
    window.dispatchEvent(new CustomEvent('cookies:accepted',{detail:{granted:ok}}));
  }
  document.getElementById('cookie-accept')?.addEventListener('click',()=>setConsent(true));
  document.getElementById('cookie-reject')?.addEventListener('click',()=>setConsent(false));
})();
</script>
@endpush
