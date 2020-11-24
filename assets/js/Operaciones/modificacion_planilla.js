$("#asistencia-modal").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var codigo = $("#codigo_servicio").val();
    var tipo = '1';
    window.location.href = base_url+"Asistencia/"+codigo+"/"+tipo;
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
                Command: toastr["success"](data.message)
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
            } else {
                Command: toastr["error"](data.message)

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
                Command: toastr["success"](data.message)
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
            } else {
                Command: toastr["error"](data.message)
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
                Command: toastr["success"](data.message)
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
            } else {
                Command: toastr["error"](data.message)

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
                Command: toastr["success"]('Guardado exitosamente!','Correcto')
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
            } else {
                Command: toastr["error"](data.message,'Error')
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
                Command: toastr["success"]('Modificado exitosamente!','Correcto')
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
            } else {
                Command: toastr["error"](data.message,'Error')
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
        }
    });
});



