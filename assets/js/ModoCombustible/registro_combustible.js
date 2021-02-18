$("#form-subir-formcombustible").submit(function (event){
    event.preventDefault();
    var formData = new FormData($("#form-subir-formcombustible")[0]);
    $.ajax({
        url:$("form").attr("action"),
        type:$("form").attr("method"),
        data:formData,
        dataType: "json",
        cache:false,
        contentType:false,
        processData:false,
        success:function(data){
            if (data.response === "success") {
                generarAvisoExitoso(data.message);
                $("#form-subir-formcombustible")[0].reset();
            } else if(data.response === "error") {
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