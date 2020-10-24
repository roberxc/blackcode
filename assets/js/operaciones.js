$(document).ready(function(){
	var i=1;
	var p=1;
	$('#addmaterial').click(function(){
		i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Ingrese" class="form-control name_list" /></td>'+
    '<td><input type="text" name="cantidad" placeholder="Ingrese" id="'+i+'" class="form-control"/></td>'+
    '<td><input type="text" name="valor" placeholder="Ingrese" id="'+i+'" class="form-control"/></td>'+
    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});

  	$('#addmaterial2').click(function(){
		p++;
		$('#dynamic_field2').append('<tr id="row'+p+'"><td><input type="text" name="name[]" placeholder="Ingrese" class="form-control name_list" /></td>'+
		'<td><input type="text" name="cantidad" placeholder="Ingrese" id="'+p+'" class="form-control"/></td>'+
		'<td><input type="text" name="valor" placeholder="Ingrese" id="'+p+'" class="form-control"/></td>'+
		'<td><button type="button" name="remove" id="'+p+'" class="btn btn-danger btn_remove2">X</button></td></tr>');
	});

	$(document).on('click', '.btn_remove2', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});
  
	
});