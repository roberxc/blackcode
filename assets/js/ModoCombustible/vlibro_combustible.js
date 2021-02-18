function descargarDocumento(table){
    var iddocumento = table.parentNode.parentNode.cells[0].textContent;
    window.location.href = base_url + "CRCombustible/descargaDocCombustible/"+iddocumento;
}
