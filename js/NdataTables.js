function actualizarContenido() {
    var table = $('#datos').DataTable();
    var data = table.rows().data();

    if (data.length === 0) {
        $('#datos tbody').html('<tr><td class="tabla__celda-none color5 center bold size2" colspan="1000000000">No existen registros en la tabla</td></tr>');
    }
}

// Llamar a la función cuando la página se carga por completo
$(document).ready(function() {
    var multiples = [];

    for (let i = 10; i <= 40; i++) {
        if (i % 10 === 0) {
            multiples.push(i);
        }
    }


    // Verificar si hay al menos una fila con datos en la tabla
    if ($('#datos tbody tr').length > 0) {
        
    // Generar dinámicamente los botones de ordenación en el encabezado
    $('#datos thead tr').find('td').each(function(index) {
        if (index < $('thead tr td').length - 1) { // Excluir la última columna (Acciones)
            var column = index; // Índice de la columna correspondiente
            if (column !== 0) { // Excluir la primera columna "No."
                column--; // Ajustar el índice de columna
            }
            // $(this).append('<button id="sort-asc" class="sort-asc" data-column="' + column + '">&#9650;</button>');
            // $(this).append('<button id="sort-desc" class="sort-desc" data-column="' + column + '">&#9660;</button>');
        }
    });
        var dataTable = $('#datos').DataTable({
            "searching": true,
            "paging": true,
            "ordering": true, // Activar el ordenamiento
            "orderMulti": false, // Habilitar el ordenamiento multi-columna
            "responsive": true, // Habilitar la compatibilidad con dispositivos móviles
            "order": [[0, 'asc']], // Ordenar por la primera columna (No.) de manera ascendente
            "lengthMenu": multiples,
            "language": {
                "lengthMenu": "Registros por página: _MENU_",
                "zeroRecords": "Ningún registro encontrado",
                "info": "",
                "infoEmpty": "",
                "infoFiltered": "",
                "search": "",
                "searchPlaceholder": "Buscar...",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "<<",
                    "last": ">>",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "drawCallback": function(settings) {
                actualizarContenido();
            }
            
        })  // Manejar clics en los botones de ordenación
        $(document).on('click', '.sort-asc', function() {
            var column = $(this).data('column');
            dataTable.order([column, 'asc']).draw();
        });

        $(document).on('click', '.sort-desc', function() {
            var column = $(this).data('column');
            dataTable.order([column, 'desc']).draw();
        });;

      

        actualizarContenido();
    } else {
        $('#datos tbody').html('<tr><td class="tabla__celda-none color5 center bold size2" colspan="1000000000">No existen registros en la tabla</td></tr>');
    }
});
