<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Visor 3D - {{ $stlfile->fileName }}</title>
  @vite(['resources/js/pages/stl-viewer-page.js'])
  <style>
    html, body { height: 100%; margin: 0; background: #111; }
    /* El contenedor será cuadrado, centrado, y ocupará el menor lado de la ventana */
    #stl-viewer {
      position: fixed; inset: 0;
      margin: auto;
      width: min(100vw, 100vh);
      height: min(100vw, 100vh);
    }
    /* Forzamos el canvas a llenar el contenedor cuadrado */
    #stl-viewer > canvas {
      width: 100% !important;
      height: 100% !important;
      display: block;
    }
  </style>
</head>
<body>
  <main id="stl-viewer" data-url="{{ $url }}"></main>

  <script type="module">
    import { initStlViewer } from '/resources/js/lib/stl-viewer.js';

    const el = document.getElementById('stl-viewer');
    const url = el.dataset.url;

    // Inicializa el visor
    const viewer = initStlViewer(el, url);

    // Como el contenedor ya es cuadrado y cambia con la ventana,
    // no necesitas más JS aquí: el módulo ajustará el renderer en resize.
  </script>
</body>
</html>
