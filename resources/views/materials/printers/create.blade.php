<x-layouts.app title="Crear Impresora">
    <div class="p-6 border bg-transparent ">
        <p class="text-4xl mb-2">Formulario de Creacion de Impresoras</p>
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('printers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1">Modelo de la Impresora</label>
                <select name="brand"
                    class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm outline-none transition focus:border-white-500 focus:ring-2 focus:ring-white-500/30 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500">
                    <option value="" disabled selected>Selecciona una impresora...</option>
                    <option value="Creality">Creality (Ender, CR, K1)</option>
                    <option value="Bambu Lab">Bambu Lab</option>
                    <option value="Prusa">Prusa Research</option>
                    <option value="Anycubic">Anycubic</option>
                    <option value="Elegoo">Elegoo</option>
                    <option value="Artillery">Artillery</option>
                    <option value="Flashforge">Flashforge</option>
                    <option value="Sovol">Sovol</option>
                    <option value="Voron">Voron Design</option>
                    <option value="Qidi Tech">Qidi Tech</option>
                    <option value="Ultimaker">Ultimaker</option>
                    <option value="Raise3D">Raise3D</option>
                    <option value="Phrozen">Phrozen</option>
                    <option value="Formlabs">Formlabs</option>
                    <option value="Stratasys">Stratasys</option>
                    <option value="Snapmaker">Snapmaker</option>
                    <option value="Kingroon">Kingroon</option>
                    <option value="Two Trees">Two Trees</option>
                    <option value="Generica">Genérica / Custom / DIY</option>
                </select>
            </div>

            <div>
                <label class="block mb-1">Modelo de la Impresora</label>
                <input name="model" type="text" class="w-full max-w-md rounded-md border border-neutral-300 bg-white px-3 py-6 text-sm text-neutral-900
             shadow-sm outline-none transition
             placeholder:text-neutral-400
             focus:border-white-500 focus:ring-2 focus:ring-white-500/30
             dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-100 dark:placeholder-neutral-500"></input>
            </div>

            <button type="submit"
                class="mx-3 px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md text-white">Guardar</button>
            <button type="button" onclick="window.location='{{ route('filaments.index') }}'"
                class="mx-3 my-2 px-4 py-2 bg-red-600 hover:bg-red-700 rounded-md text-white">Cancelar</button>
        </form>
    </div>

</x-layouts.app>