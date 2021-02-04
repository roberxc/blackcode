//Registro Proyecto
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
$(document).on('click', '#addPorcentaje', function(e) {
    e.preventDefault();
    var partidas6 = $("#partidas6").val();
    var imprevisto = $("#imprevisto").val();
    var generales = $("#generales").val();
    var comision = $("#comision").val();
    var ingenieria = $("#ingenieria").val();
    var utilidades = $("#utilidades").val();
    


    $.ajax({
        url: base_url + "Proyecto/GuardarPorcentaje",
        type: "post",
        dataType: "json",
        data: {
            partidas6:partidas6,
            imprevisto: imprevisto,
            generales: generales,
            comision: comision,
            ingenieria: ingenieria,
            utilidades:utilidades,

        },
        success: function(data) {
            if (data.response == "success") {
               
                window.location.href = base_url+"Proyecto/Evaluacion_proyecto";
                generarAvisoExitoso('Porcentaje registrado correctamente!');
            } else if(data.response == "error"){
                
                generarAvisoError('Error al registrar el porcentaje');
                
            }
            else{
                //$("#msg-error").show();
                generarAvisoError(response);
            }
        }
    });


});
//Registrar Instalacion
$(document).on('click', '#addInstalacion', function(e) {
    e.preventDefault();
    var partidas5 = $("#partidas5").val();
    var tipo = $("#tipoInsta").val();
    var dias = $("#numdias").val();
    var numCantidadIns = [];
    var txtItemIns = [];
    var numPrecioIns = [];

    //Partida
    $('input[id="numCantidadIns"]').each(function(){
        numCantidadIns.push($(this).val());
    });

    //Cantidad
   $('input[id="txtItemIns"]').each(function(){
    txtItemIns.push($(this).val());
    });

    //Valor total 
    $('input[id="numPrecioIns"]').each(function(){
        numPrecioIns.push($(this).val());
    });

    $.ajax({
        url: base_url+"Proyecto/registroInstalacion",
        type: "post",
        dataType: "json",
        data: {
            partidas5:partidas5,
            tipo:tipo,
            dias: dias,
            lista_cantidad: numCantidadIns,
            lista_item: txtItemIns,
            lista_unitario: numPrecioIns,
            
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
//Registro supervision
$(document).on('click', '#addSupervision', function(e) {
    e.preventDefault();
    var partidas4 = $("#partidas4").val();
    var tipo = $("#tipoSuper").val();
    var dias = $("#diasSuper").val();
    var numCantidadSup = [];
    var txtItemSup = [];
    var numPrecioSup = [];

    //Partida
    $('input[id="numCantidadSup"]').each(function(){
        numCantidadSup.push($(this).val());
    });

    //Cantidad
   $('input[id="txtItemSup"]').each(function(){
    txtItemSup.push($(this).val());
    });

    //Valor total 
    $('input[id="numPrecioSup"]').each(function(){
        numPrecioSup.push($(this).val());
    });

    $.ajax({
        url: base_url+"Proyecto/registroSupervision",
        type: "post",
        dataType: "json",
        data: {
            partidas4:partidas4,
            tipo:tipo,
            dias: dias,
            lista_cantidad: numCantidadSup,
            lista_item: txtItemSup,
            lista_unitario: numPrecioSup,
            
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
//Registro Etapas
$(document).on('click', '#addEtapa', function(e) {
    e.preventDefault();
    var partida2 = $("#partidas2").val();
    var estado = $("#estado").val();
    var nombre_etapa = [];

    //etapa
    $('input[id="nombre_etapa"]').each(function(){
        nombre_etapa.push($(this).val());
    });

    $.ajax({
        url: base_url+"Proyecto/registroEtapas",
        type: "post",
        dataType: "json",
        data: {
            partida2: partida2,
            estado: estado,
            lista_etapa: nombre_etapa,
           
            
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
//Registro Despiece
$(document).on('click', '#addDespiece', function(e) {
    e.preventDefault();
    
    var idEtapa = $("#ID_Despiece").val();
    var valorFlete=$("#ValorFlete").val();
    var numCantidad = [];
    var txtItem = [];
    var numPrecioDespiece = [];

    //etapa
    $('input[id="numCantidad"]').each(function(){
        numCantidad.push($(this).val());
    });
    //etapa
    $('input[id="txtItem"]').each(function(){
        txtItem.push($(this).val());
    });
    //etapa
    $('input[id="numPrecioDespiece"]').each(function(){
        numPrecioDespiece.push($(this).val());
    });

    $.ajax({
        url: base_url+"Proyecto/registroDespiece",
        type: "post",
        dataType: "json",
        data: {
            idEtapa:idEtapa,
            valorFlete:valorFlete,
            lista_cantidad: numCantidad,
            lista_item: txtItem,
            lista_precio: numPrecioDespiece,
            
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
//Registro Flete
$(document).on('click', '#addflete', function(e) {
    e.preventDefault();

    var id_etapa = $("#id_etapa").val();
    var valor= $("#valor").val();



    $.ajax({
        url: base_url + "Proyecto/Guardarflete",
        type: "post",
        dataType: "json",
        data: {
            id_etapa: id_etapa,
            valor: valor,
            
           

        },
        success: function(data) {
            if (data.response == "success") {
               
                generarAvisoExitoso('Proyecto registrado correctamente!');
                window.location.href = base_url+"Proyecto/Evaluacion_proyecto";
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
//Registro Flete Traslado
$(document).on('click', '#addfleteTraslado', function(e) {
    e.preventDefault();
    var partidas7 = $("#partidas7").val();
    var flete_Traslado = $("#flete_Traslado").val();
 


    $.ajax({
        url: base_url + "Proyecto/GuardarFleteTraslado",
        type: "post",
        dataType: "json",
        data: {
            partidas7:partidas7,
            flete_Traslado: flete_Traslado,
           

        },
        success: function(data) {
            if (data.response == "success") {
               
                window.location.href = base_url+"Proyecto/Evaluacion_proyecto";
                generarAvisoExitoso('Porcentaje registrado correctamente!');
            } else if(data.response == "error"){
                
                generarAvisoError('Error al registrar el porcentaje');
                
            }
            else{
                //$("#msg-error").show();
                generarAvisoError(response);
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

function actualizarResumen(){
    var id =$('#partidas3').val().split(',')[0];
    $.ajax({
        url: base_url+"Proyecto/obtenerResumenProyecto",
        type: "post",
        dataType: "json",
        data: {
            id_partida: id,
       
        },
        success: function(data) {
            if (data.response == "success") {

                
                $('#resumen-proyecto').html(data.detalle);
            } else {
                generarAvisoError(data.message);
            }
        }
    });
    
}
