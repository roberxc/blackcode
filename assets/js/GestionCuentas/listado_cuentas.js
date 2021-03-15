function deleteRegistro(){
    var id_usuario = $("#id_usuario").val();
    var estado = $("#estado_registro").val();
    $.ajax({
        url: base_url+"Administracion/eliminarRegistroUsuario",
        type: "post",
        dataType: "json",
        data: {
            id_usuario: id_usuario,
            estado: estado,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                $('#example1').dataTable().fnClearTable();
                $('#example1').dataTable().fnDestroy();
                $('#modal-confirmacion').modal('toggle');
                fetch();
                //window.location.href =  base_url+"Administracion/listaRegistros";
                //location.reload();
            } else if (data.response == "error") {
                generarAvisoError(data.message);
            }
        }
    });
}

function cambiarTipoUsuario(){
    var id_usuario = $("#id_usuario").val();
    var id_tipousuario = $("#tipo_usuario").val();
    $.ajax({
        url: base_url+"Administracion/cambiarTipoUsuario",
        type: "post",
        dataType: "json",
        data: {
            id_usuario: id_usuario,
            id_tipousuario: id_tipousuario,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                $('#example1').dataTable().fnClearTable();
                $('#example1').dataTable().fnDestroy();
                $('#modal-editar').modal('toggle');
                fetch();
            } else if (data.response == "error") {
                generarAvisoError(data.message);
            }
        }
    });
}

function setIDUsuario(table){
    var id_usuario = table.parentNode.parentNode.cells[0].textContent;
    document.getElementById("id_usuario").value = id_usuario;
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


function fetch(){
    $('#example1').DataTable({
                        "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                        },
                        "processing": true,
                        "serverSide": true, 
                        "ajax":{url:base_url + "Administracion/obtenerRegistrosUsuarios",
                        type: "POST"
                    },
                        "columnDefs":[
                        {
                            "targets": [1,2,3,4],
                        }
                        ]
                    });
       }
