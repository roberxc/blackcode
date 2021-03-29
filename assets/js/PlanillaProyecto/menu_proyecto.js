$(document).on('click', '#vista_proyecto', function(e) {
    e.preventDefault();
    var id_proyecto = $('#id_proyecto').val();
    window.location.href = base_url + "DirectorioProyecto/"+id_proyecto;
});
