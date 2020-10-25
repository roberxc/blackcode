$(document).ready(function(){
	var i=1;
	$('#addarchivo').click(function(){
		i++;
    $('#tabla_archivo').append('<tr id="row'+i+'"><td><input type="file" name="archivossubidos[]"></td>'+
    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_removearchivo">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_removearchivo', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});
});