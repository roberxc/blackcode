$(document).on('click', '#addProyecto', function(e) {
    e.preventDefault();

    var nombreProyecto = $("#nombreProyecto").val();
    var fechaInicio = $("#fechaInicio").val();
    var fechaTermino = $("#fechaTermino").val();
    var monto = $("#monto").val();


    $.ajax({
        url: base_url + "Proyecto/GuardarProyectos",
        type: "post",
        dataType: "json",
        data: {
            nombreProyecto: nombreProyecto,
            fechaInicio: fechaInicio,
            fechaTermino: fechaTermino,
            monto: monto,
           

        },
        success: function(data) {
            if (data.response == "success") {
                $("#fromProyecto")[0].reset();
                
                generarAvisoExitoso('Proyecto registrado correctamente!');
            } else if(data.response == "error"){
                generarAvisoError('Error al registrar el proyecto');
                
            }
            else{
                //$("#msg-error").show();
                generarAvisoError(response);
            }
        }
    });


});
//Registro de partidas
$(document).on('click', '#addpartidas', function(e) {
    e.preventDefault();
    var nombre_partida = [];
   // var item_cantidad = [];
    //var item_valortotal = [];

    //Partida
    $('input[id="nombre_partida"]').each(function(){
        nombre_partida.push($(this).val());
    });

    //Cantidad
  /*  $('input[id="item_cantidad"]').each(function(){
        item_cantidad.push($(this).val());
    });

    //Valor total 
    $('input[id="item_valortotal"]').each(function(){
        item_valortotal.push($(this).val());
    });*/

    $.ajax({
        url: base_url+"Proyecto/registroPartidas",
        type: "post",
        dataType: "json",
        data: {
            lista_partida: nombre_partida,
           /* lista_cantidad: item_cantidad,
            lista_valores: item_valortotal,
            codigo_servicio: codigoservicio,*/
        },
        success: function(data) {
            if (data.response == "success") {
                generarAvisoExitoso(data.message);
                window.location.href = base_url+"Proyecto/Evaluacion_proyecto";
                //window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
                
            } else {
                generarAvisoError(data.message);
            }
        }
    });
});

//Registro Porcentaje
$(document).on('click', '#addporcentaje', function(e) {
    e.preventDefault();

    var imprevisto = $("#imprevisto").val();
    var generales = $("#generales").val();
    var comision = $("#comision").val();
    var ingenieria = $("#ingenieria").val();
    var utilidades = $("#utilidades").val();
    


    $.ajax({
        url: base_url + "Proyecto/",
        type: "post",
        dataType: "json",
        data: {
            imprevisto: imprevisto,
            generales: generales,
            comision: comision,
            ingenieria: ingenieria,
            utilidades:utilidades,

        },
        success: function(data) {
            if (data.response == "success") {

                $("#fromProyecto")[0].reset();
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