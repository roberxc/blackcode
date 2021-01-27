$(document).on('click', '#addmantencion', function(e) {
    e.preventDefault();

    var fecha = $("#fecha").val();
    var id_vehiculo = $("#id_vehiculo").val();
    var kilometraje = $("#kilometraje").val();
    var servicio = $("#servicio").val();
    var id_personal = $("#id_personal").val();
    var mecanico = $("#mecanico").val();
    var taller = $("#taller").val();
    var detalle = $("#detalle").val();
    var doc_adj = $("#doc_adj").val();
    var total_m = $("#total_m").val();







    $.ajax({
        url: base_url + "Administracion/registroMantencion",
        type: "post",
        dataType: "json",
        data: {
            fecha: fecha,
            id_vehiculo: id_vehiculo,
            kilometraje: kilometraje,
            servicio: servicio,
            id_personal: id_personal,
            mecanico: mecanico,
            taller: taller,
            detalle: detalle,
            doc_adj: doc_adj,
            total_m: total_m,


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