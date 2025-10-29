<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
<x-layouts.app :title="__('Proyects stl')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h1>Proyectos Activos</h1>
            <flux:button href="{{ route('proyects.create') }}" icon="plus" color="primary" wire:navigate>
                {{ __('Crear Proyecto') }}
            </flux:button>
        </div>
        <div class="">
<el-dropdown class="inline-block">
  <button class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring-1 inset-ring-gray-300 hover:bg-gray-50 dark:bg-white/10 dark:text-white dark:shadow-none dark:inset-ring-white/5 dark:hover:bg-white/20">
    Filtros
    <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="-mr-1 size-5 text-gray-400">
      <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
    </svg>
  </button>
  <el-menu anchor="bottom end" popover class=" w-56 origin-top-right rounded-md bg-white shadow-lg outline-1 outline-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
    @if(true)
    <div class="block my-1 mx-1 ">Proximamente xD</div>
    @else
    <div class="py-1">
    <label class="block my-1 mx-1"><input type="checkbox" name="status" value="pendiente"  checked> pendiente</label>
    <label class="block my-1 mx-1"><input type="checkbox" name="status" value="completado" checked> completado</label>
    <label class="block my-1 mx-1"><input type="checkbox" name="status" value="cancelados" checked> cancelados</label>
    </div>
    @endif
  </el-menu>
</el-dropdown>
        </div>  
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <rectatangle class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            @if ($proyects->isEmpty())
                <div class="flex h-full flex-col items-center justify-center gap-4 p-4 text-center">
                    <flux:icon name="inbox" size="6xl" class="text-gray-400 dark:text-gray-600" />
                    <flux:heading size="lg" level="2">{{ __('No hay proyectos creados') }}</flux:heading>
                    <flux:subheading size="md" class="max-w-md">
                        {{ __('Aun no has agregado ningun proyecto. Empieza creando uno.') }}
                    </flux:subheading>
                    <flux:button href="{{ route('proyects.create') }}" icon="plus" color="primary" wire:navigate>
                        {{ __('Ingresar Proyecto') }}
                    </flux:button>
                </div>
            @else
                <div class="container">
                    <h2>Lista de Proyectos</h2>
                    <table class="js-data-table min-w-full border border-gray-700 rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-gray-300 uppercase text-sm tracking-wider">
                            <tr>
                                
                                <th class="px-6 py-3 text-left">Nombre</th>
                                <th class="px-6 py-3 text-left">Cliente</th>
                                <th class="px-6 py-3 text-left">Fecha Limite</th>
                                <th class="px-6 py-3 text-left">Ingresado Por</th>
                                <th class="px-6 py-3 text-left">Estado</th>
                                <th class="px-6 py-3 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach($proyects as $proyect)
                                <tr class="hover:bg-gray-800 transition-colors duration-150">
                                    
                                    <td class="px-6 py-3">{{ $proyect->name }}</td>
                                    <td class="px-6 py-3">{{ $proyect->customer ?? 'Sin cliente' }}</td>
                                    <td class="px-6 py-3">{{ $proyect->deadline ?? 'Sin cliente' }}</td>
                                    <td class="px-6 py-3">{{ $proyect->user->name ?? 'Desconocido' }}</td>
                                    <td class="px-6 py-3">
                                        <span id="statusdiv" class="inline-flex rounded-full px-3 py-1 text-xs font-semibold text-white">
                                            {{ ucfirst($proyect->status ?? 'desconocido') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-3 space-x-4">
                                        <a href="{{ route('proyects.edit', $proyect->id) }}" class="text-blue-500 hover:underline">Editar</a>
                                        <form action="{{ route('proyects.destroy', $proyect->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Estas seguro de que deseas eliminar este proyecto?')">
                                                Eliminar
                                            </button>
                                        </form>
                                        @if($proyect->status =='pendiente')
                                        <form action="{{ route('proyects.complete', $proyect->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-green-500 hover:underline" onclick="return confirm('Marcar este proyecto como completado?')">
                                                Completar
                                            </button>
                                        </form>
                                        @if ($proyect->status !='completado')
                                         <form action="{{ route('proyects.cancel', $proyect->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-red-700 hover:underline" onclick="return confirm('Marcar este proyecto como completado?')">
                                                Cancelar
                                            </button>
                                        </form>
                                        @endif
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const alert = document.getElementById('alert');
        if (alert) {
            setTimeout(() => alert.remove(), 3000);
        }
    });


    document.addEventListener('DOMContentLoaded', () => {
        const statusDivs = document.querySelectorAll('#statusdiv');
        statusDivs.forEach(div => {
            const status = div.textContent.trim().toLowerCase();
            if(status ==="completado")
            {
                div.classList.remove('bg-blue-600');
                div.classList.add('bg-green-600');
            }
            else if(status ==="cancelado")
            {
                div.classList.remove('bg-blue-600');
                div.classList.add('bg-red-600');
            }
            else if(status ==="pendiente")
            {
                div.classList.remove('bg-blue-600');
                div.classList.add('bg-yellow-600');
            }   
        });
    });
</script>
