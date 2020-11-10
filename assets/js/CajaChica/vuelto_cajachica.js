$(document).on('click', '#guardarvuelto', function(e) {
    e.preventDefault();

    var vuelto = $("#vuelto").val();
    var fecha = $("#fecha").val();
    var monto_asignado = $("#monto").val();
    var vuelto_asignado = $("#vueltoasignado").val();

    $.ajax({
        url: "registroVuelto",
        type: "post",
        dataType: "json",
        data: {
            vuelto: vuelto,
            fecha: fecha,
            monto_asignado: monto_asignado,
            vuelto_asignado: vuelto_asignado,
        },
        success: function(data) {
            if (data.response == "success") {
                fetch();
                $('#vuelto1').modal('hide')
                $("#formvuelto")[0].reset();
                Command: toastr["success"](data.message)

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
            } else {
                $('#vuelto1').modal('hide');
                $("#formvuelto")[0].reset();
                Command: toastr["error"](data.message)

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
        }
    });

});

$(document).on('click', '#ingresar', function(e) {
    e.preventDefault();
    var my_row_value = $(this).attr('data-row-val');
    var monto = $(this).attr('data-row-monto');
    var vueltoasignado = $(this).attr('data-row-vueltoasignado');
    //alert('Monto: ' + monto);
    document.getElementById("fecha").value = my_row_value;
    document.getElementById("monto").value = monto;
    document.getElementById("vueltoasignado").value = vueltoasignado;
});



$(document).on('click', '#back', function(e) {

    e.preventDefault();
    window.location.href = "MenuCaja";
});

//Metodo para listar la tabla segun el buscador
$(document).on('click', '#buscador', function(e) {

    fetch();
});

function fetch() {

    var destinatario = $("#destinatario").val();
    var fecha_vuelto = $("#fechavuelto").val();

    $.ajax({
        url: "obtenerVueltosCajaChica",
        type: "post",
        dataType: "json",
        data: {
            destinatario: destinatario,
            fecha_vuelto: fecha_vuelto,
        },
        success: function(data) {
            var i = 1;
            var tbody = "";
            for (var key in data) {
                if(data[key]['Estado']==2){
                    tbody += "<tr>";
                    tbody += "<td>" + data[key]['NombreDestinatario'] + "</td>";
                    tbody += "<td>" + data[key]['Fecha'] + "</td>";
                    tbody += "<td>" + data[key]['Asignado'] + "</td>";
                    tbody += "<td>" + data[key]['Vuelto'] + "</td>";
                    tbody += "<td>" + "Reingresado" + "</td>";
                    tbody += `<td>
                                <a class="btn btn-info btn-sm" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                                data-target="#vuelto1" id="ingresar" data-row-val="`+ data[key]['Fecha'] + 
                                `" data-row-monto="`+ data[key]['Asignado'] + `" data-row-vueltoasignado="`+ data[key]['Vuelto'] + `">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Ingresar
                                </a>
                            </td>`;
                    tbody += "<tr>";
                }else if(data[key]['Estado']==1){
                    tbody += "<tr>";
                    tbody += "<td>" + data[key]['NombreDestinatario'] + "</td>";
                    tbody += "<td>" + data[key]['Fecha'] + "</td>";
                    tbody += "<td>" + data[key]['Asignado'] + "</td>";
                    tbody += "<td>" + data[key]['Vuelto'] + "</td>";
                    tbody += "<td>" + "Ingresado" + "</td>";
                    tbody += `<td>
                                <a class="btn btn-info btn-sm" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                                data-target="#vuelto1" id="ingresar" data-row-val="`+ data[key]['Fecha'] + 
                                `" data-row-monto="`+ data[key]['Asignado'] + `" data-row-vueltoasignado="`+ data[key]['Vuelto'] + `">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Ingresar
                                </a>
                            </td>`;
                    tbody += "<tr>";
                }
            }

            $("#tbody").html(tbody);
        }
    });
}

fetch();