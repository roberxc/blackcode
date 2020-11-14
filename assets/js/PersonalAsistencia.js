$(document).ready(function(){
	var count=1;
	var max=10;
	var x = 1;
	
	$('#agregarTrabajador').click(function(){
		if(x<=max){
			count = count + 1;
			var html_code = "<tr id='row"+count+"'>";
			html_code += "<td contenteditable='true' class='item_rut'></td>";
			html_code += "<td contenteditable='true' class='item_nombre'></td>";
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