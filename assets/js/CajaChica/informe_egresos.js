var myChart;
var ctx;

function generarGrafico(){
    var startDate = $('#date_range').data('daterangepicker').startDate.format('DD-MM-YYYY');
	var endDate = $('#date_range').data('daterangepicker').endDate.format('DD-MM-YYYY');

	$.ajax({
        url: base_url+"Administracion/obtenerEstadisticasEgresos",
        type: 'POST',
        dataType: 'json',
        data: {
            'fecha_inicial': startDate,
            'fecha_termino': endDate
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
                mont.push(response[i]['monto']);
				date.push(response[i]['dia']);
			}


            //Se remueve el chart para limpiarlo
            $('#myChart').remove();
            var midiv = document.createElement("canvas");
            midiv.setAttribute("id","myChart");
            midiv.setAttribute("style","width: 300px; height: 300px;");
            midiv.innerHTML = "";
            document.getElementById('gh').appendChild(midiv);

            ctx = document.getElementById('myChart');
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: date,
                        datasets: [{
                            label:'TOTAL',
                            data: mont,
                            backgroundColor: bgColor,
                            borderColor: bgBorder,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'PROMEDIO DE EGRESOS'
                        },
                    tooltips: {
                        callbacks: {
                        label: function(t, d) {
                            var xLabel = d.datasets[t.datasetIndex].label;
                            var yLabel = t.yLabel >= 1000 ? '$' + t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : '$' + t.yLabel;
                            return xLabel + ': ' + yLabel;
                        }
                        }
                    },
                    scales: {
                        yAxes: [{
                        ticks: {
                            beginAtZero: true, 
                            scaleBeginAtZero : true, 
                            callback: function(value, index, values) {
                                if (parseInt(value) >= 1000) {
                                    return '$' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return '$' + value;
                                }
                            }
                            
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


$(document).on('click', '#filtrado', function (e) {
	e.preventDefault();
	generarGrafico();

});

function generarGraficoInicio() {
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
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