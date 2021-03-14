function generarGraficoInicio() {
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ['Meses'],
			datasets: [{
				label: 'Total horas extras',
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

function checkAll(){
    var inputs = document.getElementById("estado_asistencia");
    if(inputs.checked == true) {
        alert("NO");
    }
}


$(document).on('click', '#guardar-asistencia', function(e) {
    var idpersonal = $('#rut').val().split(',')[0];
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
			idpersonal: idpersonal,
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
                window.location.href = base_url + "CAsistencia";
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

function setNombrePersonal(){
    var nombrepersonal =$('#rut').val().split(',')[1];
    var idpersonal = $('#rut').val().split(',')[0];
    document.getElementById("nombrecompleto").value = nombrepersonal;

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

//Llenar tabla con la asistencia completa
$(document).on('click', '#detalle_asistencia', function(e) {
    e.preventDefault();
    var idpersonal = $(this).parents('tr').find(".name-file").val();
    $.ajax({
        url: base_url+"CAsistencia/obtenerAsistenciaCompleta",
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

//Filtrar por horas extras
$(document).on('click', '#boton-filtrohorasextras', function(e) {
    e.preventDefault();
    var rutfiltro = $("#rutpersonal").val();
    var startDate = $('#date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var endDate = $('#date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
    $.ajax({
        url: base_url+"CAsistencia/obtenerHoraExtrasPersonal",
        type: "post",
        dataType: "json",
        data: {
            rut_personal: rutfiltro,
            fecha_inicio: startDate,
            fecha_fin: endDate
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                generarAvisoExitoso('Generando resultados!');
                $('#horas-extras').html(data.horas);
                generarGrafico();
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else if (data.response == "error") {
                generarAvisoError('Sin resultados');
            }
        }
    });
    
});

function generarGrafico(){
    var startDate = $('#date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
	var endDate = $('#date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
    var rutfiltro = $("#rutpersonal").val();
	$.ajax({
        url: base_url+"CAsistencia/obtenerEstadisticasHorasExtras",
        type: 'POST',
        dataType: 'json',
        data: {
            fecha_inicial: startDate,
            fecha_termino: endDate,
            rut_personal: rutfiltro,
        },
        success: function(response) {
            console.log(response);

            //parse
            var date = [];
            var mont = [];
            //Array para colores
            var bgColor = [];
            var bgBorder = [];

            for (var i = 0; i < response.length; i++)
            {
                //Colores
                var r = Math.random() * 255;
                r = Math.round(r);
                var g = Math.random() * 255;
                g = Math.round(g);
                var b = Math.random() * 255;
                b = Math.round(b);
                bgColor.push('rgba('+r+','+g+','+b+',0.2)');
                bgBorder.push('rgba('+r+','+g+','+b+',1)');
                mont.push(response[i]['total']);
				date.push(response[i]['mes']);
			}
            //Se remueve el chart para limpiarlo
            $('#myChart').remove();
            var midiv = document.createElement("canvas");
            midiv.setAttribute("id","myChart");
            midiv.setAttribute("style","width: 300px; height: 100px;");
            midiv.innerHTML = "";
            document.getElementById('gh').appendChild(midiv);

            ctx = document.getElementById('myChart');
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: date, //Columnas
                        datasets: [{
                            label:'TOTAL',
                            data: mont, //Datos para columnas
                            backgroundColor: bgColor,
                            borderColor: bgBorder,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Total horas extras'
                        },
                    scales: {
                        yAxes: [{
                        ticks: {
                            beginAtZero: true, 
                            scaleBeginAtZero : true, 
                        }
                        }]
                    }
                    }
                });
                $('#div_dias').removeClass('hidden');
        },
        error: function(error) {
            console.log(error);
        },
    });
}