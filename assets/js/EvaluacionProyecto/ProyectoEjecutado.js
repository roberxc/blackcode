
function generarTablaTrabajoDiario(){
    var codigo = $("#codigoproyecto").val();
    $.ajax({
        url: base_url+"Proyecto/obtenerTrabajoDiario",
        type: "post",
        dataType: "json",
        data: {

            codigo:codigo,
        },
        success: function(data) {
            if (data.response == "success") {

                
                $('#RegistroTrabajoDiario').html(data.detalle);
            } else {
                generarAvisoError(data.message);
                alert("Error")
            }
        }
    });
    
}

function generarTablaRegistroMaterial(){
    var codigo = $("#codigoproyecto").val();
    $.ajax({
        url: base_url+"Proyecto/obtenerRegistroMaterial",
        type: "post",
        dataType: "json",
        data: {

            codigo:codigo,
        },
        success: function(data) {
            if (data.response == "success") {

                
                $('#MostrarRegistroMaterial').html(data.detalle);
            } else {
                generarAvisoError(data.message);
                alert("Error")
            }
        }
    });
    
}
function generarTablaManoDeObra(){
    var codigo = $("#codigoproyecto").val();
    $.ajax({
        url: base_url+"Proyecto/obtenerManoDeObra",
        type: "post",
        dataType: "json",
        data: {

            codigo:codigo,
        },
        success: function(data) {
            if (data.response == "success") {

                
                $('#MostrarManoDeObra').html(data.detalle);
            } else {
                generarAvisoError(data.message);
                alert("Error")
            }
        }
    });
    
}
function generarTablaPersonalQueAsiste(){
    var codigo = $("#codigoproyecto").val();
    $.ajax({
        url: base_url+"Proyecto/obtenerPersonalQueAsiste",
        type: "post",
        dataType: "json",
        data: {

            codigo:codigo,
        },
        success: function(data) {
            if (data.response == "success") {

                
                $('#MostrarPersonalAsiste').html(data.detalle);
            } else {
                generarAvisoError(data.message);
                alert("Error")
            }
        }
    });
    
}


