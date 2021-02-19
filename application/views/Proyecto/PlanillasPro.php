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
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/stylePlanillapro.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css" />
   </head>
   <body class="sidebar-mini layout-fixed sidebar-collapse">
      <input type="text" id="codigoproyecto" value="<?php echo$codigo;?>" class="form-control" />
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
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">153</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <span class="dropdown-item dropdown-header">3 Notifications</span>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
               <i class="fas fa-envelope mr-2"></i> 4 new messages
               <span class="float-right text-muted text-sm">3 mins</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
               <i class="fas fa-users mr-2"></i> 8 friend requests
               <span class="float-right text-muted text-sm">12 hours</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item">
               <i class="fas fa-file mr-2"></i> 3 new reports
               <span class="float-right text-muted text-sm">2 days</span>
               </a>
               <div class="dropdown-divider"></div>
               <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
         </li>
         <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url();?>assets/dist/img/0012.png" class="user-image img-circle elevation-2 alt="User Image">
            <span class="hidden-xs"><?php echo $nombre;?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <!-- User image -->
               <li class="user-header bg-primary">
                  <img src="<?php echo base_url();?>assets/dist/img/0012.png" class="img-circle elevation-2" alt="User Image">
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
      <div class="smoke">
         <div class="container" id="fh5co-pricing">
            <div class="heading animate-box">
               <h2><b>Monto total</b></h2>
            </div>
            <div class="text-center animate-box">
               <h3>$ <?php if(isset($Monto_proyecto)){if($Monto_proyecto[0]->montototal>0){echo $Monto_proyecto[0]->montototal;}else{ echo '0';}}else{ echo '0';}?></h3>
            </div>
            <div class="heading animate-box">
               <h2><b>Balance Proyecto</b></h2>
            </div>
            <div class="text-center animate-box">
               <h3>$ <?php if(isset($Monto_balanceProyecto)){echo $Monto_balanceProyecto;}else{ echo '0';}?></h3>
            </div>
            <br><br>
            <div class="row">
               <div class="col-sm-4 animate-box" data-animate-effect="fadeInLeft">
                  <div class="price-box-dark animate-box">
                     <h3><b>Registro compras materiales</b></h3>
                     <div class="gr-line"></div>
                     <div >Total monto <b class="text-gr" id="MontoTotal">$ <?php if(isset($Monto_total)){if($Monto_total[0]->totalMonto>0){echo $Monto_total[0]->totalMonto;}else{ echo '0';}}else{ echo '0';}?></b></div>
                     <div class="gr-line"></div>
                     <div>Total Presupuesto <b class="text-gr" id="presupuesto" >$ <?php if(isset($Monto_presupuesto)){if($Monto_presupuesto[0]->totalpresupuesto>0){echo $Monto_presupuesto[0]->totalpresupuesto;}else{ echo '0';}}else{ echo '0';}?></b></div>
                     <div class="gr-line"></div>
                     <div>Total Balance <b class="text-gr" id="balance" >$ <?php if(isset($Monto_balance)){ echo $Monto_balance;}else{echo 'Error';}?></b></b> </div>
                     <br>
                     <button type="button" class="btn btn-banner" onclick="generarTablaRegistroMaterial()" data-toggle="modal"
                        data-target="#materiales">Ver detalles</button>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="price-box-dark animate-box">
                     <h3><b>Registro trabajo diarios</b></h3>
                     <div class="gr-line"></div>
                     <div>Registro mano de obra</div>
                     <div class="gr-line"></div>
                     <br>
                     <button class="btn btn-banner" onclick="generarTablaTrabajoDiario()" data-toggle="modal"
                        data-target="#trabajoDiario">Ver detalles </button>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="price-box-dark animate-box" data-animate-effect="fadeInRight">
                     <h3><b>Planilla mano de obra</b></h3>
                     <div class="gr-line"></div>
                     <div>Total Proyecto <b class="text-gr">$ <?php if(isset($Monto_TotalProyecto)){if($Monto_TotalProyecto[0]->Total>0){echo $Monto_TotalProyecto[0]->Total;}else{ echo '0';}}else{ echo '0';}?></b></div>
                     <div class="gr-line"></div>
                     <br>
                     <button class="btn btn-banner" onclick="generarTablaManoDeObra()" data-toggle="modal"
                        data-target="#mano_obra">Ver detalles</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="trabajoDiario">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Registro trabajos diarios proyecto</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body" id="RegistroTrabajoDiario">
                  <!--Se mostra los datos de la tabla en el controlador Proyecto -->
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Aceptar</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin dialog -->
      <div class="modal fade" id="MostrarFacturas">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Personal que asiste</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body"id="mostrar-factura">
                  <!--Se mostra los datos de la tabla en el controlador Proyecto -->
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary" onclick="generarTablaRegistroMaterial()" data-toggle="modal"
                        data-target="#materiales">Atras</button>
                  </tr>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <div class="modal fade" id="personal">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Personal que asiste</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body"id="MostrarPersonalAsiste">
                  <!--Se mostra los datos de la tabla en el controlador Proyecto -->
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                     data-target="#modal-l">Atras</button>
                  </tr>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin dialog -->
      <div class="modal fade" id="mano_obra">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Planilla mano de obra</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body" id ="MostrarManoDeObra">
                  <!--Se mostra los datos de la tabla en el controlador Proyecto -->
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Aceptar</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin dialog -->
      <!--  dialog -->
      <div class="modal fade" id="materiales">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Registro de materiales</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body" id="MostrarRegistroMaterial">
                  <!--Se mostra los datos de la tabla en el controlador Proyecto -->
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Aceptar</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- Fin dialog -->
   </body>
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
   <script src="<?php echo base_url();?>assets/js/EvaluacionProyecto/ProyectoEjecutado.js"></script>
</html>