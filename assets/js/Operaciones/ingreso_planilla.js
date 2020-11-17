
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
        dataType: "json",
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
            if (data.response === "success") {
                window.location.href = "PlantillaOperaciones?codigo="+codigoservicio;
            } else {


            }
        }
    });
    
});



