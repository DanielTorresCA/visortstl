<x-layouts.app title="Crear Proyecto">
  <div class="p-6 border bg-transparent ">
    <p class="text-4xl mb-2">Formulario de Creacion de Proyecto</p>
    <form action="{{ route('proyects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
       <div>
        <label class="block mb-1">Nombre del Proyecto</label>
        <input name="name" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900
         shadow-sm outline-none transition
         placeholder:text-neutral-400
         focus:border-white-500 focus:ring-2 focus:ring-white-500/30
         dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500" />
      </div>
        <div>   
            <label class="block mb-1">Cliente</label>
            <input name="customer" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900
             shadow-sm outline-none transition
             placeholder:text-neutral-400
             focus:border-white-500 focus:ring-2 focus:ring-white-500/30
             dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500" /> 
        </div>
                <div>   
            <label class="block mb-1">Descripción</label>
            <textarea name="description" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-6 text-sm text-neutral-900
             shadow-sm outline-none transition
             placeholder:text-neutral-400
             focus:border-white-500 focus:ring-2 focus:ring-white-500/30
             dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500"></textarea>
        </div>
        <div>   
            <label class="block mb-1">Estado</label>
            <select name="status" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900
             shadow-sm outline-none transition
             placeholder:text-neutral-400
             focus:border-white-500 focus:ring-2 focus:ring-white-500/30
             dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500">
                <option value="activo">Pendiente</option>
                <option value="completado">Completado</option>
                <option value="cancelado">Cancelado</option>
            </select>
        </div>
        <div>
            <label class="block mb-1">Fecha de entrega</label>
        <input type="date" id="fecha" name="deadline" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900
             shadow-sm outline-none transition
             placeholder:text-neutral-400
             focus:border-white-500 focus:ring-2 focus:ring-white-500/30
             dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500"
       min="2025-01-01"
       max="2025-12-31"/>
        </div>
        <div> 
            <label class="block mb-1"> precio</label>
            <input type="number" name="price" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900
             shadow-sm outline-none transition
             placeholder:text-neutral-400
             focus:border-white-500 focus:ring-2 focus:ring-white-500/30
             dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500" />    
        </div>      
      <button class="mx-3 px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md text-white">Guardar</button>
    </form>
  </div>
</x-layouts.app>
