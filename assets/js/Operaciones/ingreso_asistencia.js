$(".asistencia-registro").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    //Codigo servicio
    var codigoservicio = $("#codigo_servicio").val();
    //Rut personal
    var item_id = [];

    //Asistencia mañana
    var item_entradam = [];
    var item_salidam = [];

    //Asistencia tarde
    var item_entradat = [];
    var item_salidat = [];

    //Detalle hora extra
    var item_detalle = [];

    $('input[id="item_entradam"]').each(function(){
        item_entradam.push($(this).val());
    });
    $('input[id="item_salidam"]').each(function(){
        item_salidam.push($(this).val());
    });

    $('input[id="item_entradat"]').each(function(){
        item_entradat.push($(this).val());
    });

    $('input[id="item_salidat"]').each(function(){
        item_salidat.push($(this).val());
    });


    $('input[id="item_id"]').each(function(){
        item_id.push($(this).val());
    });

    $('textarea[id="item_detalle"]').each(function(){
        item_detalle.push($(this).val());
    })

    $.ajax({
        url: base_url+"AsistenciaTrabajador/ingresarAsistencia",
        type: "post",
        dataType: "json",
        data: {
            lista_entradat: item_entradat,
            lista_salidat: item_salidat,
            lista_entradam: item_entradam,
            lista_salidam: item_salidam,
            lista_id: item_id,
            lista_detalle: item_detalle,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response === "success") {
                window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
            } else {


            }
        }
    });    
    
});

$(".asistencia-cancelar").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    //Codigo servicio
    var codigoservicio = $("#codigo_servicio").val();
    window.location.href = base_url+"DetalleOperaciones/"+codigoservicio;
});

function setModal(table){

    var idpersonal= $(table).attr('value');
    alert("ID: " + idpersonal);
    $('#detallehora'+idpersonal).append(
            '<h6>Detalle cambio de hora</h6>'+
            '<hr class="cell-divide-hr">'+
            '<textarea class="form-control-textarea" id="detalle_hora" name="detalle_hora" required></textarea>'+
            '<div class="text-right"><span id="caracteres" class="valid-text pt-3" id="txaCount"></span></div>'+
            '<div class="help-block with-errors"></div>');
}

$("#detalle_hora").on('keypress', function() {
    var limit = 100;
    $("#detalle_hora").attr('maxlength', limit);
    var init = $(this).val().length;
    
    if(init<limit){
      init++;
      $('#caracteres').text("Máximo 100 caracteres:" + init); 
    }
    
});


