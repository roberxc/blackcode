$(document).on('click', '#add_Trabajador', function(e) {
    e.preventDefault();

    var name = $("#name").val();
    var rut = $("#rut").val();
    var telefono = $("#telefono").val();
    var email = $("#email").val();
    var cargo = $("#cargo").val();

    $.ajax({
        url: "registroPersonal",
        type: "post",
        dataType: "json",
        data: {
            name: name,
            rut: rut,
            telefono: telefono,
            email: email,
            cargo: cargo,
           
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