document.addEventListener("DOMContentLoaded", function () { 
    const tabla_archivo = document.getElementById("data-table");  
    const tabla_fotos = document.getElementById("tabla-fotos");     
    $(document).on('click', '#planos', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Planos';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Planos';
        document.getElementById("tipo-archivo").value = "8";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(8);
        generarDataTableArchivos(8);
    });
    
    $(document).on('click', '#fotos', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Fotos';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Fotos';
        document.getElementById("tipo-archivo").value = "3";
        generarAvisoExitoso("Directorio seleccionado");
        generarTablaFotos(3);
        //generarDataTableArchivos(3);
    });
    
    $(document).on('click', '#documentos-tecnicos', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Documentos tecnicos';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Documentos tecnicos';
        document.getElementById("tipo-archivo").value = "7";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(7);
        generarDataTableArchivos(7);
    });
    
    $(document).on('click', '#cotizaciones-proveedores', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Cotizaciones proveedores';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Cotizaciones proveedores';
        document.getElementById("tipo-archivo").value = "6";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(6);
        generarDataTableArchivos(6);
    });
    
    $(document).on('click', '#evaluacion-proyecto', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Evaluacion proyecto';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Evaluacion proyecto';
        document.getElementById("tipo-archivo").value = "5";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(5);
        generarDataTableArchivos(5);
    });
    
    $(document).on('click', '#cotizaciones-clientes', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Cotizaciones clientes';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Cotizaciones clientes';
        document.getElementById("tipo-archivo").value = "4";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(4);
        generarDataTableArchivos(4);
    });
    
    $(document).on('click', '#propuestas-tecnicas', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Propuestas tecnicas';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Propuestas tecnicas';
        document.getElementById("tipo-archivo").value = "2";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(2);
        generarDataTableArchivos(2);
    });
    
    $(document).on('click', '#antecedentes-tecnicos', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Antecedentes tecnicos';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Antecedentes tecnicos';
        document.getElementById("tipo-archivo").value = "1";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(1);
        generarDataTableArchivos(1);
    });
    
    $(document).on('click', '#click-modal-archivos', function(e) {
        e.preventDefault();
        var directorio = $('#tipo-archivo').val();
        if (directorio === "") {
            generarAvisoError("Selecciona un directorio primero");
        } else {
            $('#modal-archivos').modal('show');
        }
    });
    
    function generarTablaFotos($tipo) {
        tabla_archivo.style.display = "none";
        if (tabla_fotos.style.display === "none") {
            tabla_fotos.style.display = "block";
        } else {
            tabla_fotos.style.display = "none";
        }

        var idproyecto = $('#id_proyecto_dir').val();
        $.ajax({
            url: base_url + "Proyecto/obtenerDetalleFotos",
            type: "post",
            dataType: "json",
            data: {
                id_proyecto: idproyecto,
                id_directorio: $tipo,
            },
            success: function(data) {
                if (data.response == "success") {
                    $('#tabla-fotos').html(data.detalle);
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
        
    
    function buscarArchivos() {
        var directorio = $('#tipo-archivo').val();
        if (directorio) {
            var idproyecto = $('#id_proyecto_dir').val();
            var filtro_nombre = $('#filtro_nombre').val();
            $.ajax({
                url: base_url + "Proyecto/obtenerDetalleArchivos",
                type: "post",
                dataType: "json",
                data: {
                    id_proyecto: idproyecto,
                    id_directorio: directorio,
                    filtro_nombre: filtro_nombre
                },
                success: function(data) {
                    if (data.response == "success") {
                        $('#tabla-archivos').html(data.detalle);
                    } else {
    
                    }
                }
            });
        } else {
            generarAvisoError("Selecciona un directorio para comenzar la busqueda");
        }
    }
    
    function generarDataTableArchivos($directorio) {
        
        tabla_fotos.style.display = "none";
        tabla_archivo.style.display = "block";
        
    
        $('#administrador_archivos').dataTable().fnClearTable();
        $('#administrador_archivos').dataTable().fnDestroy();
        var idproyecto = $('#id_proyecto_dir').val();
        if ($directorio) {
            $('#administrador_archivos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: base_url + "AdministradorArchivos/"+$directorio+"/"+idproyecto,
                    type: "POST"
                },
                "columnDefs": [{
                    "targets": [1, 2, 3],
                    className: 'select-checkbox',
                    targets:   0
                }],
                select: {
                    style:    'os',
                    selector: 'td:first-child'
                },
            });
        }
    }
});

function subirArchivos() {
    $('#FormArchivos').ajaxForm({
        dataType: "json",
        beforeSubmit: function() {
            $("#progress-bar").width('0%');
        },

        uploadProgress: function(event, position, total, percentComplete) {
            $("#progress-bar").width(percentComplete + '%');
            $("#progress-bar").html('<div id="progress-status">' + percentComplete + ' %</div>')
        },
        
        success: function(data) {
            if (data.response == "success") {
                //$("#msg-error").hide();
                generarAvisoExitoso('Archivo subido correctamente!');
                location.reload();
            }
            else if(data.response == "error"){
                generarAvisoError(data.message);
            }
        },
        resetForm: false
    });
    return false;
}


function descargarArchivo(){
    var checkedRows = [];
    $(':checkbox:checked').closest('tr').each(function() {
        checkedRows.push(
          $(this).find('td:eq(1)').map(function() {
              return $(this).html();
          }).get()
        ); 
     });
    $.ajax({
        url: base_url + "Proyecto/descargarArchivos",
        type: "post",
        dataType: "json",
        data: {
            lista_archivos: checkedRows,
        },
        success: function(data) {
            if (data.response == "success") {
                alert("WENARDA")
            } else {

            }
        }
    });

}

function ordenFotos($tipo) {
    var idproyecto = $('#id_proyecto_dir').val();
    $.ajax({
        url: base_url + "Proyecto/ordenarFotosPorFecha",
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