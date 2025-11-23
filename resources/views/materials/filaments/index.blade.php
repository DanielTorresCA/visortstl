<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h1>Filamentos</h1>   
            <flux:button href="{{ route('filaments.create') }}" icon="plus" color="primary" wire:navigate>
                        {{ __('Crear Filamento') }}
                    </flux:button>
 
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <rectatangle class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" /> 
            @if ($filaments->isEmpty())
                <div class="flex h-full flex-col items-center justify-center gap-4 p-4 text-center">
                    <flux:icon name="inbox" size="6xl" class="text-gray-400 dark:text-gray-600" />
                    <flux:heading size="lg" level="2">{{ __('No hay filamentos creadas') }}</flux:heading>
                    <flux:subheading size="md" class="max-w-md">{{ __('Aún no has añadido ninguna filamento. Empieza creando una nueva categoría para organizar tus artículos.') }}</flux:subheading>
                    <flux:button href="{{ route('filaments.create') }}" icon="plus" color="primary" wire:navigate>
                        {{ __('Crear Filamento') }}
                    </flux:button>
                </div>
            @else
            <div class="container">
            
          <table class="js-data-table min-w-full border border-gray-700 rounded-lg overflow-hidden">
        <thead class="bg-gray-800 text-gray-300 uppercase text-sm tracking-wider">
            <tr>
                 <th class="px-6 py-3 text-left">Marca</th>
                <th class="px-6 py-3 text-left">Color</th>
                <th class="px-6 py-3 text-left">tipo</th>
                <th class="px-6 py-3 text-left">Peso Actual</th>
                <th class="px-6 py-3 text-left">Cantidad</th>
                <th class="px-6 py-3 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700">
            @foreach($filaments as $filament)
                <tr class="hover:bg-gray-800 transition-colors duration-150">
                    <td class="px-6 py-3">{{ $filament->brand }}</td>
                    <td class="px-6 py-3">{{ $filament->color }}</td>
                    <td class="px-6 py-3">{{ $filament->type }}</td>
                    <td class="px-6 py-3">{{ $filament->actualWeight }}</td>
                    <td class="px-6 py-3">{{ $filament->quantity}}</td>
                    
                    <td class="px-6 py-3">
                        <a href="{{ route('filaments.edit', $filament->id) }}" class="text-blue-500 hover:underline mr-4">Editar</a>
                        <form action="{{ route('filaments.destroy', $filament->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>
            </div>
            @endif

            </div> 
    </div>
</x-layouts.app>
