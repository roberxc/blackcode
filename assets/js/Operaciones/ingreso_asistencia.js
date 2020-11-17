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

    console.log('Asistencia entrada tarde: ' + item_entradat);
    console.log('Asistencia salida tarde: ' + item_salidat);
    console.log('Asistencia entrada mañana: ' + item_entradam);
    console.log('Asistencia salida mañana: ' + item_salidam);
    console.log('ID: ' + item_id);

    $.ajax({
        url: "AsistenciaTrabajador/ingresarAsistencia",
        type: "post",
        dataType: "json",
        data: {
            lista_entradat: item_entradat,
            lista_salidat: item_salidat,
            lista_entradam: item_entradam,
            lista_salidam: item_salidam,
            lista_id: item_id,
        },
        success: function(data) {
            if (data.response === "success") {
               alert('Todo bien, todo correcto');
               window.location.href = "PlantillaOperaciones?codigo="+codigoservicio;
            } else {


            }
        }
    });    
});



