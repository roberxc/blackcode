

function guardarAsistencia() {
    item_diasacumulados = [];
    $('input[id="diaslegales"]').each(function(){
         /* do something */ 
         item_diasacumulados.push($(this).val());
    });

    item_progresivos = [];
    $('input[id="diasprogresivos"]').each(function(){
         /* do something */ 
         item_progresivos.push($(this).val());
    });

    item_diasausar = [];
    $('input[id="diaspedidostable"]').each(function(){
        item_diasausar.push($(this).val());
    });

    var idpersonal = $("#rutpersonal").val();
    var fechatermino = $("#fecha_solicitud").val();

    $.ajax({
        url: base_url+"Vacaciones/ingresoVacaciones",
        type: "post",
        dataType: "json",
        data: {
			rut: idpersonal,
			diasusar: item_diasausar,
            diasprogresivos: item_progresivos,
			diasacumulados: item_diasacumulados,
            fecha_solicitud: fechatermino,
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

    var fechainicio= $("#fecha_contrato").val();
    var fechatermino = $("#fecha_solicitud").val();
    var diaspedidos = $("#diaspedidos").val();

    $.ajax({
        url: base_url+"Vacaciones/obtenerdetalleVacaciones",
        type: "post",
        dataType: "json",
        data: {
            rut_personal: rutfiltro,
            dias_pedidos: diaspedidos,
            fecha_contrato: fechainicio,
            fecha_solicitud: fechatermino
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

var nroreg = 0;
function setIDVacaciones(table){
    var idvacaciones = table.parentNode.parentNode.cells[0].textContent;
    nroreg= idvacaciones;
}

function deleteVacaciones(){

    $.ajax({
        url: base_url+"Vacaciones/deleteRegVacaciones",
        type: "post",
        dataType: "json",
        data: {
            id_vacaciones: nroreg,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                window.location.href =  base_url+"Vacaciones";
            } else if (data.response == "error") {
                generarAvisoError(data.message);
            }
        }
    });
}