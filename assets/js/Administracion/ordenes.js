var i=1;

$("#añadir-orden").on('click', function(event) {
    var valor = $('#productos').val().split(',')[2];
    var id =$('#productos').val().split(',')[1];
    var producto = $('#productos').val().split(',')[0];
    i++;
    $('#productos_orden').append(
    '<tbody>'+
    '<tr>'+
        '<td><input type="text" id="item_material" placeholder="Ingrese" class="form-control" value="'+producto+'" /></td>'+
        '<td><input type="text" id="item_cantidad" placeholder="Ingrese" class="form-control" value="'+id+'" /></td>'+
        '<td><input type="text" id="item_cantidad" placeholder="Ingrese" class="form-control" /></td>'+
        '<td><input type="text" id="item_valor" placeholder="Ingrese" class="form-control valor-prod" value="'+valor+'"/></td>'+
        '<td><input type="text" id="item_cantidad" placeholder="Ingrese" class="form-control" value="19%" disabled/></td>'+
        '<td><input  type="text" id="item_valortotal" class="form-control" disabled/></td>'+
        '<td><button type="button" class="btnremove btn btn-danger" onclick="deleteRow(this)">X</button></td>'+
    '</tr>'+
    '</tbody>');

    listaValores();
    setTotal();

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

$('.tableprod tbody').on('click','.btnremove',function(){


    alert("CLICCICICIICI");


});


function deleteRow(btn) {
    var valor = $(this).parents('tr').find(".valor-prod").val();
    alert(valor);
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
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