$("#form-subir-cotizaciones").submit(function (event){
    event.preventDefault();
    var formData = new FormData($("#form-subir-cotizaciones")[0]);
    $.ajax({
        url:$("form").attr("action"),
        type:$("form").attr("method"),
        data:formData,
        dataType: "json",
        cache:false,
        contentType:false,
        processData:false,
        success:function(data){
            if (data.response === "success") {
                generarAvisoExitoso(data.message);
                window.location.href = base_url+"Cotizacion";
            } else if(data.response === "error") {
                generarAvisoError(data.message);

            }
        }
    });
});

function listaDocumentos (table) {
    var nrocotizacion= table.parentNode.parentNode.cells[0].textContent;
    $.ajax({
        url: base_url+"Cotizacion/detalleArchivos",
        type: "post",
        dataType: "json",
        data: {
            nro_cotizacion: nrocotizacion,
        },
        success: function(data) {
            if (data.response == "success") {
                // Add response in Modal body
                $('#descargar-documento').html(data.planilla);
                // Display Modal
                 //$('#detalle-trabajo').modal('show');
            } else {
                
            }
        }
    });

}

function generarAvisoError($mensaje){
    Command: toastr["error"]($mensaje,'Error')
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

function generarAvisoExitoso($mensaje){
    Command: toastr["success"]($mensaje,'Correcto')
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

$("#añadir-orden").on('click', function(event) {
    var valor = $('#material').val().split(',')[2];
    var id =$('#material').val().split(',')[1];
    var producto = $('#material').val().split(',')[0];
    $('#productos_orden').append(
    '<tbody>'+
        '<tr class="nm">'+
            '<td><input class="item" name="material[]" id="item_material" style="border:0;outline:0;display:inline-block" value='+producto+'></td>'+
            '<td><input class="iditem" name="id[]" id="item_id" style="border:0;outline:0;display:inline-block" value='+id+'></td>'+
            '<td><input class="cantidad" name="cantidad[]" id="item_cantidad" style="border:0;outline:0;display:inline-block" onkeyup="calculfac()"></td>'+
            '<td><input class="precio" name="costo[]" id="item_precio" style="border:0;outline:0;display:inline-block" onkeyup="calculfac()" value='+valor+'></td>'+
            '<td><input class="iva" name="iva[]" id="item_iva" style="border:0;outline:0;display:inline-block" onkeyup="calculfac()" value='+19+' disabled></td>'+
            '<td><input class="importe" name="importe[]" id="item_importe" style="border:0;outline:0;display:inline-block"></td>'+
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
                window.location.href = "Cotizacion";
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
    calculfac();
    var row = btn.parentNode.parentNode.rowIndex;
    document.getElementById("productos_orden").deleteRow(row);
}

function calculfac() {
    //Establecer el resumen de total y subtotal
    
    $("tr.nm").each(function() {
       var amount= $(this).find("input.cantidad").val();
       var price= $(this).find("input.precio").val();
       //var iva = $(this).find("input.iva").val();
       var total = amount * price;
       //var totaliva = (total * iva)/100;
       //var result = total + totaliva;
       var resultado = Math.round(total).toFixed(0);
       $(this).find("input.importe").val(resultado);
    });
    setTotal();

 }

item_valor = [];
function setTotal() {
    $('input[id="item_importe"]').each(function(){
         /* do something */ 
         item_valor.push(parseInt($(this).val()));
    });

    //Suma de valor total
    var subtotal = item_valor.reduce((total, current) => total + current, 0);
    var iva = subtotal * 0.19;
    var total = subtotal + iva;
    document.getElementById("subtotal-txt").innerHTML = 'Subtotal: $' + subtotal;
    document.getElementById("iva-txt").innerHTML = 'IVA: $' + iva;
    document.getElementById("total-txt").innerHTML = 'Total: $' + total;
    subtotal = 0;
    item_valor = [];
}

