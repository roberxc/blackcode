
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
    var idproyecto = $("#id_proyecto").val();
    var sumaasignada = $("#suma_asignada").val();
    var detalletrabajo = $("#detalle_trabajo").val();
    var codigoservicio = $("#codigo_servicio").val();

    var item_rut = [];
    var item_nombre = [];

    $('input[id="item_rut"]').each(function(){
        item_rut.push($(this).val());
    });

    $('input[id="item_nombre"]').each(function(){
        item_nombre.push($(this).val());
    });
    
    $.ajax({
        url: "Operacion/ingresarTrabajoDiario",
        type: "post",
        dataType: "json",
        data: {
            codigo_servicio: codigoservicio,
            id_proyecto: idproyecto,
            persona_cargo: personacargo,
            detalle_trabajo: detalletrabajo,
            suma_asignada: sumaasignada,
            fecha_trabajo: fechatrabajo,
            lista_rut: item_rut,
            lista_nombre: item_nombre,
        },
        success: function(data) {
            if (data.response === "success") {
                window.location.href = "DetalleOperaciones/"+codigoservicio;
            } else {

            }
        }
    });
    
});

//Validacion de campos (TrabajoDiario vista Trabajador/index.php)
$("#validar-iniciotrabajo").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var fechatrabajo = $("#fecha_trabajo").val();
    var personacargo = $("#personacargo").val();
    var idproyecto = $("#id_proyecto").val();
    var sumaasignada = $("#suma_asignada").val();
    $.ajax({
        url: "Operacion/validarTrabajoDiario",
        type: "post",
        dataType: "json",
        data: {
            fecha_trabajo: fechatrabajo,
            id_proyecto: idproyecto,
            persona_cargo: personacargo,
            suma_asignada: sumaasignada,
        },
        success: function(data) {
            if (data.response === "success") {
                Command: toastr["success"]('Ingreso correcto!','Correcto')
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
                Command: toastr["error"]('Faltan campos por completar en la ventana anterior. Presione en "Volver"','Error')
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
var count=1;
var max=10;
var x = 1;
function setNombrePersonal(){
    
    var nombrecompleto =$('#personal').val().split(',')[1];
    var rut = $('#personal').val().split(',')[0];

    var item_rut = [];
    $('input[id="item_rut"]').each(function(){
        item_rut.push($(this).val());
    });

    if(!item_rut.includes(rut)){
        count = count + 1;
        var html_code = "<tr class='nm' id='row"+count+"'>";
        html_code += "<td><input type='text' id='item_rut' value="+rut+" class='form-control'/></td>";
        html_code += "<td><input type='text' id='item_nombre' value="+nombrecompleto+" class='form-control' /></td>";
        html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
        html_code += "</tr>";
        $('#tabla_personal').append(html_code);
    }else{
        Command: toastr["success"]('Rut ya ingresado','Correcto')
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

/*
$(document).ready(function(){

    function registerEvents(){
        alert('asd');
        $(document).on('focus','.autocomplete_txt',handleAutocomplete);
    }

    registerEvents();

    var fieldName , currentEle;
    currentEle = $(this);

    fieldName = currentEle.data('field-name');
    if(typeof fieldName === 'undefined'){
        return false;
    }
    currentEle.autocomplete({

        source: function(data, cb){

            $.ajax({
                url: base_url+"Operacion/getPersonal",
                method: 'GET',
                dataType: "json",
                data: {
                    name: data.term,
                    fieldName: fieldName
                },
                success: function(res) {
                    var result;
                    result = [
                        {
                            label: 'No hay datos para ' + data.item,
                            value: ''
                        }
                    ];
                    console.log("before formart", res);
                    if(res.length){
                        result = $.map(res, function(obj){

                            return {
                                label: obj[fieldName],
                                value: obj[fieldName],
                                data : obj
                            };
                        });
                        console.log('After formart', result);
                        cb(result);
                    }

                }

            });

        }

    });

});
*/



