<x-layouts.app title="Editar categoría">
  <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
      <h1>Editar categoría</h1>
    </div>

    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
      <form action="{{ route('categories.update', $categoria) }}" method="POST" class="p-6 text-white">
        @csrf
        @method('PUT')

        {{-- Nombre --}}
        <div class="mb-4 flex flex-col">
          <label for="categoryName" class="text-lg mb-2">Nombre de la Categoría:</label>
          <input
            type="text"
            id="categoryName"
            name="categoryName"
            value="{{ old('categoryName', $categoria->categoryName) }}"
            class="w-full max-w-md rounded-md bg-white text-black px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
            required
          >
          @error('categoryName')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
          @enderror
        </div>

        {{-- Activo (opcional, si tu modelo lo tiene) --}}
        @isset($categoria->isActive)
        <div class="mb-6 flex items-center gap-3">
          <input
            id="isActive"
            type="checkbox"
            name="isActive"
            value="1"
            {{ old('isActive', $categoria->isActive) ? 'checked' : '' }}
            class="h-4 w-4 rounded border-gray-300 text-pink-600 focus:ring-pink-500"
          >
          <label for="isActive" class="text-base select-none">Activo</label>
        </div>
        @endisset

        <div class="flex items-center gap-3">
          <button type="submit" class="px-4 py-2 bg-pink-600 hover:bg-pink-700 rounded-md">
            Actualizar
          </button>
          <a href="{{ route('categories.index') }}" class="px-4 py-2 rounded-md border border-neutral-600 hover:bg-neutral-800">
            Cancelar
          </a>
        </div>
      </form>
    </div>
  </div>
</x-layouts.app>

