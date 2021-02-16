function detalleProyecto(table){
    var idproyecto = table.parentNode.parentNode.cells[0].textContent;
    window.location.href = base_url+"Proyecto/Detalle/"+idproyecto;


}