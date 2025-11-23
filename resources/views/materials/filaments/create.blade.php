<x-layouts.app title="Crear Filamento">
  <div class="p-6 border bg-transparent ">
    <p class="text-4xl mb-2">Formulario de Creacion de Filamentos</p>
    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('filaments.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
       <div>
        <label class="block mb-1">Marca del Filamento</label>
        <input name="brand" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900
         shadow-sm outline-none transition
         placeholder:text-neutral-400
         focus:border-white-500 focus:ring-2 focus:ring-white-500/30
         dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500" />
      </div>
        <div>   
            <label class="block mb-1">Tipo de Filamento</label>
<select name="type" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500">
    <option value="" disabled selected>Selecciona un material...</option>
    
    <option value="PLA">PLA (Ácido Poliláctico)</option>
    <option value="PLA+">PLA+ / Tough PLA</option>
    <option value="PETG">PETG</option>
    <option value="ABS">ABS</option>
    <option value="ASA">ASA</option>
    
    <option value="TPU">TPU (Flexible)</option>
    <option value="TPE">TPE</option>
    
    <option value="Nylon">Nylon (PA)</option>
    <option value="PC">Policarbonato (PC)</option>
    <option value="HIPS">HIPS</option>
    <option value="PVA">PVA (Soluble)</option>
    <option value="PP">Polipropileno (PP)</option>
    
    <option value="Carbon Fiber">Fibra de Carbono</option>
    <option value="Wood">Madera / Wood</option>
    <option value="Metal Fill">Metal Fill</option>
    <option value="Glow">Glow in the Dark</option>
    <option value="Silk">Silk / Seda</option>
</select>
        </div>
        <div>   
            <label class="block mb-1">Peso inicial</label>
            <input name="startWeight" type="number" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-6 text-sm text-neutral-900
             shadow-sm outline-none transition
             placeholder:text-neutral-400
             focus:border-white-500 focus:ring-2 focus:ring-white-500/30
             dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500"></input>
        </div>  

        <div>   
            <label class="block mb-1">Color</label>
            <input name="color" type="text" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-6 text-sm text-neutral-900
             shadow-sm outline-none transition
             placeholder:text-neutral-400
             focus:border-white-500 focus:ring-2 focus:ring-white-500/30
             dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500"></input>
        </div>

        <div>   
            <label class="block mb-1">Cantidad</label>
            <input name="quantity" type="number" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-6 text-sm text-neutral-900
             shadow-sm outline-none transition
             placeholder:text-neutral-400
             focus:border-white-500 focus:ring-2 focus:ring-white-500/30
             dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500"></input>
        </div>  
      <button type="submit" class="mx-3 px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md text-white">Guardar</button>   
        <button type="button" onclick="window.location='{{ route('filaments.index') }}'" class="mx-3 my-2 px-4 py-2 bg-red-600 hover:bg-red-700 rounded-md text-white">Cancelar</button>
    </form>
  </div>
 
</x-layouts.app>
