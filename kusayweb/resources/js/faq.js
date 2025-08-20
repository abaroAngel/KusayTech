document.addEventListener('DOMContentLoaded', () => {
  const toggles = document.querySelectorAll('.faq-toggle');
  if (!toggles.length) return;

  toggles.forEach((btn) => {
    btn.addEventListener('click', () => {
      const panel = btn.parentElement.querySelector('.faq-panel');
      const icon = btn.querySelector('.faq-icon');
      const expanded = btn.getAttribute('aria-expanded') === 'true';

      // Cerrar otros
      document.querySelectorAll('.faq-panel').forEach(p => {
        if (p !== panel) {
          p.style.maxHeight = '0px';
          p.style.opacity = '0';
          p.style.transform = 'translateY(-0.5rem)';
          p.setAttribute('aria-hidden', 'true');
        }
      });
      document.querySelectorAll('.faq-toggle').forEach(b => {
        if (b !== btn) b.setAttribute('aria-expanded', 'false');
      });
      document.querySelectorAll('.faq-icon').forEach(i => {
        if (i !== icon) i.style.transform = 'rotate(0deg)';
      });

      // Toggle actual
      btn.setAttribute('aria-expanded', String(!expanded));
      if (expanded) {
        panel.style.maxHeight = '0px';
        panel.style.opacity = '0';
        panel.style.transform = 'translateY(-0.5rem)';
        panel.setAttribute('aria-hidden', 'true');
        icon.style.transform = 'rotate(0deg)';
      } else {
        panel.style.maxHeight = panel.scrollHeight + 'px';
        panel.style.opacity = '1';
        panel.style.transform = 'translateY(0)';
        panel.setAttribute('aria-hidden', 'false');
        icon.style.transform = 'rotate(45deg)';
      }
    });
  });
});
