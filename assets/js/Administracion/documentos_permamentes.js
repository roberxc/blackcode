function descargarDocumento(table){
    var iddocumento = table.parentNode.parentNode.cells[0].textContent;
    window.location.href = base_url + "Documentacion/download/"+iddocumento;
}

$("#form-subir-archivos-permamente").submit(function(event) {
    event.preventDefault();
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
                generarAvisoExitoso('Archivo subido correctamente!');
                window.location.href = base_url + "Documentacion/Permamente";
                
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