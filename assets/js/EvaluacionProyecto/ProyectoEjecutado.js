
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
function generarTablaManoDeObra(table){
    var idtrabajodiario = table.parentNode.parentNode.cells[0].textContent;
    //alert(idtrabajodiario);

    $.ajax({
        url: base_url+"Proyecto/obtenerPersonalQueAsiste",
        type: "post",
        dataType: "json",
        data: {

            idtrabajodiario:idtrabajodiario,
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

function setTablaFacturas(table){
    var idtrabajodiario = table.parentNode.parentNode.cells[0].textContent;
    //window.location.href = base_url + "CMantencion/descargaDocMantencion/"+iddocumento;
    $.ajax({
        url: base_url+"Proyecto/obtenerFacturas",
        type: "post",
        dataType: "json",
        data: {

            idtrabajodiario:idtrabajodiario,
        },
        success: function(data) {
            if (data.response == "success") {

                
                $('#mostrar-factura').html(data.detalle);
            } else {
                generarAvisoError(data.message);
                alert("Error")
            }
        }
    });
}

