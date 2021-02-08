

$(document).on('click', '#guardar-asistencia', function(e) {
    var rut = $("#rut").val();
	var nombrecompleto = $("#nombrecompleto").val();
	var fecha = $("#fecha").val();
    var horallegadam = $("#hora_llegadam").val();
	var horasalidam = $("#hora_salidam").val();
	var horallegadat = $("#hora_llegadat").val();
    var horasalidat = $("#hora_salidat").val();
    
    var estado = 0;
    var inputs = document.getElementById("estado_asistencia");
    if(inputs.checked == true) {
        estado = 1;
    }else{
        estado = 0;
    }

    $.ajax({
        url: base_url+"CAsistencia/ingresoAsistencia",
        type: "post",
        dataType: "json",
        data: {
			rut: rut,
			nombrecompleto: nombrecompleto,
			fecha: fecha,
			horallegadam: horallegadam,
			horasalidam: horasalidam,
			horallegadat: horallegadat,
			horasalidat: horasalidat,
			estado: estado,
        },
        success: function(respuesta) {
            if (respuesta.response == "success") {
                // Add response in Modal body
                generarAvisoExitoso('Asistencia ingresada correctamente!');
                window.location.href = base_url + "Asistencia";
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
    
});

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
