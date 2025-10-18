<x-layouts.app :title="__('Crear archivo STL')">
    <div class="mx-auto w-full max-w-3xl space-y-6 rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
                Crear archivo STL
            </h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Completa el formulario para subir un nuevo archivo STL al sistema.
            </p>
        </div>

        <form action="{{ route('stls.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @include('stlfile._form', ['stlfile' => new \App\Models\Stlfile(['isActive' => true])])

            <div class="flex items-center justify-end gap-3">
                <a href="{{ route('stls.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-800">
                    Cancelar
                </a>
                <button type="submit" class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
