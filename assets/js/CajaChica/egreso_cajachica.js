$(document).on('click', '#add', function(e) {
    e.preventDefault();
    var currentdate = new Date(); 
    var datetime = currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
    var fecha = $("#fechaegreso").val() + ' ' + datetime;
    var monto = $("#montoegreso").val();
    var destinatario = $("#destinatario").val();
    var detalle = $("#detalle").val();
    $.ajax({
        url: "egresoCajaChica",
        type: "post",
        dataType: "json",
        data: {
            montoegreso: monto,
            fechaegreso: fecha,
            destinatario: destinatario,
            detalle: detalle
        },
        success: function(data) {
            if (data.response == "success") {
                $('#exampleModal').modal('hide')
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
                location.reload();
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

$(document).on('click', '#back', function(e) {
    e.preventDefault();
    window.location.href = "MenuCaja";
});

function updateEgreso(){
    var monto = $("#monto-update").val();
    var fecha = $("#fecha-update").val();
    var destinatario = $("#destinatario-update").val();
    var detalle = $("#detalle-update").val();

    var iddestinatario =$('#id_egresoupdate').val().split(',')[1];
    var idreg = $('#id_egresoupdate').val().split(',')[0];
    $.ajax({
        url: "actualizarCajaChicaEgreso",
        type: "post",
        dataType: "json",
        data: {
            id_reg: idreg,
            id_destinatario: iddestinatario,
            fecha: fecha,
            monto: monto,
            destinatario: destinatario,
            detalle: detalle,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url + "Administracion/CajaEgreso";
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
}

function deleteRegEgreso(){
    var idreg = $('#id_egresodelete').val();
    $.ajax({
        url: "deleteCajaChicaEgreso",
        type: "post",
        dataType: "json",
        data: {
            id_reg: idreg,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url + "Administracion/CajaEgreso";
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
}