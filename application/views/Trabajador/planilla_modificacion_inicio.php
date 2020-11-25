<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Website Title -->
      <title>Modificacion de trabajo diario</title>
      <!-- Styles -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/fontawesome-all.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/swiper.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/magnific-popup.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   </head>
   <body data-spy="scroll" data-target=".fixed-top">
      <!-- Preloader -->
      <div class="spinner-wrapper">
         <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
         </div>
      </div>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-awesome fas fa-bars"></span>
         <span class="navbar-toggler-awesome fas fa-times"></span>
         </button>
         <!-- end of mobile menu toggle button -->
         <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link page-scroll" href="<?php echo base_url()?>login" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>">Cancelar</a>
               </li>
            </ul>
         </div>
      </nav>
      <!-- end of navbar -->
      <!-- end of navigation -->
      <!-- Pricing -->
      <div id="pricing" class="cards-2">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
               <br>
                  <h3>Modificacion planilla de Trabajos Diarios</h3>
                  <div class="form-group">
                     <input type="text" class="form-control-input" id="codigo_servicio" required>
                     <label class="label-control">Codigo</label>
                     <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                     <p><a class="btn-solid-reg popup-with-move-anim float-left" id="validar-planillatrabajo" href="#detalleTrabajo">Validar</a></p><p><a class="btn-solid-reg float-right" href="<?php echo base_url();?>Operacion">Volver</a></p>
                     <br></br>
                     <br></br>
                  </div>
               </div>
               <!-- end of col -->
            </div>
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h5 class="m-0 text-dark">Trabajos realizados</h5>
                     </div>
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <div class="card-body p-0">
               <table class="table table-striped projects">
                  <thead>
                     <tr>
                        <th style="width: 15%">
                           Codigo
                        </th>
                        <th style="width: 20%">
                           Fecha
                        </th>
                        <th style="width: 20%">
                           Proyecto/Cliente
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        if($trabajos_realizados){
                           foreach($trabajos_realizados as $row){
                        ?>
                     <tr>
                        <td>
                           <?php echo $row->CodigoServicio?>
                        </td>
                        <td>
                           <?php echo $row->FechaTrabajo?>
                        </td>
                        <td>
                           <?php echo $row->NombreProyecto?>
                        </td>
                     </tr>
                     <?php }
                        }?>
                  </tbody>
               </table>
            </div>
            <!-- /.card-body -->
            <!-- end of row -->
         </div>
         <!-- end of container -->
      </div>
      <!-- end of container -->
      <div class="error"></div>
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
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
      <script src="<?php echo base_url();?>assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
      <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
      <script src="<?php echo base_url();?>assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
      <script src="<?php echo base_url();?>assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
      <script src="<?php echo base_url();?>assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
      <script src="<?php echo base_url();?>assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
      <script src="<?php echo base_url();?>assets/js/scripts.js"></script> <!-- Custom scripts -->
      <!--<script src="<?php echo base_url();?>assets/js/imagenes.js"></script>-->
      <script>var base_url = '<?php echo base_url();?>';</script>
      <script src="<?php echo base_url();?>assets/js/Operaciones/modificacion_planilla_inicio.js"></script>
   </body>
</html>