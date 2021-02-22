$(document).on('click', '#add', function(e) {
    e.preventDefault();

    var currentdate = new Date(); 
    var datetime = currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();

    var monto = $("#montoingreso").val();
    var fecha = $("#fechaingreso").val() + ' ' + datetime;

    $.ajax({
        url: "ingresoCajaChica",
        type: "post",
        dataType: "json",
        data: {
            montoingreso: monto,
            fechaingreso: fecha,
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

                window.location.href = base_url + "Administracion/CajaIngreso";
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

function updateCajaChica(){
    var idcaja = $("#id_cajachica").val();
    var monto = $("#monto").val();
    var fecha = $("#fecha").val();
    $.ajax({
        url: "actualizarCajaChica",
        type: "post",
        dataType: "json",
        data: {
            id_caja: idcaja,
            fecha: fecha,
            monto: monto,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url + "Administracion/CajaIngreso";
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


