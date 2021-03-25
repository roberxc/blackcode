<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Website Title -->
      <title>Bienvenido</title>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/js/test/css/jquery-ui.css"/>
      <!-- CSS file -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
      <link href="assets/css/bootstrap.css" rel="stylesheet">
      <link href="assets/css/fontawesome-all.css" rel="stylesheet">
      <link href="assets/css/swiper.css" rel="stylesheet">
      <link href="assets/css/magnific-popup.css" rel="stylesheet">
      <link href="assets/css/styles.css" rel="stylesheet">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <!-- SELECT CON BUSCADOR -->
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   </head>
   <body data-spy="scroll" data-target=".fixed-top">
      <?php $set_data = $this->session->all_userdata(); 
         if (isset($set_data['nombre_completo'])) {
           $nombre = $set_data['nombre_completo'];
         }else{
           redirect('/Login', 'refresh');
         }?>
      <!-- Preloader -->
      <div class="spinner-wrapper">
         <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
         </div>
      </div>
      <!-- end of preloader -->
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
         <!-- Text Logo - Use this if you don't have a graphic logo -->
         <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->
         <!-- Image Logo -->
         <a class="navbar-brand logo-image" href="index.html"></a>
         <!-- Mobile Menu Toggle Button -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-awesome fas fa-bars"></span>
         <span class="navbar-toggler-awesome fas fa-times"></span>
         </button>
         <!-- end of mobile menu toggle button -->
         <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link page-scroll" href="#header">Configurar cuenta <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link page-scroll" href="<?php echo base_url()?>login" class="nav-link active">Salir</a>
               </li>
            </ul>
         </div>
      </nav>
      <!-- end of navbar -->
      <!-- end of navigation -->
      <!-- Header -->
      <header id="header" class="header">
         <div class="header-content">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="text-container">
                        <h1> Bienvenido </br><span class="turquoise"><?php echo $nombre;?></span> </br>¿Qué desea hacer? </h1>
                        <!-- <p class="p-large">Administra tu trabajo diario </p> -->
                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">Registrar planilla</a></br> </br>
                        <a class="btn-solid-lg page-scroll" href="<?php echo base_url();?>PlantillaOperaciones/ModificacionPlanillaInicio">Editar planilla</a>
                     </div>
                     <!-- end of text-container -->
                  </div>
                  <!-- end of col -->
                  <div class="col-lg-6">
                  </div>
                  <!-- end of col -->
               </div>
               <!-- end of row -->
            </div>
            <!-- end of container -->
         </div>
         <!-- end of header-content -->
      </header>
      <!-- end of header -->
      <!-- end of header -->
      <div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <h4>Codigo: <input type="text" name="codigo_servicio" class="form-control-input" id="codigo_servicio"></h4>
                  <div class="form-group">
                     <label for="cars">Tipo de trabajo</label>
                     <select class="form-control-input" id="tipo_trabajo" onchange="generarCodigo()">
                        <option value="" selected>Seleccione</option>
                        <?php 
                           foreach($tipos_trabajos as $row)
                           { ?>
                        <option value="<?php echo $row->abreviacion?>"><?php echo $row->nombretipotrabajo?></option>
                        <?php }?>
                     </select>
                  </div>
                  <div class="form-group">
                     <input type="date" class="form-control-input" id="fecha_trabajo" name="fecha_trabajo" required>
                     <label class="label-control" for="cname">Fecha</label>
                     <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control-input" id="personacargo" name="persona_cargo" required>
                     <label class="label-control" for="cemail">Persona a cargo</label>
                     <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                     <label for="cars">Proyecto</label>
                     <select name="id_proyecto" class="form-control-input" id="id_proyecto">
                        <option value="" selected>Seleccione</option>
                        <?php
                           foreach($lista_proyectos as $i){
                              echo '<option value="'. $i->id_proyecto.'">'. $i->nombreproyecto .'</option>';
                              }
                              ?>
                     </select>
                     <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control-input" id="suma_asignada" name="suma_asignada" required>
                     <label class="label-control" for="cemail">Suma asignada</label>
                     <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                     <button class="btn-solid-reg popup-with-move-anim" id="validar-iniciotrabajo">Siguiente</button></br> </br>
                  </div>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of lightbox-basic -->
      <div id="detalleTrabajo" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4">
                  <h3>Trabajos realizados</h3>
                  <hr>
                  <div class="form-group">
                     <textarea class="form-control-textarea" id="detalle_trabajo" name="detalle_trabajo" required></textarea>
                     <label class="label-control" for="cmessage">Detalle de los trabajos realizados</label>
                     <div class="help-block with-errors"></div>
                  </div>
                  <div class="row">
                     <div class="col-lg-4">
                        <a class="btn-solid-reg popup-with-move-anim" href="#trabajadores">Siguiente</a>
                     </div>
                     <div class="col-lg-4">
                     </div>
                     <div class="col-lg-4">
                        <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#details-lightbox-1">Volver</a></br> </br>
                     </div>
                  </div>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of lightbox-basic -->
      <!-- end of details lightbox 1 -->
      <div id="trabajadores" class="lightbox-basic zoom-anim-dialog mfp-hide">
         <div class="container">
            <h3>Agregar personal</h3>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="recipient-bodega" class="col-form-label">Rut personal </label>
                  <select class="form-control-input" id="personal" onchange="setNombrePersonal()">
                     <option value="" selected>Seleccione</option>
                     <?php 
                        foreach($lista_personal as $row)
                        { ?>
                     <option value="<?php echo $row->rut?>,<?php echo $row->nombrecompleto?>"><?php echo $row->rut?></option>
                     <?php }?>
                  </select>
               </div>
            </div>
            <div class="row">
               <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
               <div class="col-lg-4" id="dynamic_field">
                  <hr>
                  <table class="table table-bordered" id="tabla_personal">
                     <TR>
                        <TH>Rut</TH>
                        <TH>Nombre completo</TH>
                        <TH></TH>
                     </TR>
                  </table>
               </div>
               <!-- end of col -->
               <!-- href="<?php echo base_url()?>PlantillaOperaciones"-->
            </div>
            <!-- end of row -->
         </div>
         <div class="col-lg-4">
            <a class="btn-solid-reg mfp-close page-scroll reg-trabajo">Siguiente</a>
         </div>
         <div class="col-lg-4">
            <a class="btn-solid-reg popup-with-move-anim" type="submit" href="#detalleTrabajo">Volver</a></br> </br>
         </div>
         <!-- end of container -->
      </div>
      <!-- end of lightbox-basic -->
      <!-- end of details lightbox 1 -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"
         integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
         integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
         integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
      <!-- Scripts modal -->
      <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
      <script type="text/javascript">
         var lista_personal = <?php echo json_encode($lista_personal); ?>;
      </script>
   </body>
   <script type="text/javascript" src="<?php echo base_url()?>assets/js/PersonalAsistencia.js"></script>
   <!-- Scripts -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
   <script src="<?php echo base_url()?>assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
   <script src="<?php echo base_url()?>assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
   <script src="<?php echo base_url()?>assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
   <script src="<?php echo base_url()?>assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
   <script src="<?php echo base_url()?>assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
   <script src="<?php echo base_url()?>assets/js/scripts.js"></script> <!-- Custom scripts -->
   <script src="<?php echo base_url()?>assets/js/Operaciones/ingreso_planilla.js"></script>
   <script src="<?php echo base_url()?>assets/js/test/js/jquery-ui.js"></script>
   <script>var base_url = '<?php echo base_url();?>';</script>
   <!-- JS file -->
   <script>
      $(document).ready(function()
      {
         $("#item_rut").autocomplete({
            source : "<?php echo site_url('Operacion/getPersonal') ?>",
      
            select: function(event, ui){
            $('[name="rut"]').val(ui.item.label);
            $('[name="nombre"]').val(ui.item.nama_mahasiswa);
      
            }
         });
      });
   </script>
   <script type="text/javascript">
      //mostrar tipoproducto
      $(document).ready(function(){
        $('#id_proyecto').select2({
          theme: "bootstrap"
        });
      });
   </script> 
</html>