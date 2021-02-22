$("#añadirnuevo-costo").on('click', function(event) {
    //$('#modal-nueva-orden').modal('hide');
    var valor = $("#valor").val();
    var fecha = $("#fecha").val();
    var idtipo = $("#tipocosto").val();
    var detalle = $("#detalle").val();
    $.ajax({
        url: base_url+"Administracion/registrarNuevoCostoFijo",
        type: "post",
        dataType: "json",
        data: {
            valor: valor,
            fecha: fecha,
            id_tipo: idtipo,
            detalle: detalle,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                window.location.href = "CostosFijos";
            } else if (data.response == "error") {
                generarAvisoError(data.message);
            }
        }
    });


});

$("#añadirnuevo-tipocosto").on('click', function(event) {
    var nombre = $("#nombretipocosto").val();
    $.ajax({
        url: base_url+"Administracion/registrarTipoCosto",
        type: "post",
        dataType: "json",
        data: {
            nombre: nombre,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                window.location.href = "CostosFijos";
            } else if (data.response == "error") {
                generarAvisoError(data.message);
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

function generarGraficoInicio() {
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Meses'],
			datasets: [{
				label: 'Total costos fijos',
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

//Click al boton generar grafico
$(document).on('click', '#boton-generargrafico', function(e) {
    var startDate = $('#date_range').data('daterangepicker').startDate.format('YYYY-MM-DD');
	var endDate = $('#date_range').data('daterangepicker').endDate.format('YYYY-MM-DD');
	$.ajax({
        url: base_url+"Administracion/graficarCostosFijos",
        type: 'POST',
        dataType: 'json',
        data: {
            fecha_inicial: startDate,
            fecha_termino: endDate,
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
                            text: 'Total costos fijos'
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
});

var nrocosto = 0;
function setIDCosto(table){
    var idcostofijo = table.parentNode.parentNode.cells[0].textContent;
    nrocosto = idcostofijo;
}


function deleteCostoFijo(){

    $.ajax({
        url: base_url+"Administracion/cambiarEstadoCostoFijo",
        type: "post",
        dataType: "json",
        data: {
            nro_costo: nrocosto,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                window.location.href =  base_url+"Administracion/CostosFijos";
            } else if (data.response == "error") {
                generarAvisoError(data.message);
            }
        }
    });
}