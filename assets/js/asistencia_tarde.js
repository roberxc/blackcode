$(document).ready(function(){
	var i=1;
	var p=1;
	$('#addpersonal_tarde').click(function(){
		i++;
    $('#tabla_personal_tarde').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Ingrese" class="form-control name_list" /></td>'+
	'<td><input type="text" name="cantidad" placeholder="Ingrese" id="'+i+'" class="form-control"/></td>'+
	'<td><input type="time" id="default-picker" class="form-control"></td>'+
	'<td><input type="time" id="default-picker" class="form-control"></td>'+
	'<td><input type="time" id="default-picker" class="form-control"></td>'+
    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_removepersonaltarde">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_removepersonaltarde', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});
});