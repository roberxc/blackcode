$(document).on("ready", function(){
	$("#form_subidas").submit(function(e){
		e.preventDefault();
		var formdata = new FormData($("#form_subidas")[0]);

		var codigoservicio = $("#codigo_servicio").val();
		
		$.ajax({
			url:$(this).attr("action"),
			type:$(this).attr("method"),
			data: {
				data:formdata,
				codigo_servicio: codigoservicio,
			},
			contentType:false,
			processData:false,
			cache:false,
			success:function(resp){
				alert(resp);
			}
		});
	});
});