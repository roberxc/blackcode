<head>
   <!--Script alarma  -->
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <!--Script alarma  -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>BlackCode</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bbootstrap 4 -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.css">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- FONT AWESOME CSS -->
   <link href="<?php echo base_url(); ?>assets/evaluacionpro/css/font-awesome.min.css" rel="stylesheet" />
   <!-- ANIMATE  CSS -->
   <link href="<?php echo base_url(); ?>assets/evaluacionpro/css/animate.css" rel="stylesheet" />
   <!-- PRETTY PHOTO  CSS -->
   <link href="<?php echo base_url(); ?>assets/evaluacionpro/css/prettyPhoto.css" rel="stylesheet" />
   <!--  STYLE SWITCHER CSS -->
   <link href="<?php echo base_url(); ?>assets/evaluacionpro/css/styleSwitcher.css" rel="stylesheet" />
   <!-- CUSTOM STYLE CSS -->
   <link href="<?php echo base_url(); ?>assets/evaluacionpro/css/style.css" rel="stylesheet" />
   <!--PINK STYLE VERSION IS BY DEFAULT, USE ANY ONE STYLESHEET FROM FOUR STYLESHEETS (pink,green,blue and brown) HERE-->
   <link href="<?php echo base_url(); ?>assets/evaluacionpro/css/blue.css" id="mainCSS" rel="stylesheet" />
</head>
<body class="sidebar-mini layout-fixed sidebar-collapse">
   <?php $set_data = $this
      ->session
      ->all_userdata();
      if (isset($set_data['nombre_completo']))
      {
      $nombre = $set_data['nombre_completo'];
      } ?>
   <div class="wrapper">
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url() ?>Inicio" class="nav-link">Inicio</a>
         </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-bell"></i>
         <span class="badge badge-warning navbar-badge">153</span>
         </a>
      </li>
      <li class="nav-item dropdown user user-menu">
         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
         <img src="<?php echo base_url(); ?>assets/dist/img/0012.png" class="user-image img-circle elevation-2 alt="User Image">
         <span class="hidden-xs"><?php echo $nombre; ?></span>
         </a>
         <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
               <img src="<?php echo base_url(); ?>assets/dist/img/0012.png" class="img-circle elevation-2" alt="User Image">
               <p>Bienvenid@
                  Usuario
                  <small>(<?php echo $nombre; ?> ) </small> 
               </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
               <div class="row">
                  <div class="col-4 text-center">
                     <a href="<?php echo base_url() ?>Perfil">Perfil</a>
                  </div>
                  <div class="col-2 text-center">
                     <a href="#"></a>
                  </div>
                  <div class="col-6 text-center">
                     <a href="<?php echo base_url() ?>Login">Cerrar Sesión</a>
                  </div>
               </div>
               <!-- /.row -->
            </li>
            <!-- Menu Footer-->
         </ul>
      </li>
   </nav>
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