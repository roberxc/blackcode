var idingreso = 0;
function setIDIngreso(idingresoc){
    idingreso = idingresoc;
}

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
                generarAvisoExitoso(data.message);

                window.location.href = base_url + "Administracion/CajaIngreso";
            } else {
                generarAvisoError(data.message);
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
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
}

function deleteIngreso(){
    $.ajax({
        url: "deleteIngresoCajaChica",
        type: "post",
        dataType: "json",
        data: {
            id_ingreso: idingreso,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url + "Administracion/CajaIngreso";
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
}

function generarAvisoError($mensaje) {
    Command: toastr["error"]($mensaje, 'Error')
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

function generarAvisoExitoso($mensaje) {
    Command: toastr["success"]($mensaje, 'Correcto')
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
