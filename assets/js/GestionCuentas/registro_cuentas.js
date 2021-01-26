$(document).on('click', '#add', function(e) {
    e.preventDefault();

    var name = $("#name").val();
    var rut = $("#rut").val();
    var telefono = $("#telefono").val();
    var email = $("#email").val();
    var tipo = $("#tipo").val();
    var password = $("#password").val();
    var password_confirm = $("#password_confirm").val();
    alert(name);
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
            if (data.response == "success") {
                $('#exampleModal').modal('hide')
                $("#form")[0].reset();
                Command: toastr["success"](data.message)

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
            } else {
                Command: toastr["error"](data.message)

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
        }
    });

});

$("#form").reset();