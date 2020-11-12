$(document).on('click', '#addviatico', function(e) {
    e.preventDefault();
    document.getElementById("vaticos").style.display = "none";
    var cena = $("#vcena").val();
    var almuerzo = $("#valmuerzo").val();
    var desayuno = $("#vdesayuno").val();
    var agua = $("#vagua").val();
    var alojamiento = $("#valojamiento").val();

    console.log(cena + ' ' + almuerzo + ' ' + desayuno + ' ' + agua + ' ' + alojamiento)
    $.ajax({
        url: "PlantillaOperaciones/registroGastoViaticos",
        type: "post",
        dataType: "json",
        data: {
            vcena: cena,
            valmuerzo: almuerzo,
            vdesayuno: desayuno,
            vagua: agua,
            valojamiento: alojamiento,
        },
        success: function(data) {
            if (data.response == "success") {
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

$(document).on('click', '#in-viaticos', function(e) {
    e.preventDefault();
    document.getElementById("vaticos").style.display = "block";

});



