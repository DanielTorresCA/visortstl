<div
  x-data
  x-show="$store.modal.isOpen"
  x-transition.opacity
  x-cloak
  class="fixed inset-0 z-[70]"  {{-- ⬅️ quitamos "hidden" --}}
>
  <div class="absolute inset-0 bg-black/60" @click="$store.modal.close()"></div>

  <div
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-title"
    class="relative mx-auto mt-20 w-[95%] max-w-lg rounded-2xl bg-white p-6 shadow-xl dark:bg-zinc-900"
    x-trap.noscroll.inert="$store.modal.isOpen"
  >
    <div class="flex items-center justify-between border-b pb-2 mb-4">
      <h2 id="modal-title" class="text-lg font-semibold" x-text="$store.modal.title"></h2>
      <button class="text-2xl leading-none text-gray-500 hover:text-gray-700" @click="$store.modal.close()">&times;</button>
    </div>

    <div class="space-y-3">
      <p class="text-sm text-gray-700 dark:text-gray-200">
        <span class="font-semibold">Archivo:</span>
        <span x-text="$store.modal.fileName"></span>
      </p>
      <p class="text-xs text-gray-500">Este es un modal normal hecho con Alpine.js + TailwindCSS.</p>
    </div>

    <div class="mt-6 flex justify-end gap-2">
      <button class="rounded-lg border px-4 py-2" @click="$store.modal.close()">Cerrar</button>
      <button class="rounded-lg bg-blue-600 px-4 py-2 text-white">Guardar</button>
    </div>
  </div>
</div>
