// Exponer jQuery globalmente para plugins que lo esperan
import $ from 'jquery';
window.$ = window.jQuery = $;

// DataTables (plugin jQuery) + estilos base
import 'datatables.net-dt';
import 'datatables.net-dt/css/dataTables.dataTables.css';

// Inicializa todas las tablas marcadas con la clase auxiliar
const initDataTables = (root = document) => {
  $(root)
    .find('.js-data-table')
    .each(function () {
      if ($.fn.dataTable.isDataTable(this)) {
        $(this).DataTable().destroy();
      }

      $(this).DataTable({
        pageLength: 25,
        responsive: true,
        // language: { url: '/lang/datatables/es-ES.json' } // opcional
      });
    });
};

// Primer render
document.addEventListener('DOMContentLoaded', () => initDataTables());

// Re-render después de navegaciones Livewire (wire:navigate)
document.addEventListener('livewire:navigated', () => initDataTables());
