$(document).on('click', '#addcombustible', function(e) {
    e.preventDefault();

    var fecha = $("#fecha").val();
    var patente = $("#id_vehiculo").val();
    var conductor = $("#conductor").val();
    var estacion = $("#estacion").val();
    var litros = $("#litros").val();
    var valor = $("#valor").val();
    var doc_ad = $("#doc_ad").val();


    $.ajax({
        url: base_url + "Administracion/registroCombustible",
        type: "post",
        dataType: "json",
        data: {
            fecha: fecha,
            id_vehiculo: patente,
            conductor: conductor,
            estacion: estacion,
            litros: litros,
            valor: valor,
            doc_ad: doc_ad,


        },
        success: function(data) {
            if (data.response == "success") {

                $("#formcombustible")[0].reset();
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