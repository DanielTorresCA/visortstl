{{-- resources/views/stlfile/create.blade.php --}}
<x-layouts.app title="Subir archivo STL">
  <div class="p-6 border bg-transparent ">
    <form action="{{ route('stls.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf

      <div>
        <label class="block mb-1">Nombre (opcional, si quieres mostrar algo distinto al original)</label>
        <input name="displayName" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900
         shadow-sm outline-none transition
         placeholder:text-neutral-400
         focus:border-white-500 focus:ring-2 focus:ring-white-500/30
         dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500" />
      </div>

      <div >
        <label class="block mb-1">Archivo STL</label>
          <div role="alert"
     class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900
         shadow-sm outline-none transition
         placeholder:text-neutral-400
         focus:border-white-500 focus:ring-2 focus:ring-white-500/30
         dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500">
        <input type="file" name="file" accept=".stl" required class="text-sm" />
        @error('file')
          <p class="mt-1 inline-flex items-center gap-2 rounded-md bg-red-500/15 px-3 py-1.5 text-sm font-medium text-red-300">{{ $message }}</p>
        @enderror
      </div>
      </div>

      <div>
        <label class="block mb-1">Categoría (opcional)</label>
        <select name="category_id" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900
         shadow-sm outline-none transition
         placeholder:text-neutral-400
         focus:border-white-500 focus:ring-2 focus:ring-white-500/30
         dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500">
          <option value="">Sin categoría</option>
          @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->categoryName }}</option>
          @endforeach
        </select>
      </div>

      <label class="inline-flex items-center gap-2">
        <input type="checkbox" name="isActive" value="1" checked class="h-4 w-4" />
        <span>Activo</span>
      </label>

      <button class="mx-3 px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md text-white">Guardar</button>
    </form>
  </div>
</x-layouts.app>
