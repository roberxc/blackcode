function Success(){
    Swal.fire({
        icon: 'success',
        title: 'Se registro correctamente',
        text: 'Se ha ingresado correctamente al sistema',
        confirmButtonText: `Continuar`,
      }).then(function() {
        window.location = "/TIC2020/RegistroEntrada";
    });
}