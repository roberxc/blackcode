function detalleProyecto(idproyecto){
    window.location.href = base_url+"Proyecto/Detalle/"+idproyecto;
}

function generarDataTableArchivos(idproyecto) {
    $('#tabla_archivos').dataTable().fnClearTable();
    $('#tabla_archivos').dataTable().fnDestroy();
    $('#tabla_archivos').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: base_url + "Proyecto/ObtenerArchivosEstadoProyecto/"+idproyecto,
            type: "POST"
        },
        "columnDefs": [{
            "targets": [1, 2, 3],
            className: 'select-checkbox',
            targets:   0
        }],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
    });   
}