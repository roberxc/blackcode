$(document).ready(function(){
	var i=1;
	$('#addgastos_varios').click(function(){
		i++;
    $('#tabla_gastosvarios').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Ingrese" class="form-control name_list" /></td>'+
    '<td><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">$</span></div><input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"></div></td>'+
    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_gastosvarios">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove_gastosvarios', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});  
	
});