document.addEventListener("DOMContentLoaded", function () { 
    const tabla_archivo = document.getElementById("data-table");  
    const tabla_fotos = document.getElementById("tabla-fotos");
    
    const div_error_files = document.getElementById("files-error");
    const pagination_link = document.getElementById("pagination_link");

    //Esconder el div donde salen errores de subida de archivos
    div_error_files.style.display = "none";

    $(document).on('click', '#planos', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Planos';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Planos';
        document.getElementById("tipo-archivo").value = "8";
        document.getElementById("cdirectorio-archivos").value = "Planos";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(8);
        generarDataTableArchivos(8);
    });
    
    $(document).on('click', '#fotos', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Fotos';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Fotos';
        document.getElementById("tipo-archivo").value = "3";
        document.getElementById("cdirectorio-archivos").value = "Fotos";
        generarAvisoExitoso("Directorio seleccionado");
        generarTablaFotos(3,1);
        //generarDataTableArchivos(3);
    });
    
    $(document).on('click', '#documentos-tecnicos', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Documentos tecnicos';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Documentos tecnicos';
        document.getElementById("tipo-archivo").value = "7";
        document.getElementById("cdirectorio-archivos").value = "Documentos tecnicos";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(7);
        generarDataTableArchivos(7);
    });
    
    $(document).on('click', '#cotizaciones-proveedores', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Cotizaciones proveedores';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Cotizaciones proveedores';
        document.getElementById("tipo-archivo").value = "6";
        document.getElementById("cdirectorio-archivos").value = "Cotizaciones proveedores";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(6);
        generarDataTableArchivos(6);
    });
    
    $(document).on('click', '#evaluacion-proyecto', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Evaluacion proyecto';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Evaluacion proyecto';
        document.getElementById("tipo-archivo").value = "5";
        document.getElementById("cdirectorio-archivos").value = "Evaluacion proyecto";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(5);
        generarDataTableArchivos(5);
    });
    
    $(document).on('click', '#cotizaciones-clientes', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Cotizaciones clientes';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Cotizaciones clientes';
        document.getElementById("tipo-archivo").value = "4";
        document.getElementById("cdirectorio-archivos").value = "Cotizaciones clientes";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(4);
        generarDataTableArchivos(4);
    });
    
    $(document).on('click', '#propuestas-tecnicas', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Propuestas tecnicas';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Propuestas tecnicas';
        document.getElementById("tipo-archivo").value = "2";
        document.getElementById("cdirectorio-archivos").value = "Propuestas tecnicas";
        generarAvisoExitoso("Directorio seleccionado");
        //generarTablaArchivos(2);
        generarDataTableArchivos(2);
    });
    
    $(document).on('click', '#antecedentes-tecnicos', function(e) {
        e.preventDefault();
        document.getElementById("directorio-archivos").innerHTML = 'Archivos / Antecedentes tecnicos';
        document.getElementById("directorio-archivos-modal").innerHTML = 'Archivos / Antecedentes tecnicos';
        document.getElementById("tipo-archivo").value = "1";
        document.getElementById("cdirectorio-archivos").value = "Antecedentes tecnicos";
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

    $('#files').change(function(){
        
        var selection = document.getElementById('files');
        var div = document.getElementById('files-error');
        div.innerHTML = "";
        var error = "";
        for (var i=0; i<selection.files.length; i++) {
            var ext = selection.files[i].name.substr(-3);
            if(ext!== "pdf" && ext!== "doc" && ext!== "ocx" && ext!== "docx" && ext !== "ppt" && ext !== "png" && ext !== "jpeg" && ext !== "jpg" && ext !== "xlsx" && ext !== "xls")  {
                if (div_error_files.style.display === "none") {
                    div_error_files.style.display = "block";
                } 
                generarAvisoError("El archivo: " + selection.files[i].name + " tiene una extension no valida y no será subido");
                error += "- El archivo: " + selection.files[i].name + " tiene una extension no valida y no será subido<br>";
            }
        } 
        div.innerHTML = error;
    });

    function generarTablaFotos($tipo,page) {
        document.getElementById("checkAll").checked = false;
        tabla_archivo.style.display = "none";
        tabla_fotos.style.display = "block";

        //Deselecciona todos los archivos
        const cbs = document.querySelectorAll('.checkarchivos:checked');
        cbs.forEach((cb) => {
            cb.checked = false;
        });

        var idproyecto = $('#id_proyecto_dir').val();
        $.ajax({
            url: base_url + "Proyecto/obtenerDetalleFotos/"+page,
            type: "get",
            dataType: "json",
            data: {
                id_proyecto: idproyecto,
                id_directorio: $tipo,
            },
            success: function(data) {
                if (data.response == "success") {
                    $('#tabla-fotos').html(data.detalle);
                    $('#pagination_link').html(data.pagination_link);
                } 
            }
        });
    }   

    $(document).on("click", ".pagination li a", function(event){
        event.preventDefault();
        var page = $(this).data("ci-pagination-page");
        generarTablaFotos(3,page);
    });
    
    function generarDataTableArchivos($directorio) {
        document.getElementById("checkAll").checked = false; 

        tabla_fotos.style.display = "none";
        tabla_archivo.style.display = "block";
    //Deselecciona todos las fotos
        const cbs = document.querySelectorAll('.checkfotos:checked');
        cbs.forEach((cb) => {
            cb.checked = false;
        });
    
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
                }],
            });
        }
    }

    $("#checkAll").click(function () {
        //$('input:checkbox').not(this).prop('checked', this.checked);
        var divstylefotos = tabla_fotos.style.display;
        var divstylearchivo = tabla_archivo.style.display;

        if (divstylefotos == "block") {
            $('input.checkfotos').prop('checked',this.checked);
        }
    
        if (divstylearchivo == "block") {
            $('input.checkarchivos').prop('checked',this.checked);
        }
    
    });
});

function subirArchivos() {
    var numFiles = $("input:file")[0].files.length;
    if(numFiles <= 100){
        $('#FormArchivos').ajaxForm({
            url: base_url + "Proyecto/subirArchivos",
            type: "post",
            dataType: "json",
            beforeSubmit: function() {
                $("#progress-bar").width('0%');
            },

            uploadProgress: function(event, position, total, percentComplete) {
                $("#progress-bar").width(percentComplete + '%');
                $("#progress-bar").html('<div id="progress-status">' + percentComplete + ' %</div>')
            },
            success: function(data) {
                if(data.response == "success"){
                    generarAvisoExitoso(data.message);
                    location.reload();
                }

                if(data.response == "error"){
                    generarAvisoExitoso(data.message);
                    //location.reload();
                }
            },
            done: function(data){
                alert("DONE: " + data.response);
            },
            resetForm: true
        });
    } else {
        generarAvisoError("El limite máximo de archivos para subir es de 20 a la vez");
        
    }
    return false;
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
                $('#tabla-fotos').html(data.detalle);
            } else {

            }
        }
    });
}

function descargarArchivos(){
    document.getElementById("tipo-descarga").value = "1";

}

function refresh(){
    location.reload();
}

function eliminarArchivos(){
    document.getElementById("tipo-descarga").value = "0";

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
        "showDuration": "2000",
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