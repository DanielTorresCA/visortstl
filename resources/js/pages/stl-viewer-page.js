// resources/js/pages/stl-viewer-page.js
import { initStlViewer } from '../lib/stl-viewer.js';

document.addEventListener('DOMContentLoaded', () => {
  const el = document.getElementById('stl-viewer');
  if (!el) return;

  // La URL del STL vendrá desde el Blade en data-url
  const url = el.dataset.url;
  initStlViewer(el, url);
});
