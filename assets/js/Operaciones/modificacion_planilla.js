$("#asistencia-modal").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var codigo = $("#codigo_servicio").val();
    window.location.href = base_url+"Asistencia/"+codigo;
});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$(document).on('click', '#updateviatico1', function(e) {
    e.preventDefault();
    document.getElementById("vaticos").style.display = "none";
    
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    var item_gastos = [];
    var item_id = [];
    //Material
    $('input[id="gastos_update"]').each(function(){
        item_gastos.push($(this).val());
    });

    $('input[id="gastosid_update"]').each(function(){
        item_id.push($(this).val());
    });

    $.ajax({
        url: base_url+"PlantillaOperaciones/actualizarGastosViaticos",
        type: "post",
        dataType: "json",
        data: {
            lista_gastos: item_gastos,
            lista_gastosid: item_id,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"ModificacionPlanilla/"+codigoservicio;
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
    
});

$(document).on('click', '#update_material1', function(e) {
    e.preventDefault();
    document.getElementById("duranteTrab").style.display = "none";

    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Materiales comprados durante el trabajo
    var item_material = [];
    var item_cantidad = [];
    var item_valortotal = [];
    var item_id = [];

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


    $('input[id="item_material_update_id"]').each(function(){
        item_id.push($(this).val());
    });

    $.ajax({
        url: base_url+"PlantillaOperaciones/actualizarMaterialesCompradosDurante",
        type: "post",
        dataType: "json",
        data: {
            lista_material: item_material,
            lista_cantidad: item_cantidad,
            lista_valores: item_valortotal,
            lista_id: item_id,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"ModificacionPlanilla/"+codigoservicio;
                generarAvisoExitoso(data.message);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
});

$(document).on('click', '#in-mat1', function(e) {
    e.preventDefault();
    document.getElementById("duranteTrab").style.display = "block";

});

//Ingreso de materiales comprados antes del trabajo
$(document).on('click', '#updatematerial2', function(e) {
    e.preventDefault();
    document.getElementById("antesTrab").style.display = "none";

    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Materiales comprados durante el trabajo
    var item_material = [];
    var item_cantidad = [];
    var item_valortotal = [];
    var item_id = [];

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
        item_id.push($(this).val());
    });

    $.ajax({
        url: base_url+"PlantillaOperaciones/actualizarMaterialesCompradosAntes",
        type: "post",
        dataType: "json",
        data: {
            lista_material: item_material,
            lista_cantidad: item_cantidad,
            lista_valores: item_valortotal,
            lista_id: item_id,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"ModificacionPlanilla/"+codigoservicio;
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

$(document).on('click', '#in-viaticos', function(e) {
    e.preventDefault();
    document.getElementById("vaticos").style.display = "block";

});

//Aqui se registra la tabla trabajo diario
$(".asistencia-modal").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var codigo = $("#codigo_servicio").val();
    
    window.location.href = "AsistenciaTrabajador?codigo="+codigo;
 
    
});

//Ingreso de gastos varios
$(document).on('click', '#addgastos_varios1', function(e) {
    e.preventDefault();
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Gastos varios
    var item_gastovario = [];
    var item_gastovarioid = [];

    //Valor del gasto vario
    $('input[id="item_gastovarios"]').each(function(){
        item_gastovario.push($(this).val());
    });

    $('input[id="item_gastovariosid"]').each(function(){
        item_gastovarioid.push($(this).val());
    });
    
    $.ajax({
        url: base_url+"PlantillaOperaciones/actualizarGastosVarios",
        type: "post",
        dataType: "json",
        data: {
            lista_gastosvarios: item_gastovario,
            lista_gastosvariosid: item_gastovarioid,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
                window.location.href = base_url+"ModificacionPlanilla/"+codigoservicio;
                generarAvisoExitoso('Guardado exitosamente!');
            } else {
                generarAvisoError(data.message);
            }
        }
    });
});

//Ingreso de gastos varios
$(document).on('click', '#addgastos_combustible1', function(e) {
    e.preventDefault();
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    var idgasto = $("#id_tipogasto").val();
    //Valor del gasto
    var item_valor = $("#gasto_combustible").val();
    
    $.ajax({
        url: base_url+"PlantillaOperaciones/actualizarGastosCombustible",
        type: "post",
        dataType: "json",
        data: {
            gasto_combustible: item_valor,
            codigo_servicio: codigoservicio,
            id_gasto: idgasto,
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso('Modificado exitosamente!');
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
                window.location.href = base_url+"ModificacionPlanilla/"+codigoservicio;
                generarAvisoExitoso('Modificado exitosamente!');
            } else {
                generarAvisoError(data.message);
            }
        }
    });
    
});

$("#form-subir-archivos").submit(function (event){

    event.preventDefault();
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

