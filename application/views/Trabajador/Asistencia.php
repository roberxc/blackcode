<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- SEO Meta Tags -->
      <meta name="description" content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
      <meta name="author" content="Inovatik">
      <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
      <meta property="og:site_name" content="" />
      <!-- website name -->
      <meta property="og:site" content="" />
      <!-- website link -->
      <meta property="og:title" content=""/>
      <!-- title shown in the actual shared post -->
      <meta property="og:description" content="" />
      <!-- description shown in the actual shared post -->
      <meta property="og:image" content="" />
      <!-- image link, make sure it's jpg -->
      <meta property="og:url" content="" />
      <!-- where do you want your post to link to -->
      <meta property="og:type" content="article" />
      <!-- Website Title -->
      <title>Registro de trabajo diario</title>
      <!-- Styles -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
      <link href="assets/css/bootstrap.css" rel="stylesheet">
      <link href="assets/css/fontawesome-all.css" rel="stylesheet">
      <link href="assets/css/swiper.css" rel="stylesheet">
      <link href="assets/css/magnific-popup.css" rel="stylesheet">
      <link href="assets/css/styles.css" rel="stylesheet">
      <!-- Favicon  -->
      <link rel="icon" href="">
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
      <!-- end of preloader -->
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
         <!-- Text Logo - Use this if you don't have a graphic logo -->
         <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->
         <!-- Image Logo -->
         <!-- Mobile Menu Toggle Button -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-awesome fas fa-bars"></span>
         <span class="navbar-toggler-awesome fas fa-times"></span>
         </button>
         <!-- end of mobile menu toggle button -->
         <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link page-scroll" href="<?php echo base_url()?>PlantillaOperaciones" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>">Cancelar</a>
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
                  <h2>Ingresar Asistencia del personal </h2>
                  <input type="hidden" id="codigo_servicio" value="<?php if(isset($codigo)){echo $codigo;}else{echo error;}?>"/>
               </div>
               <!-- end of col -->
            </div>
            <!-- end of row -->
            <?php if (isset($lista_personal)){
               foreach($lista_personal as $row){
               ?>
            <div class="card">
               <div class="card-body">
                  <div class="card-title"><?php echo $row->Nombre;?></div>
                  <hr class="cell-divide-hr">
                  </br></br>
                  <table class="table table-bordered" >
                     <TR>
                        <TD class=""><input type="hidden" id="item_id" class="form-control" value="<?php echo $row->ID;?>" disabled/></TD>
                     </TR>
                     <TR>
                        <TH>Rut</TH>
                        <TD class=""><input type="text" id="" class="form-control" value="<?php echo $row->Rut;?>" disabled/></TD>
                     </TR>
                     <TR>
                        <TD COLSPAN=2  BGCOLOR="6ADDF7">Asistencia en la mañana:</TD>
                     </TR>
                     <TR>
                        <TH >Hora de entrada:</TH>
                        <TD><input class="form-control" id="item_entradam" type="time" value="08:30" id="example-time-input"/></TD>
                     </TR>
                     <TR>
                        <TH>Hora de salida:</TH>
                        <TD><input class="form-control" id="item_salidam" type="time" value="14:00" id="example-time-input"/></TD>
                     </TR>
                     <TR>
                        <TD COLSPAN=2  BGCOLOR="6ADDF7">Asistencia en la tarde:</TD>
                     </TR>
                     <TR>
                        <TH>Hora de entrada:</TH>
                        <TD><input class="form-control" id="item_entradat" type="time" value="15:00" id="example-time-input"/></TD>
                     </TR>
                     <TR>
                        <TH>Hora de salida:</TH>
                        <TD><input class="form-control" id="item_salidat" type="time" value="18:30" id="example-time-input"/></TD>
                     </TR>
                  </table>
                  <hr class="cell-divide-hr">
               </div>
            </div>
            <?php }
               }?>
            <!-- end of card -->
            <!-- end of card -->
         </div>
         <!-- end of col -->
      </div>
      <!-- end of row -->
      </div>
      <!-- end of container -->
      </div>
      <div id="contact" class="form-2">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <h2>Guardar Asistencia de los trabajadores</h2>
                  <a class="btn-solid-reg asistencia-registro">Guardar</a><a class="btn-solid-reg" href="<?php echo base_url()?>PlantillaOperaciones"  <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>>Cancelar</a>
               </div>
            </div>
            <!-- end of col -->
         </div>
         <!-- end of row -->
      </div>
      <!-- end of container -->
      </div>
      <!-- end of form-2 -->
      <!-- end of contact -->
      <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
      <script src="assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
      <script src="assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
      <script src="assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
      <script src="assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
      <script src="assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
      <script src="assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
      <script src="assets/js/scripts.js"></script> <!-- Custom scripts -->
      <script src="<?php echo base_url()?>assets/js/Operaciones/ingreso_asistencia.js"></script>
   </body>
</html>