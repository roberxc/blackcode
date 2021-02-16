generarAlerta();
function generarAlerta(){
    var estado = $('#estado-alerta').val();
    if(estado == 1){
        
        for (var i = 0; i < lista_nrodoc.length; i++){
            var obj = lista_nrodoc[i];
            for (var key in obj){
                var value = obj[key];
                generarAvisoError("El documento numero: " + value +" está a punto de expirar. Favor comprobar su validez inmediatamente");
            }
        }
    }

    
}

function generarAvisoError($mensaje) {
    Command: toastr["error"]($mensaje, 'Aviso')
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "5000",
        "hideDuration": "8000",
        "timeOut": "5000",
        "extendedTimeOut": "5000",
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