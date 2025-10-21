<x-layouts.app :title="__('Proyects stl')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h1>Proyectos Activos</h1>
            <flux:button href="{{ route('proyects.create') }}" icon="plus" color="primary" wire:navigate>
                {{ __('Crear Proyecto') }}
            </flux:button>
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
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nombre</th>
                                <th class="px-6 py-3 text-left">Cliente</th>
                                <th class="px-6 py-3 text-left">Estado</th>
                                <th class="px-6 py-3 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach($proyects as $proyect)
                                <tr class="hover:bg-gray-800 transition-colors duration-150">
                                    <td class="px-6 py-3">{{ $proyect->id }}</td>
                                    <td class="px-6 py-3">{{ $proyect->name }}</td>
                                    <td class="px-6 py-3">{{ $proyect->customer ?? 'Sin cliente' }}</td>
                                    <td class="px-6 py-3">
                                        <span class="inline-flex rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white">
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
</script>
