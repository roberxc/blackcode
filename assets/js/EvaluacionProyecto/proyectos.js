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
var idpro = 0;
function setTablaEstado(idproyecto){
    idpro = idproyecto;
    $.ajax({
        url: base_url+"Proyecto/obtenerEstadoProyecto",
        type: "post",
        dataType: "json",
        data: {
            idproyecto: idproyecto,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#estado-proyecto').html(data.detalle);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });
}

function setEstadoProyecto(){
    var iditem = idpro;
    var estado = $('#estado_proyecto').val();
    $.ajax({
        url: base_url+"Proyecto/actualizarEstadoProyecto",
        type: "post",
        dataType: "json",
        data: {
            id_proyecto: iditem,
            estado: estado,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                location.reload();
            } else {
                
            }
        }
    });
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