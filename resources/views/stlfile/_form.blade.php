<div class="space-y-6">
    <div>
        <label for="fileName" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
            Nombre del archivo
        </label>
        <input
            id="fileName"
            name="fileName"
            type="text"
            value="{{ old('fileName', $stlfile->fileName ?? '') }}"
            class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100"
            required
        >
        @error('fileName')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
            Archivo STL
        </label>
        <input
            id="file"
            name="file"
            type="file"
            accept=".stl"
            class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:rounded-md file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 dark:text-gray-100 dark:file:bg-blue-500"
            {{ isset($stlfile) ? '' : 'required' }}
        >
        @error('file')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
        @isset($stlfile)
            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                Dejar en blanco para conservar el archivo actual.
            </p>
        @endisset
    </div>

    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
            Categoría
        </label>
        <select
            id="category_id"
            name="category_id"
            class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100"
            required
        >
            <option value="">Selecciona una categoría</option>
            @foreach($categories as $id => $name)
                <option value="{{ $id }}" @selected(old('category_id', $stlfile->category_id ?? '') == $id)>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-3">
        <input
            id="isActive"
            name="isActive"
            type="checkbox"
            value="1"
            @checked(old('isActive', $stlfile->isActive ?? true))
            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
        >
        <label for="isActive" class="text-sm text-gray-700 dark:text-gray-200">
            Archivo activo
        </label>
    </div>
</div>
