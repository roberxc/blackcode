$("#añadirnuevo-costo").on('click', function(event) {
    //$('#modal-nueva-orden').modal('hide');
    var valor = $("#valor").val();
    var fecha = $("#fecha").val();
    var idtipo = $("#tipocosto").val();
    var detalle = $("#detalle").val();
    $.ajax({
        url: base_url+"Administracion/registrarNuevoCostoFijo",
        type: "post",
        dataType: "json",
        data: {
            valor: valor,
            fecha: fecha,
            id_tipo: idtipo,
            detalle: detalle,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                window.location.href = "CostosFijos";
            } else if (data.response == "error") {
                generarAvisoError(data.message);
            }
        }
    });


});

$("#añadirnuevo-tipocosto").on('click', function(event) {
    var nombre = $("#tipocosto").val();
    $.ajax({
        url: base_url+"Administracion/registrarTipoCosto",
        type: "post",
        dataType: "json",
        data: {
            nombre: nombre,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                window.location.href = "CostosFijos";
            } else if (data.response == "error") {
                generarAvisoError(data.message);
            }
        }
    });


});



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