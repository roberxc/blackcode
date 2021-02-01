$(document).ready(function(){
	var i=1;
	var p=1;
	//id del boton guardar 
	$('#GuardarInstalacion').click(function(){
		i++;
		
	//ID de la clase #dynamic_field
	$('#divInstalacion').append('<table id="row'+i+'" class="table table-bordered">'+
	'<TD><input type="number" name="partida" id="numCantidadIns" class="form-control"/></TD>'+
    '<TD><input type="text" name="partida" id="txtItemIns" class="form-control"/></TD>'+
    '<TD><input type="number" name="partida" id="numPrecioIns" class="form-control"/></TD>'+
	'<TD><button type="button" id="'+i+'" class="btn btn-danger btn_remove">Eliminar</button></TD></TR> </table>');
	

});
                        
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});

	
});
