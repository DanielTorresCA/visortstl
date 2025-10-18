<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Visor 3D - {{ $stlfile->fileName }}</title>
  @vite(['resources/js/pages/stl-viewer-page.js'])
  <script src="https://cdn.tailwindcss.com"></script> {{-- opcional para estilos --}}
</head>
<body class="bg-gray-900 text-white flex flex-col h-screen">
  <header class="p-4 bg-gray-800 border-b border-gray-700 flex justify-between items-center">
    <h1 class="text-lg font-semibold">🔹 {{ $stlfile->fileName }}</h1>
    <a href="{{ url()->previous() }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
      ← Volver
    </a>
  </header>

  {{-- Contenedor del visor. data-url trae la URL del STL desde el controlador --}}
  <main id="stl-viewer" data-url="{{ $url }}" class="flex-1"></main>

  <style>
    /* Llenar alto de la ventana menos la cabecera (64px aprox) */
    #stl-viewer > canvas { width: 100% !important; height: calc(100vh - 64px) !important; display: block; }
  </style>
</body>
</html>
