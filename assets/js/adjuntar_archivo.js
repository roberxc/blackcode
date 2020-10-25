$(document).ready(function(){
	var i=1;
	$('#addarchivo').click(function(){
		i++;
    $('#tabla_archivo').append('<tr id="row'+i+'"><td><div class="input-group"><div class="custom-file"><input type="file" class="custom-file-input" id="exampleInputFile"><label class="custom-file-label" for="exampleInputFile">Adjuntar archivo</label></div><div class="input-group-append"><span class="input-group-text" id="">Subir</span></div></div></td>'+
    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_removearchivo">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_removearchivo', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
 	});
});