$(document).ready(function(){
	var i=1;
	var p=1;
	//id del boton guardar 
	$('#GuardarEtapa').click(function(){
		i++;
		
	//ID de la clase #dynamic_field
	$('#divEtapa').append('<table id="row'+i+'" class="table table-bordered">'+
	'<tr><TD><input type="text" name="partida" id="nombre_partida" class="form-control"/></TD>'+
	'<TD><button type="button" id="'+i+'" class="btn btn-danger btn_remove">Eliminar</button></TD></TR> </table>');
	

});
                        
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});

	
});

$(document).ready(function(){
	var count=1;
	var max=10;
	var x = 1;
	
	$('#agregarTrabajador').click(function(){
		if(x<=max){
			count = count + 1;
			var html_code = "<tr id='row"+count+"'>";
			html_code += "<td><input type='text' id='item_rut' placeholder='Ingrese' class='form-control'/></td>";
			html_code += "<td><input type='text' id='item_nombre' placeholder='Ingrese' class='form-control'/></td>";
			html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
			html_code += "</tr>";
			$('#tabla_personal').append(html_code);
			x++;
		}
		
	});

	$(document).on('click', '.remove',function(){
		var delete_row = $(this).data("row");
		$('#' + delete_row).remove();
	});

});