<x-layouts.app title="crear categoria">
   <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h1>Categorias</h1>
            </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">   
       <form action="{{ route('categories.store') }}" method="POST" class="p-6  text-white">
    @csrf
    <div class="mb-4 flex flex-col">
        <label for="categoryName" class="text-lg mb-2">Nombre de la Categoría:</label>
        <input 
            type="text" 
            id="categoryName" 
            name="categoryName" 
            class="w-full max-w-md rounded-md bg-white text-black px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500" 
            required>
    </div>
    <button type="submit" class="px-4 py-2 bg-pink-600 hover:bg-pink-700 rounded-md">Guardar</button>
</form>
        </div>    
   </div>  
</x-layouts.app>