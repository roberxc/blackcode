$(document).ready(function(){
	var i=1;
	$('#antes').click(function(){
		i++;
	$('#dynamic_field2').append('<table id="row'+i+'" class="table table-bordered">'+
	'<TR><TH>Material</TH><TD><input type="text" id="item_material2" placeholder="Ingrese" class="form-control"/></TD></TR>'+
	'<TR><TH>Cantidad</TH><TD><input type="text" id="item_cantidad2" placeholder="Ingrese" class="form-control"/></TD></TR>'+
	'<TR><TH>Total $</TH><TD><input  type="text" id="item_valortotal2" placeholder="Ingrese" class="form-control"/></TD></TR>'+
	'<TR><TH>Eliminar</TH><TD><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></TD></TR> </table>');
	});
                                
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});

	
});