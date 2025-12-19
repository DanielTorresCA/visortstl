<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <h1>Filamentos</h1>
            <flux:button href="{{ route('printers.create') }}" icon="plus" color="primary" wire:navigate>
                {{ __('Crear Filamento') }}
            </flux:button>

        </div>
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <rectatangle class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            @if ($printers->isEmpty())
                <div class="flex h-full flex-col items-center justify-center gap-4 p-4 text-center">
                    <flux:icon name="inbox" size="6xl" class="text-gray-400 dark:text-gray-600" />
                    <flux:heading size="lg" level="2">{{ __('No hay Impresoras creadas') }}</flux:heading>
                    <flux:subheading size="md" class="max-w-md">
                        {{ __('Aún no has añadido ninguna impresora. Empieza creando una nueva impresora para organizar tus artículos.') }}
                    </flux:subheading>
                    <flux:button href="{{ route('printers.create') }}" icon="plus" color="primary" wire:navigate>
                        {{ __('Crear Impresora') }}
                    </flux:button>
                </div>
            @else
                <div class="container">

                    <table class="js-data-table min-w-full border border-gray-700 rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-gray-300 uppercase text-sm tracking-wider">
                            <tr>
                                <th class="px-6 py-3 text-left">Marca</th>
                                <th class="px-6 py-3 text-left">Modelo</th>
                                <th class="px-6 py-3 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach($printers as $printer)
                                <tr class="hover:bg-gray-800 transition-colors duration-150">
                                    <td class="px-6 py-3">{{ $printer->brand }}</td>
                                    <td class="px-6 py-3">{{ $printer->model }}</td>
                                    <td class="px-6 py-3">
                                        <a href="{{ route('printers.edit', $printer->id) }}"
                                            class="text-blue-500 hover:underline mr-4">Editar</a>
                                        <form action="{{ route('printers.destroy', $printer->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta impresora?')">Eliminar</button>
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