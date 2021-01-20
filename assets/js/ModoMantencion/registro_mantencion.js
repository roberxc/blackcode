$(document).on('click', '#addmantencion', function(e) {
    e.preventDefault();

    var fecha = $("#fecha").val();
    var patente = $("#patente").val();
    var kilometraje = $("#kilometraje").val();
    var servicio = $("#servicio").val();
    var encargado = $("#encargado").val();
    var nombremecanico = $("#nombremecanico").val();
    var taller = $("#taller").val();
    var detalle = $("#detalle").val();
    var documentoasociadomantencion = $("#documentoasociadomantencion").val();
    var totalmantencion = $("#totalmantencion").val();





    $.ajax({
        url: base_url + "Administracion/registroMantencion",
        type: "post",
        dataType: "json",
        data: {
            fecha: fecha,
            patente: patente,
            kilometraje: kilometraje,
            servicio: servicio,
            encargado: encargado,
            nombremecanico: nombremecanico,
            taller: taller,
            detalle: detalle,
            documentoasociadomantencion: documentoasociadomantencion,
            totalmantencion: totalmantencion,


        },
        success: function(data) {
            if (data.response == "success") {

                $("#formmantencion")[0].reset();
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