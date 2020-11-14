function generarCodigo(){
    var codigo = $("#tipo_trabajo").val();
    document.getElementById("codigo_servicio").value = codigo;

    $.ajax({
        url: "Operacion/obtenerCodigoServicio",
        type: "post",
        dataType: "json",
        data: {
            codigo_servicio: codigo,
        },
        success: function(data) {
            if (data.response == "success") {
                document.getElementById("codigo_servicio").value = data['message'];
            
            }else {


            }
        }
    });

}


$(document).on('click', '#addviatico', function(e) {
    e.preventDefault();
    document.getElementById("vaticos").style.display = "none";
    var cena = $("#vcena").val();
    var almuerzo = $("#valmuerzo").val();
    var desayuno = $("#vdesayuno").val();
    var agua = $("#vagua").val();
    var alojamiento = $("#valojamiento").val();

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
$(".reg-trabajo").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var fechatrabajo = $("#fecha_trabajo").val();
    var personacargo = $("#personacargo").val();
    var nombreproyecto = $("#nombre_proyecto").val();
    var sumaasignada = $("#suma_asignada").val();
    var detalletrabajo = $("#detalle_trabajo").val();
    var codigoservicio = $("#codigo_servicio").val();

    var item_rut = [];
    var item_nombre = [];

    $('.item_rut').each(function(){
        item_rut.push($(this).text());
       });
    $('.item_nombre').each(function(){
        item_nombre.push($(this).text());
    });
    
    $.ajax({
        url: "Operacion/ingresarTrabajoDiario",
        type: "post",
        data: {
            codigo_servicio: codigoservicio,
            nombre_proyecto: nombreproyecto,
            persona_cargo: personacargo,
            detalle_trabajo: detalletrabajo,
            suma_asignada: sumaasignada,
            fecha_trabajo: fechatrabajo,
            lista_rut: item_rut,
            lista_nombre: item_nombre,
        },
        success: function(data) {
            if (data.response == "success") {
                alert(data);
            } else {
                
            }
        }
    });
});


