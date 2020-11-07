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
                fetch();
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

$(document).on('click', '#back', function(e) {

    e.preventDefault();
    window.location.href = "MenuCaja";
});

function generarCodigo(){
    var codigo = $("#tipo_trabajo").val();
    document.getElementById("codigo_servicio").value = codigo;

    $.ajax({
        url: "obtenerCodigoServicio",
        type: "post",
        dataType: "json",
        data: {
            codigo: codigo,
        },
        success: function(data) {
            if (data.response == "success") {
                
            } else {
               
                
            }
        }
    });
}


