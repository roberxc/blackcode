function generarGraficoInicio() {
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado','Domingo'],
			datasets: [{
				label: 'PROMEDIO DE EGRESOS',
				data: [0,0,0,0,0,0,0],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
                xAxes: [{
                    barPercentage: 0.4,
                    categoryPercentage: 0.5
                  }],
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
        },legend: {
            display: false
        }
	});

}

generarGraficoInicio();

$(document).on('click', '#guardar-asistencia', function(e) {
	var rut = $("#rut").val();
	var nombrecompleto = $("#nombrecompleto").val();
	var fecha = $("#fecha").val();
    var horallegadam = $("#hora_llegadam").val();
	var horasalidam = $("#hora_salidam").val();
	var horallegadat = $("#hora_llegadat").val();
	var horasalidat = $("#hora_salidat").val();
	var estado = $("#estado_asistencia").val();
	alert(horallegadam);
	$.ajax({
        url: base_url+"Asistencia/ingresoAsistencia",
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

//Llenar tabla con la asistencia completa
$(document).on('click', '#detalle_asistencia', function(e) {
    e.preventDefault();
    var idpersonal = $(this).parents('tr').find(".name-file").val();
    $.ajax({
        url: base_url+"Asistencia/obtenerAsistenciaCompleta",
        type: "post",
        dataType: "json",
        data: {
            id_personal: idpersonal,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#asistencia-completa').html(data.planilla);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });

});