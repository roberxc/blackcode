$(document).on('click', '#addviatico', function(e) {
    e.preventDefault();
    document.getElementById("vaticos").style.display = "none";
    var cena = $("#vcena").val();
    var almuerzo = $("#valmuerzo").val();
    var desayuno = $("#vdesayuno").val();
    var agua = $("#vagua").val();
    var alojamiento = $("#valojamiento").val();

    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();

    $.ajax({
        url: "PlantillaOperaciones/registroGastoViaticos",
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
                window.location.href = "PlantillaOperaciones?codigo="+codigoservicio;
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

$(document).on('click', '#addmaterial1', function(e) {
    e.preventDefault();
    document.getElementById("duranteTrab").style.display = "none";

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

    console.log(item_material);
    console.log(item_cantidad);
    console.log(item_valortotal);

    $.ajax({
        url: "PlantillaOperaciones/registroMaterialesCompradosDurante",
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
                window.location.href = "PlantillaOperaciones?codigo="+codigoservicio;
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
$(document).on('click', '#addmaterial2', function(e) {
    e.preventDefault();
    document.getElementById("antesTrab").style.display = "none";

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

    console.log(item_material);
    console.log(item_cantidad);
    console.log(item_valortotal);

    $.ajax({
        url: "PlantillaOperaciones/registroMaterialesCompradosDurante",
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
                window.location.href = "PlantillaOperaciones?codigo="+codigoservicio;
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
$(document).on('click', '#addgastos_varios', function(e) {
    e.preventDefault();
    //Obtencion del codigo de servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Materiales comprados durante el trabajo
    var item_peaje = $("#gasto_peaje").val();
    var item_estacionamiento = $("#gasto_estacionamiento").val();
    
    $.ajax({
        url: "PlantillaOperaciones/registroGastosVarios",
        type: "post",
        dataType: "json",
        data: {
            gasto_peaje: item_peaje,
            gasto_estacionamiento: item_estacionamiento,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response == "success") {
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



