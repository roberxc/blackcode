generarGraficoBalance();

function generarGraficoBalance() {
    $.ajax({
        url: base_url + "Proyecto/obtenerBalancePorProyecto",
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            //parse
            var balance = [];
            var proyectos = [];

            //Array para colores
            var bgColor = [];

            for (var i = 0; i < response.length; i++)
            {
                //Colores
                var r = Math.random() * 255;
                r = Math.round(r);
                var g = Math.random() * 255;
                g = Math.round(g);
                var b = Math.random() * 255;
                b = Math.round(b);
                bgColor.push('rgba('+r+','+g+','+b+',1)');
                balance.push(response[i]['balance']);
                proyectos.push(response[i]['proyecto']);
			}

            var donutData = {
                labels: proyectos,
                datasets: [{
                    data: balance,
                    backgroundColor: bgColor,
                }]
            }
            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

        },
        error: function(error) {
            console.log(error);
        },
    });
}