$(document).on('click', '#vista_proyecto', function(e) {
    e.preventDefault();
    var id_proyecto = $('#id_proyecto').val();
    window.location.href = "DirectorioProyecto/"+id_proyecto;
});
