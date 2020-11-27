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
    var codigoservicio = $(this).parents('tr').find(".name-file").val();
    $.ajax({
        url: base_url+"Operacion/DescargarArchivos",
        type: "post",
        dataType: "json",
        data: {
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#descargar-documento').html(data.planilla);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });

});

$(document).on('click', '#descargar', function(e) {
    e.preventDefault();
    var name = $(this).parents('tr').find(".nombreArchivo").val();
    alert (name);
    $.ajax({
        url: base_url+"Operacion/DescargarArchivos",
        type: "post",
        dataType: "json",
        data: {
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#descargar-documento').html(data.planilla);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });

});

$('#codigoservicio_filtro').keyup(function(){
    $('#tabla_trabajosrealizados tbody').html('');
    var text = $('#codigoservicio_filtro').val();

    $.post(base_url + "Administracion/obtenerTrabajosRealizadosPorCodigo",
        {texto : text},
        function(data){
            var obj = JSON.parse(data);
            var output = '';
            $.each(obj, function(i, item){
                output +=
                '<tr>' +
                '   <td><input type="text" value="'+item.CodigoServicio+'" class="form-control name-file" disabled/></td>' +
                '   <td>'+ item.FechaTrabajo+'</td>' +
                '   <td>'+ item.Proyecto+'</td>' +
                '   <td>'+ item.PersonalCargo+'</td>' +
                '   <td><button class="btn btn-primary btn-sm" id="detalle_trabajo" data-toggle="modal" data-target="#modal-detalle"><i class="far fa-eye"></i></button>'+
                '       <button class="btn btn-info btn-sm" id="detalle_archivos" data-toggle="modal" data-target="#modal-archivos"><i class="fas fa-upload"></i></button>'+
                '       <button class="btn btn-info btn-sm" id="detalle_asistencia" data-toggle="modal"data-target="#modal-asistencia"><i class="fas fa-book-open"></i></button></td>' +
                '</tr>';
            });
            $('#tabla_trabajosrealizados tbody').append(output);
        });

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

$(document).on('click', '#listar_trabajosrealizados', function(e) {
    e.preventDefault();
    var codigoservicio_filtro = $("#codigoservicio_filtro").val();
    var fecha = $("#fecha_filtro").val();
    alert('asdasdads');
    alert(fecha);
    alert(codigoservicio_filtro);

});


