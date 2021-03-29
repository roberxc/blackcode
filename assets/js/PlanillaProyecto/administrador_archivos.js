$(document).on('click', '#planos', function(e) {
    e.preventDefault();
    document.getElementById("directorio-archivos").innerHTML = 'Archivos / Planos';
    document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Planos';
    document.getElementById("tipo-archivo").value = "8";
    generarAvisoExitoso("Directorio seleccionado");
    generarTablaArchivos(8);

});

$(document).on('click', '#fotos', function(e) {
    e.preventDefault();
    document.getElementById("directorio-archivos").innerHTML = 'Archivos / Fotos';
    document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Fotos';
    document.getElementById("tipo-archivo").value = "3";
    generarAvisoExitoso("Directorio seleccionado");
    generarTablaFotos(3);
});

$(document).on('click', '#documentos-tecnicos', function(e) {
    e.preventDefault();
    document.getElementById("directorio-archivos").innerHTML = 'Archivos / Documentos tecnicos';
    document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Documentos tecnicos';
    document.getElementById("tipo-archivo").value = "7";
    generarAvisoExitoso("Directorio seleccionado");
    generarTablaArchivos(7);
});

$(document).on('click', '#cotizaciones-proveedores', function(e) {
    e.preventDefault();
    document.getElementById("directorio-archivos").innerHTML = 'Archivos / Cotizaciones proveedores';
    document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Cotizaciones proveedores';
    document.getElementById("tipo-archivo").value = "6";
    generarAvisoExitoso("Directorio seleccionado");
    generarTablaArchivos(6);
});

$(document).on('click', '#evaluacion-proyecto', function(e) {
    e.preventDefault();
    document.getElementById("directorio-archivos").innerHTML = 'Archivos / Evaluacion proyecto';
    document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Evaluacion proyecto';
    document.getElementById("tipo-archivo").value = "5";
    generarAvisoExitoso("Directorio seleccionado");
    generarTablaArchivos(5);
});

$(document).on('click', '#cotizaciones-clientes', function(e) {
    e.preventDefault();
    document.getElementById("directorio-archivos").innerHTML = 'Archivos / Cotizaciones clientes';
    document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Cotizaciones clientes';
    document.getElementById("tipo-archivo").value = "4";
    generarAvisoExitoso("Directorio seleccionado");
    generarTablaArchivos(4);
});

$(document).on('click', '#propuestas-tecnicas', function(e) {
    e.preventDefault();
    document.getElementById("directorio-archivos").innerHTML = 'Archivos / Propuestas tecnicas';
    document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Propuestas tecnicas';
    document.getElementById("tipo-archivo").value = "2";
    generarAvisoExitoso("Directorio seleccionado");
    generarTablaArchivos(2);
});

$(document).on('click', '#antecedentes-tecnicos', function(e) {
    e.preventDefault();
    document.getElementById("directorio-archivos").innerHTML = 'Archivos / Antecedentes tecnicos';
    document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Antecedentes tecnicos';
    document.getElementById("tipo-archivo").value = "1";
    generarAvisoExitoso("Directorio seleccionado");
    generarTablaArchivos(1);
});

$(document).on('click', '#click-modal-archivos', function(e) {
    e.preventDefault();
    var directorio = $('#tipo-archivo').val();
    if(directorio === ""){
        generarAvisoError("Selecciona un directorio primero");
    }else{
        $('#modal-archivos').modal('show');
    }
});

function generarTablaArchivos($tipo){
    var idproyecto = $('#id_proyecto_dir').val();

    $.ajax({
        url: base_url+"Proyecto/obtenerDetalleArchivos",
        type: "post",
        dataType: "json",
        data: {
            id_proyecto: idproyecto,
            id_directorio: $tipo,
        },
        success: function(data) {
            if (data.response == "success") {
                $('#tabla-archivos').html(data.detalle);
            } else {
                
            }
        }
    });
}

function generarTablaFotos($tipo){
    var idproyecto = $('#id_proyecto_dir').val();
    $.ajax({
        url: base_url+"Proyecto/obtenerDetalleFotos",
        type: "post",
        dataType: "json",
        data: {
            id_proyecto: idproyecto,
            id_directorio: $tipo,
        },
        success: function(data) {
            if (data.response == "success") {
                $('#tabla-archivos').html(data.detalle);
            } else {
                
            }
        }
    });
}

function ordenFotos($tipo){
    var idproyecto = $('#id_proyecto_dir').val();
    $.ajax({
        url: base_url+"Proyecto/ordenarFotosPorFecha",
        type: "post",
        dataType: "json",
        data: {
            id_proyecto: idproyecto,
            tipo_orden: $tipo,
        },
        success: function(data) {
            if (data.response == "success") {
                $('#tabla-archivos').html(data.detalle);
            } else {
                
            }
        }
    });
}

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
