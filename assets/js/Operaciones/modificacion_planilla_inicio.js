$(document).on('click', '#validar-planillatrabajo', function(e) {
    e.preventDefault();
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();

    $.ajax({
        url: base_url+"PlantillaOperaciones/validarCodigoServicio",
        type: "post",
        dataType: "json",
        data: {
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"PlantillaOperaciones/ModificacionPlanilla/"+codigoservicio;
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
