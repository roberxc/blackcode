$(document).on('click', '#detalle_trabajo', function(e) {
    e.preventDefault();
    var codigoservicio = $(this).parents('tr').find(".name-file").val();
    $.ajax({
        url: base_url+"Operacion/obtenerPlanillaRealizada",
        type: "post",
        dataType: "json",
        data: {
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#detalle-trabajo').html(data.planilla);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });
});

$(document).on('click', '#detalle_archivos', function(e) {
    e.preventDefault();

    alert('asdasdads');

});

$(document).on('click', '#detalle_asistencia', function(e) {
    e.preventDefault();
    var codigoservicio = $(this).parents('tr').find(".name-file").val();
    $.ajax({
        url: base_url+"Operacion/obtenerAsistenciaPlanilla",
        type: "post",
        dataType: "json",
        data: {
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#asistencia-trabajo').html(data.planilla);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });

});


