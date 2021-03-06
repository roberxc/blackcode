function descargarDocumento(table){
    var iddocumento = table.parentNode.parentNode.cells[0].textContent;
    window.location.href = base_url + "Documentacion/download/"+iddocumento;
}

$("#listar").on('click', function(event) {
    $('#tabla_documentacion_actualizable tbody').html('');
    var fecha = $('#fecha_filtro').val();
    var nombre = $('#nombre_filtro').val();

    $.post(base_url + "Documentacion/filtrarDocumentacionActualizable", {
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
                    '   <td>' + item.fechalimite + '</td>' +
                    '   <td><button class="btn btn-primary btn-sm" id="detalle_trabajo" data-toggle="modal" data-target="#modal-detalle"><i class="far fa-eye"></i></button>' +
                    '       <button class="btn btn-info btn-sm" id="detalle_archivos" data-toggle="modal" data-target="#modal-archivos"><i class="fas fa-upload"></i></button>' +
                    '</tr>';
            });
            $('#tabla_documentacion_actualizable tbody').append(output);
        });
});

//Actualizar documentacion actualizable
$("#form-update-archivos-actualizable").submit(function (event){
    event.preventDefault();
    var formData = new FormData($("#form-update-archivos-actualizable")[0]);
    $.ajax({
        url: base_url+"Upload/updateDocumentacionActualizable",
        type:$("form").attr("method"),
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta){
            if (respuesta==="exito") {
                //$("#msg-error").hide();
                window.location.href = base_url+"Documentacion/Actualizable";
                generarAvisoExitoso('Archivo actualizado correctamente!');
            }
            else if(respuesta==="error"){
                generarAvisoError('Error al subir el archivo');
            }
        }
    });
});

$("#form-subir-archivos-actualizable").submit(function (event){
    event.preventDefault();
    var formData = new FormData($("#form-subir-archivos-actualizable")[0]);
    $.ajax({
        url:$("form").attr("action"),
        type:$("form").attr("method"),
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta){
            if (respuesta==="exito") {
                //$("#msg-error").hide();
                window.location.href = base_url+"Documentacion/Actualizable";
                generarAvisoExitoso('Archivo subido correctamente!');
            }
            else if(respuesta==="error"){
                generarAvisoError('Error al subir el archivo');
            }
            else{
                //$("#msg-error").show();
                generarAvisoError(respuesta);
            }
        }
    });
});

function generarAvisoError($mensaje){
    Command: toastr["error"]($mensaje,'Error')
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

function generarAvisoExitoso($mensaje){
    Command: toastr["success"]($mensaje,'Correcto')
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

var iddoc = 0;

function setIdDocInput(table){
    var iditem = table.parentNode.parentNode.cells[0].textContent;
    return iditem;
}

function editarDocumento(table){
    var iditem = table.parentNode.parentNode.cells[0].textContent;
    document.getElementById('id-doc').value = setIdDocInput(table);

    $.ajax({
        url: base_url+"Documentacion/obtenerDetalleDocumento",
        type: "post",
        dataType: "json",
        data: {
            iditem: iditem,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#detalle-documentos').html(data.detalle);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });
}

var idreg = 0;

function setIDRegistro($idregistro){
    idreg = $idregistro;
}


function deleteRegDocumento(){
    $.ajax({
        url: base_url+"Documentacion/cambiarEstadoDocumento",
        type: "post",
        dataType: "json",
        data: {
            id_documento: idreg,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                location.reload();
            } else if (data.response == "error") {
                generarAvisoError(data.message);
            }
        }
    });
}