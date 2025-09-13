document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('contact-form');
  if (!form) return;

  const showError = (input, msgSelector = '.form-error') => {
    const group = input.closest('div');
    if (!group) return;
    const err = group.querySelector(msgSelector);
    if (err) err.classList.remove('hidden');
    input.classList.add('ring-2', 'ring-red-400');
  };

  const clearError = (input, msgSelector = '.form-error') => {
    const group = input.closest('div');
    if (!group) return;
    const err = group.querySelector(msgSelector);
    if (err) err.classList.add('hidden');
    input.classList.remove('ring-2', 'ring-red-400');
  };

  form.addEventListener('submit', (e) => {
    e.preventDefault(); // UI only

    let valid = true;
    const requiredIds = ['fullName','ruc','cargo','phone','email','interest','about'];
    requiredIds.forEach(id => {
      const el = form.querySelector('#' + id);
      if (!el) return;

      if (!el.checkValidity()) {
        showError(el);
        valid = false;
      } else {
        clearError(el);
      }
    });

    const terms = document.getElementById('acceptTerms');
    const termsError = form.querySelector('[data-for="acceptTerms"]');
    if (!terms.checked) {
      termsError?.classList.remove('hidden');
      valid = false;
    } else {
      termsError?.classList.add('hidden');
    }

    const msg = document.getElementById('form-msg');
    if (valid) {
      msg.textContent = '¡Gracias! Tus datos están listos para enviarse (frontend OK).';
      msg.className = 'text-green-600';
    } else {
      msg.textContent = 'Por favor, corrige los campos marcados.';
      msg.className = 'text-red-600';
    }
    msg.classList.remove('hidden');
  });

  // Validación en vivo
  form.querySelectorAll('input, select, textarea').forEach(el => {
    el.addEventListener('input', () => {
      if (el.checkValidity()) clearError(el);
    });
  });
});
