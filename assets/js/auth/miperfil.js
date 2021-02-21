$("#update-perfil").on('click', function(event) {
    var nombre = $('#nombre').val();
    var correo = $('#correo').val();
    var currentpassword = $('#currentpassword').val();
    var setpassword = $('#setpassword').val();
    var setpassword2 = $('#setpassword2').val();
    $.ajax({
        url: base_url+"Perfil/updatePerfil",
        type: "post",
        dataType: "json",
        data: {
            nombre: nombre,
            correo: correo,
            currentpassword: currentpassword,
            setpassword: setpassword,
            setpassword2: setpassword2,
        },
        success: function(respuesta) {
            if (respuesta.response == "success") {
                generarAvisoExitoso('Perfil actualizado correctamente!');
                window.location.href = "Perfil";
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
