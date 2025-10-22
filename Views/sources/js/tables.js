$("#tablaAdmins").DataTable({
    responsive:true,
    pageLength:10,
    lengthMenu:[10,25,50,100],
    order:[[0,"desc"]],
    language:{
            // "decimal": "",
            // "emptyTable": "No hay datos disponibles en la tabla",
            // "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            // "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
            // "infoFiltered": "(filtrado de _MAX_ entradas totales)",
            // "lengthMenu": "Mostrar _MENU_ entradas",
            // "loadingRecords": "Cargando...",
            // "processing": "Procesando...",
            // "search": "Buscar:",
            // "zeroRecords": "No se encontraron registros coincidentes",
            // "paginate": {
            //     "first": "Primero",
            //     "last": "Último",
            //     "next": "Siguiente",
            //     "previous": "Anterior"
            // },

        "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
    },
    lengthChange:true,
    autoWidth:false,
    processing:true,
    // serverSide:true,
});