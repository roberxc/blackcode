function fetch() {
    $.ajax({
        url: "obtenerTotalCajaChica",
        type: "get",
        dataType: "json",
        success: function(data) {
            console.log('Total: ' + data);
        }
    });
}

fetch();
