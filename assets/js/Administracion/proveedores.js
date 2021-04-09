$("#añadir-proveedor").on('click', function(event) {
    var rut = $('#rut').val();
    var nombre = $('#nombre').val();
    var correo = $('#correo').val();
    var direccion = $('#direccion').val();
    var telefono = $('#telefono').val();
    var diascredito = $('#dias-credito').val();
    var comentario = $('#comentario').val();
    $.ajax({
        url: base_url+"Proveedores/ingresoProveedores",
        type: "post",
        dataType: "json",
        data: {
            rut: rut,
            nombre: nombre,
            correo: correo,
            direccion: direccion,
            telefono: telefono,
            diascredito: diascredito,
            comentario: comentario,
        },
        success: function(respuesta) {
            if (respuesta.response == "success") {
                window.location.href = "Proveedores";
                generarAvisoExitoso('Proveedor ingresada correctamente!');
            
            } else if (respuesta.response === "error") {

				generarAvisoError(respuesta.message);
                
            }else {
                //$("#msg-error").show();
                generarAvisoError(respuesta);
            }
        }
    });

});

//Llenar tabla de detalle orden al hacer click en el ojo
function setTablaDetalle(table){
    var iditem = table.parentNode.parentNode.cells[0].textContent;
    $.ajax({
        url: base_url+"Proveedores/obtenerDetalleProveedores",
        type: "post",
        dataType: "json",
        data: {
            iditem: iditem,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#detalle-proveedores').html(data.detalle);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
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

var idreg = 0;

function setIDRegistro($idregistro){
    idreg = $idregistro;
}


function deleteRegistro(){
    var estadoproveedor = $("#estado_registro").val();
    $.ajax({
        url: base_url+"Proveedores/cambiarEstadoProveedor",
        type: "post",
        dataType: "json",
        data: {
            id_proveedor: idreg,
            estado_registro: estadoproveedor,
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

function setTablaEditar(idproveedor){
    $.ajax({
        url: base_url+"Proveedores/obtenerDetalleProveedoresEdit",
        type: "post",
        dataType: "json",
        data: {
            iditem: idproveedor,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#editar-proveedores').html(data.detalle);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });
}

function updateProveedor(){
    var rut = $("#table-proveedor #rut").text();
    var nombre = $("#table-proveedor #nombre").text();
    var direccion = $("#table-proveedor #direccion").text();
    var telefono = $("#table-proveedor #telefono").text();
    var correo = $("#table-proveedor #correo").text();
    var descripcion = $("#table-proveedor #descripcion").text();
    var credito = $("#table-proveedor #credito").text();

    var idproveedor = $("#table-proveedor #idproveedor").text();
    $.ajax({
        url: base_url+"Proveedores/actualizarProveedor",
        type: "post",
        dataType: "json",
        data: {
            rut: rut,
            nombre: nombre,
            direccion: direccion,
            telefono: telefono,
            correo: correo,
            descripcion: descripcion,
            credito: credito,
            id_proveedor: idproveedor,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                generarAvisoExitoso(data.message);
                location.reload();
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });
}