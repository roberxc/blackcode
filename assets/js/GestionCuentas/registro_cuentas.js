$(document).on('click', '#add', function(e) {
    e.preventDefault();

    var name = $("#name").val();
    var rut = $("#rut").val();
    var telefono = $("#telefono").val();
    var email = $("#email").val();
    var tipo = $("#tipo").val();
    var password = $("#password").val();
    var password_confirm = $("#password_confirm").val();
    $.ajax({
        url: "registroCuentas",
        type: "post",
        dataType: "json",
        data: {
            name: name,
            rut: rut,
            telefono: telefono,
            email: email,
            tipo: tipo,
            password: password,
            password_confirm: password_confirm,
        },
        success: function(data) {
            console.log(data.response);
            if (data.response === "success") {
                generarAvisoExitoso(data.message);
                $("#form")[0].reset();
            } else if(data.response === "error") {
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

$("#form").reset();