$(document).ready(function(){
	var i=1;
	$('#addmaterial_bodega').click(function(){
		i++;
    $('#tabla_bodega').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Ingrese" class="form-control name_list" /></td>'+
    '<td><input type="text" name="cantidad" placeholder="Ingrese" id="'+i+'" class="form-control"/></td>'+
    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_bodega">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove_bodega', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});  
	
});