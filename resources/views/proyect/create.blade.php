<x-layouts.app title="Crear Proyecto">
  <div class="p-6 border bg-transparent">
    <p class="text-4xl mb-6">Formulario de Creación de Proyecto</p>
    @if ($errors->any())
      <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
        <p class="font-bold">¡Ups! Algo salió mal:</p>
        <ul class="list-disc ml-5 mt-1">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('proyects.store') }}" method="POST" enctype="multipart/form-data"
      class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @csrf

      <div>
        <label class="block mb-1 font-medium">Nombre del Proyecto</label>
        <input name="name"
          class="w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500" />
      </div>

      <div>
        <label class="block mb-1 font-medium">Cliente</label>
        <input name="customer"
          class="w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500" />
      </div>

      <div>
        <label class="block mb-1 font-medium">Estado</label>
        <select name="status"
          class="w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500">
          <option value="pendiente">Pendiente</option>
          <option value="completado">Completado</option>
          <option value="cancelado">Cancelado</option>
        </select>
      </div>

      <div>
        <label class="block mb-1 font-medium">Fecha de entrega</label>
        <input type="date" name="deadline"
          class="w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500"
          min="2025-01-01" max="2025-12-31" />
      </div>

      <div>
        <label class="block mb-1 font-medium">Precio (USD)</label>
        <input type="number" name="price"
          class="w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500" />
      </div>

      <div>
        <label class="block mb-1 font-medium">Tiempo de impresión (Min)</label>
        <input type="number" name="printTime"
          class="w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500" />
      </div>

      <div>
        <label class="block mb-1 font-medium">Material Usado (gramos)</label>
        <input type="number" name="materialUsed"
          class="w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500" />
      </div>

      <div class="md:col-span-3">
        <label class="block mb-1 font-medium">Descripción</label>
        <textarea name="description" rows="3"
          class="w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500"></textarea>
      </div>

      <div>
        <label class="block mb-1 font-medium">Impresora usada</label>
        <select name="printer_id"
          class="w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500">
          @if ($printers->isEmpty())
            <option value="-1">No hay impresoras disponibles, agregue una impresora</option>
          @else
            @foreach ($printers as $printer)

              <option value="{{ $printer->id }}">{{ $printer->brand }} {{ $printer->model }}</option>
            @endforeach
          @endif
        </select>
      </div>
      <div>
        <label class="block mb-1 font-medium">Filamento Usado</label>
        <select name="filament_id"
          class="w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition placeholder:text-neutral-400 focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500">
          @if ($filaments->isEmpty())
            <option value="-1">No hay Filamentos disponibles, agregue un filamento</option>
          @else
            @foreach ($filaments as $filament)
              <option value="{{ $filament->id }}">{{ $filament->color }} {{ $filament->type }} {{ $filament->brand }}
              </option>
            @endforeach
          @endif
        </select>
      </div>

      <div class="md:col-span-3 flex justify-end mt-4">
        <button type="button" onclick="window.location='{{ route('proyects.index') }}'"
          class="mx-3 px-4 py-2 bg-red-500 hover:bg-red-700 rounded-md text-white font-medium">
          Cancelar
        </button>
        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md text-white font-medium">
          Guardar
        </button>
      </div>

    </form>
  </div>
</x-layouts.app>