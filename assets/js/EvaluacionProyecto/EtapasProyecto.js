$(document).ready(function(){
	var i=1;
	var p=1;
	//id del boton guardar 
	$('#GuardarEtapa').click(function(){
		i++;
		
	//ID de la clase #dynamic_field
	$('#divEtapa').append('<table id="row'+i+'" class="table table-bordered">'+
	'<tr><TD><input type="text" name="partida" id="nombre_etapa" class="form-control"/></TD>'+
	'<TD><button type="button" id="'+i+'" class="btn btn-danger btn_remove">Eliminar</button></TD></TR> </table>');
	

});
                        
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});

	
});

