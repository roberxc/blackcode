$(document).on('click', '#addProyecto', function(e) {
    e.preventDefault();
    alert("llego");
    var nombreProyecto = $("#nombreProyecto").val();
    var fechaInicio = $("#fechaInicio").val();
    var fechaTermino = $("#fechaTermino").val();
    var monto = $("#monto").val();

    $.ajax({
        url: base_url + "Proyecto1/registroProyecto",
        type: "post",
        dataType: "json",
        data: {
            nombreProyecto: nombreProyecto,
            fechaInicio: fechaInicio,
            fechaTermino: fechaTermino,
            monto: monto,
            
        },
        success: function(data) {
            if (data.response == "success") {

                $("#formvehiculo")[0].reset();
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