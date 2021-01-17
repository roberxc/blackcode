$(document).on('click', '#addvehiculo', function(e) {
    e.preventDefault();

    var patente = $("#patente").val();
    var modelo = $("#modelo").val();
    var marca = $("#marca").val();
    var color = $("#color").val();
    var ano = $("#ano").val();
    var tipomotor = $("#tipomotor").val();
    var gps = $("#gps").val();


    $.ajax({
        url: base_url + "Administracion/registroVehiculo",
        type: "post",
        dataType: "json",
        data: {
            patente: patente,
            modelo: modelo,
            marca: marca,
            color: color,
            ano: ano,
            tipomotor: tipomotor,
            gps: gps,

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