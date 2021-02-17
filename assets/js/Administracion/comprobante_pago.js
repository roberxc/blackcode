$("#form-subir-documentopago").submit(function (event){
    event.preventDefault();
    var formData = new FormData($("#form-subir-documentopago")[0]);
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
                window.location.href = base_url+"ComprobantePago";
            } else if(data.response === "error") {
                generarAvisoError(data.message);

            }
        }
    });
});

function listaDocumentos (table) {
    var nrodocumento = table.parentNode.parentNode.cells[0].textContent;
    $.ajax({
        url: base_url+"ComprobantePago/detalleArchivos",
        type: "post",
        dataType: "json",
        data: {
            nrodocumento: nrodocumento,
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

}

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

