generarGraficoCostosFijos();

var myChart;
var ctx;

function generarGraficoCostosFijos() {
    $.ajax({
        url: base_url + "Administracion/obtenerEstadisticasCostosFijos",
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            //parse
            var monto_current = [];
            var monto_last = [];

            var meses_current = [];
            var meses_last = [];
            for (var i = 0; i < response.length; i++) {
                meses_last.push(response[i]['meses_last']);
                meses_current.push(response[i]['meses_current']);

                monto_current.push(response[i]['monto_current']);
                monto_last.push(response[i]['monto_last']);
            }
            'use strict'
            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }
            var mode = 'index'
            var intersect = true
            var $salesChart = $('#sales-chart')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: meses_current,
                    datasets: [{
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data: monto_current
                        },
                        {
                            backgroundColor: '#ced4da',
                            borderColor: '#ced4da',
                            data: monto_last
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,

                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    if (value >= 1000) {
                                        value /= 1000
                                        value += 'k'
                                    }
                                    return '$' + value
                                }
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            });
        },
        error: function(error) {
            console.log(error);
        },
    });
}