var i=1;

$("#añadir-orden").on('click', function(event) {
    var valor = $('#material').val().split(',')[2];
    var id =$('#material').val().split(',')[1];
    var producto = $('#material').val().split(',')[0];
    i++;
    $('#productos_orden').append(
    '<tbody>'+
        '<tr class="nm">'+
            '<td contenteditable="false" class="item">'+producto+'</td>'+
            '<td contenteditable="false" class="iditem">'+id+'</td>'+
            '<td contenteditable="true" class="cantidad" onkeyup="calculfac()"></td>'+
            '<td contenteditable="true" class="precio" onkeyup="calculfac()">'+valor+'</td>'+
            '<td contenteditable="true" class="iva">'+ 19 +'</td>'+
            '<td contenteditable="false" class="importe"></td>'+
            '<td><button type="button" class="btnremove btn btn-danger" onclick="deleteRow(this)">X</button></td>'+
        '</tr>' +
    '</tbody>');

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
    setTotal();
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

//Llenar tabla de detalle orden al hacer click en el ojo
function setTablaDetalle(table){
    var iditem = table.parentNode.parentNode.cells[0].textContent;
    $.ajax({
        url: base_url+"Ordenes/obtenerDetalleOrden",
        type: "post",
        dataType: "json",
        data: {
            iditem: iditem,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#detalle-ordenes').html(data.detalle);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });
}

function calculfac() {
    //Establecer el resumen de total y subtotal
    setTotal();
    $('.nm').each(function(){
       var amount= $('.cantidad', this).text();
       var price= $('.precio', this).text();
       var iva = $('.iva', this).text();
       var total = amount * price;
       var totaliva = (total * iva)/100;
       var result = total + totaliva;
       var resultado = Math.round(result).toFixed(0);
       $('.importe', this).text(resultado);
    });

 }

item_valor = [];
function setTotal() {
    $('#productos_orden').find("td.precio").each(function(index,elem){
         /* do something */ 
         item_valor.push(parseInt($(elem).text()));
    });
    //Suma de valor total
    var subtotal = item_valor.reduce((total, current) => total + current, 0);
    var iva = subtotal * 0.19;
    var total = subtotal + iva;
    document.getElementById("subtotal-txt").innerHTML = 'Subtotal: $' + subtotal;
    document.getElementById("iva-txt").innerHTML = 'IVA: $' + iva;
    document.getElementById("total-txt").innerHTML = 'Total: $' + total;
}

$("#añadir-nuevaorden").on('click', function(event) {
    item_producto = [];
    $('#productos_orden').find("td.item").each(function(index,elem){
         /* do something */ 
         item_producto.push($(elem).text());
    });
    
    item_iva = [];
    $('#productos_iva').find("td.iva").each(function(index,elem){
         /* do something */ 
         item_iva.push($(elem).text());
    });
    
    item_importe = [];
    $('#productos_orden').find("td.importe").each(function(index,elem){
         /* do something */ 
         item_importe.push($(elem).text());
    });
    
    item_cantidad = [];
    $('#productos_orden').find("td.cantidad").each(function(index,elem){
         /* do something */ 
         item_cantidad.push(parseInt($(elem).text()));
    });
    
    item_valor = [];
    $('#productos_orden').find("td.precio").each(function(index,elem){
         /* do something */ 
         item_valor.push(parseInt($(elem).text()));
    });

    item_idmaterial = [];
    $('#productos_orden').find("td.item").each(function(index,elem){
         /* do something */ 
         item_idmaterial.push(parseInt($(elem).text()));
    });

    //Suma de valor total
    var subtotal = item_valor.reduce((total, current) => total + current, 0);
    var iva = subtotal * 0.19;
    var total = subtotal + iva;

    var idproveedor = $("#proveedor").val();
    var idbodega = $("#bodega").val();
    var estado = $("#estado").val();

    var proyecto = $("#proyecto").val();

    $.ajax({
        url: base_url+"Ordenes/nuevaOrden",
        type: "post",
        dataType: "json",
        data: {
            lista_iditem: item_idmaterial,
            lista_item: item_producto,
            lista_importe: item_importe,
            lista_cantidad: item_cantidad,
            lista_iva: item_iva,
            lista_valor: item_valor,
            idproveedor: idproveedor,
            idbodega: idbodega,
            estado: estado,
            proyecto: proyecto,
            total: total,
        },
        success: function(data) {
            if (data.response === "success") {
                window.location.href = base_url+"Ordenes";
            } else {


            }
        }
    }); 


    

});

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