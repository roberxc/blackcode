$("#añadir-proveedor").on('click', function(event) {
    var rut = $('#rut').val();
    var nombre = $('#nombre').val();
    var correo = $('#correo').val();
    var direccion = $('#direccion').val();
    var telefono = $('#telefono').val();
    var diascredito = $('#dias-credito').val();
    var comentario = $('#comentario').val();
    $.ajax({
        url: base_url+"Proveedores/ingresoProveedores",
        type: "post",
        dataType: "json",
        data: {
            rut: rut,
            nombre: nombre,
            correo: correo,
            direccion: direccion,
            telefono: telefono,
            diascredito: diascredito,
            comentario: comentario,
        },
        success: function(respuesta) {
            if (respuesta.response == "success") {
                window.location.href = "Proveedores";
                generarAvisoExitoso('Proveedor ingresada correctamente!');
            
            } else if (respuesta.response === "error") {

				generarAvisoError(respuesta.message);
                
            }else {
                //$("#msg-error").show();
                generarAvisoError(respuesta);
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