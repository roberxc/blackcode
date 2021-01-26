$(document).ready(function(){
	var i=1;
	var p=1;
	$('#durante').click(function(){
		i++;
	$('#dynamic_field').append('<table id="row'+i+'" class="table table-bordered">'+
	'<TR><TH>Material</TH><TD><input type="text" id="item_material" placeholder="Ingrese" class="form-control" /></TD></TR>'+
	'<TR><TH>Cantidad</TH><TD><input type="text" id="item_cantidad" placeholder="Ingrese" class="form-control" /></TD></TR>'+
	'<TR><TH>Valor/Unidad</TH><TD><input  type="text" id="item_valortotal" placeholder="Ingrese" class="form-control" /></TD></TR>'+
	'<TR><TH>Eliminar</TH><TD><button type="button" id="'+i+'" class="btn btn-danger btn_remove">X</button></TD></TR> </table>');
	});
                                
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});

	
});