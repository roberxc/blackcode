<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>BlackCode</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- JQVMap -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/jqvmap/jqvmap.min.css">
      <!-- pace-progress -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css">  
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/summernote/summernote-bs4.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed pace-primary">
      <?php $set_data = $this->session->all_userdata(); 
         if (isset($set_data['nombre_completo'])) {
           $nombre = $set_data['nombre_completo'];
         }?>
      <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="<?php echo base_url()?>Inicio" class="nav-link">Inicio</a>
            </li>
         </ul>
         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">
         <!-- Notifications Dropdown Menu -->
         <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="bx bxs-bell bx-sm bx-tada"></i>
            <span class="badge badge-warning navbar-badge"><?php if(isset($totalnotificaciones)){ echo$totalnotificaciones;}else{echo 0;}?></span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <span class="dropdown-item dropdown-header"><?php if(isset($totalnotificaciones)){ echo$totalnotificaciones;}else{echo 0;}?> Notificaciones</span>
               <div class="dropdown-divider"></div>
               <?php if(isset($totaldocumentos) && ($totaldocumentos>0)){?>
               <div class="dropdown-divider"></div>
               <a href="<?php echo base_url()?>Documentacion/Actualizable" class="dropdown-item">
               <i class="fas fa-file mr-2"></i> <?php if(isset($totaldocumentos)){ echo$totaldocumentos;}else{echo 0;}?> documentos pronto a expirar
               </a>
               <div class="dropdown-divider"></div>
               <?php } ?>

                <!--  $is_cajachica es boolean para comprobar si existe una notificacion para caja chica-->
               <?php if(isset($is_cajachica) && ($is_cajachica)){?>
               <div class="dropdown-divider"></div>
               <a href="<?php echo base_url()?>Administracion/MenuCaja" class="dropdown-item">
               <i class="fas fa-file mr-2"></i> Baja disponibilidad en caja chica
               </a>
               <div class="dropdown-divider"></div>
               <?php } ?>
               <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
            </div>
         </li>
         <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url();?>assets/dist/img/0016.png" class="user-image img-circle elevation-2 alt="User Image">
            <span class="hidden-xs"><?php echo $nombre;?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <!-- User image -->
               <li class="user-header bg-primary">
                  <img src="<?php echo base_url();?>assets/dist/img/0016.png" class="img-circle elevation-2" alt="User Image">
                  <p>Bienvenid@
                     Usuario
                     <small>(<?php echo $nombre;?> ) </small> 
                  </p>
               </li>
               <!-- Menu Body -->
               <li class="user-body">
                  <div class="row">
                     <div class="col-4 text-center">
                        <a href="<?php echo base_url()?>Perfil">Perfil</a>
                     </div>
                     <div class="col-2 text-center">
                        <a href="#"></a>
                     </div>
                     <div class="col-6 text-center">
                        <a href="<?php echo base_url()?>Login">Cerrar Sesión</a>
                     </div>
                  </div>
                  <!-- /.row -->
               </li>
               <!-- Menu Footer-->
            </ul>
         </li>
      </nav>