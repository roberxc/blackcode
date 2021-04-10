
function detalleProyecto(table){
    var idproyecto = table.parentNode.parentNode.cells[0].textContent;
    window.location.href = base_url+"Proyecto/Detalle/"+idproyecto;
}

function generarDataTableArchivos(table) {
    var idproyecto = table.parentNode.parentNode.cells[0].textContent;
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
var idreg = 0;
function setIDRegistro($idregistro){
    idreg = $idregistro;
}

function cambiarestadoProyecto(){
    var estadoproyecto = $("#estado_proyecto").val();
    $.ajax({
        url: base_url+"Proyecto/cambiarEstado",
        type: "post",
        dataType: "json",
        data: {
            id_proyecto: idreg,
            estado_proyecto: estadoproyecto,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                location.reload();
            } else if (data.response == "error") {
                generarAvisoError(data.message);
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