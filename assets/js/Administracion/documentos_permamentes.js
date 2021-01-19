$("#listar").on('click', function(event) {
    $('#tabla_documentacion_permamente tbody').html('');
    var fecha = $('#fecha_filtro').val();
    var nombre = $('#nombre_filtro').val();

    $.post(base_url + "Documentacion/filtrarDocumentacionPermamente", {
            fecha: fecha,
            nombre: nombre,
        },
        function(data) {
            var obj = JSON.parse(data);
            var output = '';
            $.each(obj, function(i, item) {
                output +=
                    '<tr>' +
                    '   <td style="display:none;">' + item.iddocumentacion + '</td>' +
                    '   <td>' + item.nombre + '</td>' +
                    '   <td>' + item.fechasubida + '</td>' +
                    '   <td><button class="btn btn-primary btn-sm" id="detalle_trabajo" data-toggle="modal" data-target="#modal-detalle"><i class="far fa-eye"></i></button>' +
                    '       <button class="btn btn-info btn-sm" id="detalle_archivos" data-toggle="modal" data-target="#modal-archivos"><i class="fas fa-upload"></i></button>' +
                    '</tr>';
            });
            $('#tabla_documentacion_permamente tbody').append(output);
        });
});

$("#form-subir-archivos-permamente").submit(function(event) {
    event.preventDefault();
    var namedocumento = $("#nombre-documento").val();
    var formData = new FormData($("#form-subir-archivos-permamente")[0]);
    $.ajax({
        url: $("form").attr("action"),
        type: $("form").attr("method"),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            if (respuesta === "exito") {
                //$("#msg-error").hide();
                window.location.href = base_url + "Documentacion/Permamente";
                generarAvisoExitoso('Archivo subido correctamente!');
            } else if (respuesta === "error") {
                generarAvisoError('Error al subir el archivo');
            } else {
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