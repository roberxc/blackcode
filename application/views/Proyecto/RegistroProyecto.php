<head>
   <!--Script alarma  -->
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <!--Script alarma  -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
   <title>BlackCode</title>
   <!-- Tell the browser to be responsive to screen width -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <!-- CUSTOM STYLE CSS -->
   <link href="<?php echo base_url(); ?>assets/evaluacionpro/css/style.css" rel="stylesheet" />
   <!--PINK STYLE VERSION IS BY DEFAULT, USE ANY ONE STYLESHEET FROM FOUR STYLESHEETS (pink,green,blue and brown) HERE-->
   <link href="<?php echo base_url(); ?>assets/evaluacionpro/css/blue.css" id="mainCSS" rel="stylesheet" />
</head>
   <?php $set_data = $this
      ->session
      ->all_userdata();
      if (isset($set_data['nombre_completo']))
      {
      $nombre = $set_data['nombre_completo'];
      } ?>
   <div class="content-wrapper">
   <!------------------------------------------Registro Proyectos---------------------------------->
   <div id="home-sec">
      <div class="overlay">
         <div class="container">
            <div class="row pad-top-bottom  move-me">
               <div class="col-lg-5 col-md-5 col-sm-5 text-center">
                  <form id="fromProyecto">
                     <label>Nombre Proyecto</label>
                     <div class="form-group">
                        <input type="text" class="form-control" id="nombreProyecto" required="required"  />
                     </div>
                     <label>Fecha de inicio</label>
                     <div class="form-group">
                        <input type="date" class="form-control" id="fechaInicio" required="required"  />
                     </div>
                     <label>Fecha de termino</label>
                     <div class="form-group">
                        <input type="date" class="form-control" id="fechaTermino" required="required"  />
                     </div>
                     <label>Monto total del proyecto</label>
                     <div class="form-group">
                        <input type="number" class="form-control" id="monto" required="required" />
                     </div>
                     <div class="form-group">
                        <button type="button" id="addProyecto"  class="btn custom-btn-one">Guardar</button>
                     </div>
                  </form>
               </div>
               <div class="col-lg-2 col-md-2 col-sm-2 text-center  ">
                  <a onclick="Success();" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".1s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".2s">
                     Partidas</h3>
                  </a>
                  <a onclick="Success();"  class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".3s">
                     <i class="fa fa-briefcase icon-round"></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".4s">Etapas</h4>
                  </a>
                  <a onclick="Success();"  class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Despiece</h4>
                  </a>
                  <a onclick="Success();"  class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Instalación</h4>
                  </a>
                  <a onclick="Success();"  class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Supervisión</h4>
                  </a>
                  <a onclick="Success();"  class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Configuración</h4>
                  </a>
                  <a onclick="Success();"  class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Flete traslado</h4>
                  </a>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                  
                  <TABLE BORDER class='table table-bordered'>
                     <TR>
                        <TD class="bg-info"><h5>Precio sugerido Proyecto</h5></TD> 
                     </TR>
                     <TR>
                        <TD scope="col">$0</TD> 
                     </TR>
                  </TABLE>
            </div>

                  
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>

    <!-- ESTE PARA LAS ALERTAS --->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <script src="<?php echo base_url();?>assets/js/Proyecto_Error.js"></script>                        

   <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <!--Script alarma  -->
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   <!--Script alarma  -->
   <script>
      var base_url = '<?php echo base_url();?>';
   </script>
   <script src="<?php echo base_url();?>assets/js/EvaluacionProyecto/RegistroProyecto.js"></script>
  

</body>
</html>