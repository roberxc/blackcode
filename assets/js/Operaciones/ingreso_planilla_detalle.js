function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$(document).on('click', '#addviatico', function(e) {
    e.preventDefault();
    
    document.getElementById("vaticos0").style.display = "none";
    
    var cena = $("#vcena").val();
    var almuerzo = $("#valmuerzo").val();
    var desayuno = $("#vdesayuno").val();
    var agua = $("#vagua").val();
    var alojamiento = $("#valojamiento").val();

    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();

    $.ajax({
        url: base_url+"PlantillaOperaciones/registroGastoViaticos",
        type: "post",
        dataType: "json",
        data: {
            vcena: cena,
            valmuerzo: almuerzo,
            vdesayuno: desayuno,
            vagua: agua,
            valojamiento: alojamiento,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
    
});

$(document).on('click', '#addmaterial1', function(e) {
    e.preventDefault();
    document.getElementById("duranteTrab1").style.display = "none";
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Materiales comprados durante el trabajo
    var item_material = [];
    var item_cantidad = [];
    var item_valortotal = [];

    //Material
    $('input[id="item_material"]').each(function(){
        item_material.push($(this).val());
    });

    //Cantidad
    $('input[id="item_cantidad"]').each(function(){
        item_cantidad.push($(this).val());
    });

    //Valor total 
    $('input[id="item_valortotal"]').each(function(){
        item_valortotal.push($(this).val());
    });

    $.ajax({
        url: base_url+"PlantillaOperaciones/registroMaterialesCompradosDurante",
        type: "post",
        dataType: "json",
        data: {
            lista_material: item_material,
            lista_cantidad: item_cantidad,
            lista_valores: item_valortotal,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
});

$(document).on('click', '#update_material1', function(e) {
    e.preventDefault();
    document.getElementById("duranteTrab1").style.display = "none";
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Materiales comprados durante el trabajo
    var item_material = [];
    var item_cantidad = [];
    var item_valortotal = [];
    var item_materialid = [];

    //Material
    $('input[id="item_material_update"]').each(function(){
        item_material.push($(this).val());
    });

    //Cantidad
    $('input[id="item_cantidad_update"]').each(function(){
        item_cantidad.push($(this).val());
    });

    //Valor total 
    $('input[id="item_valortotal_update"]').each(function(){
        item_valortotal.push($(this).val());
    });

    //ID Material
    $('input[id="item_material_update_id"]').each(function(){
        item_materialid.push($(this).val());
    });

    $.ajax({
        url: base_url+"PlantillaOperaciones/actualizarMaterialesCompradosDurante",
        type: "post",
        dataType: "json",
        data: {
            lista_material: item_material,
            lista_cantidad: item_cantidad,
            lista_valores: item_valortotal,
            lista_id: item_materialid,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
    
});

$(document).on('click', '#updatematerial2', function(e) {
    e.preventDefault();
    document.getElementById("antesTrab1").style.display = "none";
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Materiales comprados durante el trabajo
    var item_material = [];
    var item_cantidad = [];
    var item_valortotal = [];
    var item_materialid = [];

    //Material
    $('input[id="item_material2_update"]').each(function(){
        item_material.push($(this).val());
    });

    //Cantidad
    $('input[id="item_cantidad2_update"]').each(function(){
        item_cantidad.push($(this).val());
    });

    //Valor total 
    $('input[id="item_valortotal2_update"]').each(function(){
        item_valortotal.push($(this).val());
    });

    //ID Material
    $('input[id="item_material2_update_id"]').each(function(){
        item_materialid.push($(this).val());
    });

    $.ajax({
        url: base_url+"PlantillaOperaciones/actualizarMaterialesCompradosAntes",
        type: "post",
        dataType: "json",
        data: {
            lista_material: item_material,
            lista_cantidad: item_cantidad,
            lista_valores: item_valortotal,
            lista_id: item_materialid,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
    
});

$(document).on('click', '#updatematerialbodega', function(e) {
    e.preventDefault();
    document.getElementById("antesTrab1").style.display = "none";
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Materiales comprados durante el trabajo
    var item_material = [];
    var item_cantidad = [];
    var item_materialid = [];

    //Material
    $('input[id="item_materialbodega_nombre_update"]').each(function(){
        item_material.push($(this).val());
    });

    //Cantidad
    $('input[id="item_materialbodega_cantidad_update"]').each(function(){
        item_cantidad.push($(this).val());
    });

    //ID Material
    $('input[id="item_materialbodega_update_id"]').each(function(){
        item_materialid.push($(this).val());
    });

    $.ajax({
        url: base_url+"PlantillaOperaciones/actualizarMaterialesBodega",
        type: "post",
        dataType: "json",
        data: {
            lista_material: item_material,
            lista_cantidad: item_cantidad,
            lista_id: item_materialid,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
    
});

$(document).on('click', '#in-mat1', function(e) {
    e.preventDefault();
    document.getElementById("duranteTrab0").style.display = "block";

});

//Ingreso de materiales comprados antes del trabajo
$(document).on('click', '#addmaterial2', function(e) {
    e.preventDefault();
    document.getElementById("antesTrab0").style.display = "none";
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Materiales comprados durante el trabajo
    var item_material = [];
    var item_cantidad = [];
    var item_valortotal = [];

    //Material
    $('input[id="item_material2"]').each(function(){
        item_material.push($(this).val());
    });

    //Cantidad
    $('input[id="item_cantidad2"]').each(function(){
        item_cantidad.push($(this).val());
    });

    //Valor total 
    $('input[id="item_valortotal2"]').each(function(){
        item_valortotal.push($(this).val());
    });

    $.ajax({
        url: base_url+"PlantillaOperaciones/registroMaterialesCompradosAntes",
        type: "post",
        dataType: "json",
        data: {
            lista_material: item_material,
            lista_cantidad: item_cantidad,
            lista_valores: item_valortotal,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
});

$(document).on('click', '#in-mat2', function(e) {
    e.preventDefault();
    document.getElementById("antesTrab").style.display = "block";

});

$(document).on('click', '#addmaterialbodega', function(e) {
    e.preventDefault();
    //document.getElementById("duranteTrab1").style.display = "none";
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Materiales comprados durante el trabajo
    var item_material = [];
    var item_cantidad = [];

    //Material
    $('input[id="item_materialbodega_nombre"]').each(function(){
        item_material.push($(this).val());
    });

    //Cantidad
    $('input[id="item_materialbodega_cantidad"]').each(function(){
        item_cantidad.push($(this).val());
    });


    $.ajax({
        url: base_url+"PlantillaOperaciones/registroMaterialesBodega",
        type: "post",
        dataType: "json",
        data: {
            lista_material: item_material,
            lista_cantidad: item_cantidad,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
    
});

$(document).on('click', '#in-viaticos', function(e) {
    e.preventDefault();
    document.getElementById("vaticos0").style.display = "block";

});

//Aqui se registra la tabla trabajo diario
$("#asistencia-modal").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var codigo = $("#codigo_servicio").val();
    window.location.href = base_url+"Asistencia/"+codigo;
});

//Ingreso de gastos varios
$(document).on('click', '#addgastos_varios0', function(e) {
    e.preventDefault();
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Materiales comprados durante el trabajo
    var item_peaje = $("#gasto_peaje").val();
    var item_estacionamiento = $("#gasto_estacionamiento").val();
    
    $.ajax({
        url: base_url+"PlantillaOperaciones/registroGastosVarios",
        type: "post",
        dataType: "json",
        data: {
            gasto_peaje: item_peaje,
            gasto_estacionamiento: item_estacionamiento,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                generarAvisoExitoso('Guardado exitosamente!');
            } else {
                generarAvisoError(data.message);
            }
        }
    });
});

//Ingreso de gastos varios
$(document).on('click', '#addgastos_combustible0', function(e) {
    e.preventDefault();
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    var idgasto = $("#id_tipogasto").val();
    //Materiales comprados durante el trabajo
    var item_valor = $("#gasto_combustible").val();
    
    $.ajax({
        url: base_url+"PlantillaOperaciones/registroGastosCombustible",
        type: "post",
        dataType: "json",
        data: {
            gasto_combustible: item_valor,
            codigo_servicio: codigoservicio,
            id_gasto: idgasto,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                generarAvisoExitoso('Guardado exitosamente!');
            } else {
                generarAvisoError(data.message);
            }
        }
    });
});

//Borrar arhivos subidos
$(document).on('click', '.delete_archivo', function(e) {
    e.preventDefault();
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    var archivo = $(this).parents('tr').find(".name-file").val();
    $.ajax({
        url: base_url+"PlantillaOperaciones/eliminarArchivoSubido",
        type: "post",
        dataType: "json",
        data: {
            codigo_servicio: codigoservicio,
            nombre_imagen: archivo,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                generarAvisoExitoso('Modificado exitosamente!');
            } else {
                generarAvisoError(data.message);
            }
        }
    });
    
});

$("#form-subir-archivos").submit(function (event){
    event.preventDefault();
    var codigoservicio = $("#codigo_servicio").val();
    var formData = new FormData($("#form-subir-archivos")[0]);
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
                $("#form-subir-archivos")[0].reset();
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
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

