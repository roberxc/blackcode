function generarDataTableDetalleArchivos($idproyecto) {

    $('#estado_proyecto').dataTable().fnClearTable();
    $('#estado_proyecto').dataTable().fnDestroy();
    if ($idproyecto) {
        $('#estado_proyecto').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: base_url + "Proyecto/ObtenerArchivosEstadoProyecto/"+$idproyecto,
                type: "POST"
            },
            "columnDefs": [{
                "targets": [1, 2, 3,4],
                className: 'select-checkbox',
                targets:   0
            }],
            select: {
                style:    'os',
                selector: 'td:first-child'
            },
        });
    }
}

function generarTablaFotos($idproyecto) {
    $.ajax({
        url: base_url + "Proyecto/obtenerImagenesOperaciones",
        type: "post",
        dataType: "json",
        data: {
            id_proyecto: $idproyecto,
        },
        success: function(data) {
            if (data.response == "success") {
                $('#tabla-fotos').html(data.detalle);
            } else {

            }
        }
    });
}   

//Establecer la id del proyecto
function setIDProyecto($idproyecto){
    generarDataTableDetalleArchivos($idproyecto);
    generarTablaFotos($idproyecto);
}

//Establecer el tipo de archivo a descargar
function descargarArchivos(){
    document.getElementById("tipo-descarga").value = "3";

}

function descargarFactura(){
    document.getElementById("tipo-descarga").value = "4";
}


function generarAvisoError($mensaje) {
    Command: toastr["error"]($mensaje, 'Error')
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "2000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}

function generarAvisoExitoso($mensaje) {
    Command: toastr["success"]($mensaje, 'Correcto')
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}