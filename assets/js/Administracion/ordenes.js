var i=1;

$("#añadir-orden").on('click', function(event) {
    var valor = $('#productos').val().split(',')[2];
    var id =$('#productos').val().split(',')[1];
    var producto = $('#productos').val().split(',')[0];
    i++;
    $('#productos_orden').append(
    '<tbody>'+
        '<tr class="tr">'+
            '<td contenteditable="false">'+producto+'</td>'+
            '<td contenteditable="false">'+id+'</td>'+
            '<td contenteditable="true" class="cantidad" onkeyup="calculfac()"></td>'+
            '<td contenteditable="true" class="precio" onkeyup="calculfac()">'+valor+'</td>'+
            '<td contenteditable="true" class="iva">'+ 19 +'</td>'+
            '<td contenteditable="false" class="result"></td>'+
            '<td><button type="button" class="btnremove btn btn-danger" onclick="deleteRow(this)">X</button></td>'+
        '</tr>' +
    '</tbody>');

    //listaValores();
    //setTotal();

});

$("#nuevo-producto").on('click', function(event) {
    $('#modal-nueva-orden').modal('hide');
});

$("#añadir-producto").on('click', function(event) {

    var producto = $('#nombre-producto').val();
    var valor = $('#valor-producto').val();
    $.ajax({
        url: base_url+"Ordenes/productoNuevo",
        type: "post",
        dataType: "json",
        data: {
            producto: producto,
            valor: valor,
        },
        success: function(respuesta) {
            if (respuesta.response == "success") {
                window.location.href = "Ordenes";
                generarAvisoExitoso('Producto ingresado correctamente!');
            
            } else if (respuesta.response === "error") {

				generarAvisoError(respuesta.message);
                
            }else {
                //$("#msg-error").show();
                generarAvisoError(respuesta);
            }
        }
    });

});

function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function calculfac() {
    $('.tr').each(function(){
       var amount= $('.cantidad', this).text();
       var price= $('.precio', this).text();
       var iva = $('.iva', this).text();
       var total = amount * price;
       var totaliva = (total * iva)/100;
       var result = total + totaliva;
       var resultado = Math.round(result).toFixed(0);
       $('.result', this).text(resultado);
    });
 }



let item_valor = [];

function listaValores() {
    item_valor = [];
    $('input[id="item_valor"]').each(function(){
        item_valor.push(parseInt($(this).val()));
    });
}

function setTotal() {
    var subtotal = item_valor.reduce((total, current) => total + current, 0);
    var iva = subtotal * 0.19;
    var total = subtotal + iva;
    document.getElementById("subtotal-txt").innerHTML = 'Subtotal: $' + subtotal;
    document.getElementById("iva-txt").innerHTML = 'IVA: $' + iva;
    document.getElementById("total-txt").innerHTML = 'Total: $' + total;
}


function generarAvisoError($mensaje) {
    Command: toastr["error"]($mensaje, 'Error')
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}

function generarAvisoExitoso($mensaje) {
    Command: toastr["success"]($mensaje, 'Correcto')
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}