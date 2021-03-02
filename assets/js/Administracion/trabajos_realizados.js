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
//Boton de descargar archivos
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

//Boton de horas extras
$(document).on('click', '#boton-horasextras', function(e) {
    e.preventDefault();
    var rutpersonal = $(this).parents('tr').find(".rutPersonal").val();
    document.getElementById("rut_filtro").value = rutpersonal;
    
});

//Filtrar por horas extras
$(document).on('click', '#boton-filtrohorasextras', function(e) {
    e.preventDefault();
    var rutfiltro = $("#rut_filtro").val();
    var startDate = $('#date_range').data('daterangepicker').startDate.format('DD-MM-YYYY');
    var endDate = $('#date_range').data('daterangepicker').endDate.format('DD-MM-YYYY');
    $.ajax({
        url: base_url+"Operacion/obtenerHoraExtrasPersonal",
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
                $('#horas-extras').html(data.horas);
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

function descargarDocumentoMateriales(){
    var iddoc = $("#doc-materialesdurante").val();
    window.location.href = base_url + "Operacion/descargarDocMaterialesDurante/"+iddoc;

}
