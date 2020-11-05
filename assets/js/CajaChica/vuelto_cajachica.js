$(document).on('click', '#guardarvuelto', function(e) {
    e.preventDefault();

    var vuelto = $("#vuelto").val();
    var fecha = $("#fecha").val();

    $.ajax({
        url: "registroVuelto",
        type: "post",
        dataType: "json",
        data: {
            vuelto: vuelto,
            fecha: fecha,
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
    document.getElementById("fecha").value = my_row_value;

});



$(document).on('click', '#back', function(e) {

    e.preventDefault();
    window.location.href = "MenuCaja";
});

function fetch() {
    $.ajax({
        url: "obtenerVueltosCajaChica",
        type: "get",
        dataType: "json",
        success: function(data) {
            var i = 1;
            var tbody = "";
            for (var key in data) {
                tbody += "<tr>";
                tbody += "<td>" + data[key]['NombreDestinatario'] + "</td>";
                tbody += "<td>" + data[key]['Fecha'] + "</td>";
                tbody += "<td>" + data[key]['Asignado'] + "</td>";
                tbody += "<td>" + data[key]['Vuelto'] + "</td>";
                tbody += `<td>
                            <a class="btn btn-info btn-sm" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                            data-target="#vuelto1" id="ingresar" data-row-val="`+ data[key]['Fecha'] + `">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Ingresar
                            </a>
                        </td>`;
                tbody += "<tr>";
            }

            $("#tbody").html(tbody);
        }
    });
}

fetch();