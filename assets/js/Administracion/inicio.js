generarAlerta();
obtenerTareas();
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

function agregarTarea(){
    var tarea = $("#tareatxt").val();
    $.ajax({
        url: base_url+"Administracion/nuevaTarea",
        type: "post",
        dataType: "json",
        data: {
            tarea: tarea,
        },
        success: function(data) {
            if (data.response === "success") {
                generarAvisoExitoso(data.message);
                obtenerTareas();
            } else if(data.response === "error") {
                generarAvisoError(data.message);

            }
        }
    }); 
}


function obtenerTareas(){
    $.ajax({
        url: base_url+"Administracion/obtenerTareas",
        type: "post",
        dataType: "json",
        success: function(data) {
            if (data.response === "success") {
                $('#lista_tareas').empty();
                $('#lista_tareas').append(data.detalle);
            } else if(data.response === "error") {
                generarAvisoError(data.message);

            }
        }
    }); 
}

function updateTarea(check){
    var idtarea = $(check).attr('value');
    $.ajax({
        url: base_url+"Administracion/updateTarea",
        type: "post",
        dataType: "json",
        data: {
            idtarea: idtarea,
        },
        success: function(data) {
            if (data.response === "success") {
                generarAvisoExitoso(data.message);
                $('#lista_tareas').empty();
                obtenerTareas();
            } else if(data.response === "error") {
                generarAvisoError(data.message);

            }
        }
    }); 
}