$(document).ready(function(){
	var i=1;
	var p=1;
	//id del boton guardar 
	$('#GuardarDespiece').click(function(){
		i++;
		
	//ID de la clase #dynamic_field
	$('#div_despiece').append('<table id="row'+i+'" class="table table-bordered">'+
	'<tr><TD><input type="number" name="partida" id="numCantidad" class="form-control"/></TD>'+
	'<TD><input type="text" name="partida" id="txtItem" class="form-control"/></TD>'+
	'<TD><input type="number" name="partida" id="numPrecioDespiece" class="form-control"/></TD>'+
	'<TD><button type="button" id="'+i+'" class="btn btn-danger btn_remove">Eliminar</button></TD></TR> </table>');
	

});
                        
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});

	
});

$("#añadir-despiece").on('click', function(event) {
    var nombre = $('#partidas1').val().split(',')[1];
    var id =$('#partidas1').val().split(',')[0];
	var estado = $('#partidas1').val().split(',')[2];
	$.ajax({
        url: base_url+"Proyecto/obtenerDetalleDespiece",
        type: "post",
        dataType: "json",
        data: {
            id_partida: id,
        },
        success: function(respuesta) {
            if (respuesta.response == "success") {
				$('#detalle-etapas').html(respuesta.detalle);

            
            } else if (respuesta.response === "error") {
				alert("ERROR");

				generarAvisoError(respuesta.message);
                
            }else {
                //$("#msg-error").show();
                generarAvisoError(respuesta);
            }
        }
    });


});

/*
function test (table) {
	var idetapa = table.parentNode.parentNode.cells[0].textContent;
	document.getElementById("ID_Despiece").innerHTML = idetapa;
}*/

function setId(table){
	document.getElementById("ID_Despiece").value = test(table);
}
function setIdFlete(table){
	document.getElementById("id_etapa").value = test(table);
}
function test (table){
	var id=table.parentNode.parentNode.cells[0].textContent;
	return id;
}

