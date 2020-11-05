$(document).on('click', '#add', function(e) {
    e.preventDefault();

    var monto = $("#montoingreso").val();
    var fecha = $("#fechaingreso").val();

    $.ajax({
        url: "ingresoCajaChica",
        type: "post",
        dataType: "json",
        data: {
            montoingreso: monto,
            fechaingreso: fecha,
        },
        success: function(data) {
            if (data.response == "success") {
                fetch();
                $('#exampleModal').modal('hide')
                $("#form")[0].reset();
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

$(document).on('click', '#back', function(e) {

    e.preventDefault();
    window.location.href = "MenuCaja";
});

function fetch() {
    $.ajax({
        url: "obtenerIngresosCajaChica",
        type: "get",
        dataType: "json",
        success: function(data) {
            var i = 1;
            var tbody = "";
            for (var key in data) {
                tbody += "<tr>";
                tbody += "<td>" + data[key]['FechaIngreso'] + "</td>";
                tbody += "<td>" + data[key]['MontoIngreso'] + "</td>";
                tbody += `<td>
                            <a class="btn btn-info btn-sm" href="<?php echo base_url()?>ControladorAdmin/CajaIngreso" data-toggle="modal" data-target="#EditarIngreso" value="${data[key]['id']}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Editar
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Eliminar
                           </a>
                            </td>`;
                tbody += "<tr>";
            }

            $("#tbody").html(tbody);
        }
    });
}

fetch();
