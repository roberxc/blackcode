

function guardarAsistencia() {
    item_diasacumulados = [];
    $('#tabla_vacaciones').find("th.diaslegales").each(function(index,elem){
         /* do something */ 
         item_diasacumulados.push($(elem).text());
    });

    item_progresivos = [];
    $('#tabla_vacaciones').find("th.diasprogresivos").each(function(index,elem){
         /* do something */ 
         item_progresivos.push($(elem).text());
    });

    item_indemnizar = [];
    $('#tabla_vacaciones').find("th.diasindemnizar").each(function(index,elem){
         /* do something */ 
         item_indemnizar.push($(elem).text());
    });

    item_diasausar = [];
    $('#tabla_vacaciones').find("th.diaspedidos").each(function(index,elem){
         /* do something */ 
         item_diasausar.push($(elem).text());
    });

    var idpersonal = $("#rutpersonal").val();
    var fechatermino = $("#fecha_terminotrabajo").val();

    $.ajax({
        url: base_url+"Vacaciones/ingresoVacaciones",
        type: "post",
        dataType: "json",
        data: {
			rut: idpersonal,
			diasusar: item_diasausar,
			diasproporcionales: item_indemnizar,
            diasprogresivos: item_progresivos,
			diasacumulados: item_diasacumulados,
            fecha_terminotrabajo: fechatermino,
        },
        success: function(respuesta) {
            if (respuesta.response == "success") {
                // Add response in Modal body
                generarAvisoExitoso('Asistencia ingresada correctamente!');
                window.location.href = base_url + "Vacaciones";
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else if (respuesta.response === "error") {

				generarAvisoError(respuesta.message);
                
            }else {
                //$("#msg-error").show();
                generarAvisoError(respuesta);
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

//Filtrar por horas extras
$(document).on('click', '#boton-filtrodetallevacaciones', function(e) {
    e.preventDefault();
    var rutfiltro = $("#rutpersonal").val();

    var fechainicio= $("#fecha_iniciotrabajo").val();
    var fechatermino = $("#fecha_terminotrabajo").val();
    var diaspedidos = $("#diaspedidos").val();

    $.ajax({
        url: base_url+"Vacaciones/obtenerdetalleVacaciones",
        type: "post",
        dataType: "json",
        data: {
            rut_personal: rutfiltro,
            dias_pedidos: diaspedidos,
            fecha_iniciotrabajo: fechainicio,
            fecha_terminotrabajo: fechatermino
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                generarAvisoExitoso('Generando resultados!');
                $('#detalle-vacaciones').html(data.detalle);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else if (data.response == "error") {
                generarAvisoError('Sin resultados');
            }
        }
    });
});

