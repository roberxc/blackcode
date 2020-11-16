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

    $.ajax({
        url: "PlantillaOperaciones/registroMaterialesCompradosDurante",
        type: "post",
        dataType: "json",
        data: {
            lista_material: item_material,
            lista_cantidad: item_cantidad,
            lista_valores: item_valortotal,
        },
        success: function(data) {
            if (data.response == "success") {
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



