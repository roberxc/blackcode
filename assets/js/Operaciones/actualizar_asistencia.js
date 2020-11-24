$(".asistencia-registro1").on('click', function(event){
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
    })

    $.ajax({
        url: base_url+"AsistenciaTrabajador/actualizarAsistencia",
        type: "post",
        dataType: "json",
        data: {
            lista_entradat: item_entradat,
            lista_salidat: item_salidat,
            lista_entradam: item_entradam,
            lista_salidam: item_salidam,
            lista_id: item_id,
            codigo_servicio: codigoservicio,
        },
        success: function(data) {
            if (data.response === "success") {
                window.location.href = base_url+"ModificacionPlanilla/"+codigoservicio;
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



