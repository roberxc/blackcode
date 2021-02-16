
function mostrartotalMontoMaterial(){
   
    $.ajax({
        url: base_url+"Proyecto/obtenerRegistroInsumo",
        type: "post",
        dataType: "json",
        data: {
            
       
        },
        success: function(data) {
            if (data.response == "success") {

                
                $('#RegistroMaterial').html(data.detalle);
            } else {
                generarAvisoError(data.message);
                alert("Error")
            }
        }
    });
    
}

mostrartotalMontoMaterial();
