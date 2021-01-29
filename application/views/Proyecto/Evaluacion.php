<head>
   <!--Script alarma  -->
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <!--Script alarma  -->
   <!-- SELECT CON BUSCADOR -->
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <!-- DataTables -->
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
                  <a href="<?php echo base_url(); ?> nicio" data-toggle="modal" data-target="#modal-lg" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".1s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".2s">
                     Partidas</h3>
                  </a>
                  <a href="<?php echo base_url(); ?> nicio" data-toggle="modal" data-target="#etapas" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".3s">
                     <i class="fa fa-briefcase icon-round"></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".4s">Etapas</h4>
                  </a>
                  <a href="<?php echo base_url(); ?> nicio" data-toggle="modal" data-target="#despiece" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Despiece</h4>
                  </a>
                  <a href="<?php echo base_url(); ?> nicio" data-toggle="modal" data-target="#insta" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Instalación</h4>
                  </a>
                  <a href="<?php echo base_url(); ?> nicio" data-toggle="modal" data-target="#supervision" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Supervisión</h4>
                  </a>
                  <a href="<?php echo base_url(); ?> nicio" data-toggle="modal" data-target="#porcentaje" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".5s">
                     <i class="fa fa-briefcase icon-round "></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".6s">Configuración</h4>
                  </a>
                  <a href="<?php echo base_url(); ?> nicio" data-toggle="modal" data-target="#modal-lg3" class="small-box-footer" class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".7s">
                     <i class="fa fa-paper-plane-o icon-round"></i>
                     <h4 class="wow bounceIn animated" data-wow-duration="1s" data-wow-delay=".12s">Salir</h4>
                  </a>
               </div>
               <div class="col-lg-5 col-md-5 col-sm-5 text-center">
                  <label for="cars" >Seleccione Partidas del proyecto:</label>
                  <select class="form-control select2bs4" name="partidas3" onchange="actualizarResumen()" id="partidas3" style="width: 100%; height: 60%">
                  <option value="0" selected>Seleccione</option>
                  <?php
                     
                     foreach($partidas as $i){
                        echo '<option value="'. $i->id_partidas .'">'. $i->nombre .'</option>';
                     }
                     ?>
                  </select>
                  
                 
                  <div class="modal-body" id="resumen-proyecto">
                  </div>
            </div>

                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <!------------------------------------------Registrar Instalación--------------------------------------------------->
   <!-- /.modal -->
   <div class="modal fade" id="insta">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Registrar Instalación</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-5">
                           <div class="form-group">
                              <label>Valor total según días de instalación:</label>
                              <div class="form-group">
                                 <input type="number" id="numdias" class="form-control" required="required"  />
                                 <input type="text" id="tipoInsta" value="Instalacion"class="form-control" style="visibility:hidden" />
                              </div>
                           </div>
                           <!-- /.form-group -->
                           <!-- /.form-group -->
                        </div>
                     </div>
                     <div class="col-lg-10" id="divInstalacion">
                        <table class="table table-bordered" id="tabla_personal">
                           <TR>
                              <TH>Cantidad</TH>
                              <TH>item</TH>
                              <TH>Precio Unitario</TH>
                              <TH></TH>
                           </TR>
                           <tr>
                              <TD><input type="number" name="partida" id="numCantidadIns" class="form-control"/></TD>
                              <TD><input type="text" name="partida" id="txtItemIns" class="form-control"/></TD>
                              <TD><input type="number" name="partida" id="numPrecioIns" class="form-control"/></TD>
                              <TD><button type="button" name="add" id="GuardarInstalacion" class="btn btn-success">+</button></TD>
                           </tr>
                        </table>
                     </div>
                     <!-- end of col -->
                     <!-- href="<?php echo base_url() ?>PlantillaOperaciones"-->
                  </div>
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" id="addInstalacion" class="btn btn-primary">Guardar</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
   </div>
   <!----------------------------Registrar Supervisión-------------------------->
   <!-- /.modal -->
   <div class="modal fade" id="supervision">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Registrar Supervisión</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-5">
                           <div class="form-group">
                              <label>Valor total según días de supervisión:</label>
                              <div class="form-group">
                                 <input type="number" id="diasSuper" class="form-control" required="required"  />
                                 <input type="text" id="tipoSuper" value="Supervision" class="form-control" style="visibility:hidden"/>
                              </div>
                           </div>
                           <!-- /.form-group -->
                           <!-- /.form-group -->
                        </div>
                     </div>
                     <div class="col-lg-10" id="divSupervisor">
                        <table class="table table-bordered" >
                           <TR>
                              <TH>Cantidad</TH>
                              <TH>item</TH>
                              <TH>Precio Unitario</TH>
                              <TH></TH>
                           </TR>
                           <tr>
                              <TD><input type="number" name="partida" id="numCantidadSup" class="form-control"/></TD>
                              <TD><input type="text" name="partida" id="txtItemSup" class="form-control"/></TD>
                              <TD><input type="number" name="partida" id="numPrecioSup" class="form-control"/></TD>
                              <TD><button type="button" name="add" id="GuardarSupervisor" class="btn btn-success">+</button></TD>
                           </tr>
                        </table>
                     </div>
                     <!-- end of col -->
                     <!-- href="<?php echo base_url() ?>PlantillaOperaciones"-->
                  </div>
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" id="addSupervision" class="btn btn-primary">Guardar</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
   </div>
   <!-----------------------Registrar Partidas del proyecto------------------------------------------------------------->
   <!-- /.modal -->
   <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Registrar Partidas del proyecto</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-10" id="dynamic_partidas">
                     <table class="table table-bordered" id="tabla_personal">
                        <TR>
                           <TH>Nombre de partida</TH>
                           <TH>Agregar más</TH>
                        </TR>
                        <tr>
                           <TD><input type="text" name="partida" id="nombre_partida" class="form-control"/></TD>
                           <TD><button type="button" name="add" id="guardarpartidas" class="btn btn-success">+</button></TD>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" id="addpartidas" class="btn btn-primary">Guardar</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!--------------------------------------------Registrar etapas de las partidas--------------------->
   <!-- /.modal -->
   <div class="modal fade" id="etapas">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Registrar etapas de las pratidas </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-5">
                     <div class="form-group">
                        <label>Nombre de Partida</label>
                        <select class="form-control select2bs4" name="partidas2" id="partidas2" style="width: 100%; height: 60%">
                        <?php
                           foreach($partidas as $i){
                              echo '<option value="'. $i->id_partidas .'">'. $i->nombre .'</option>';
                           }
                           ?>
                        </select>
                        <input type="text" id="estado" value="0"class="form-control" style="visibility:hidden" />
                     </div>
                     <!-- /.form-group -->
                     <!-- /.form-group -->
                  </div>
                  <div class="col-lg-10" id="divEtapa">
                     <table class="table table-bordered">
                        <TR>
                           <TH>Etapa</TH>
                        </TR>
                        <tr>
                           <TD><input type="text" name="Etapa" id="nombre_etapa" class="form-control"/></TD>
                           <TD><button type="button" name="add" id="GuardarEtapa" class="btn btn-success">+</button></TD>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" id ="addEtapa" class="btn btn-primary">Guardar</button>
            
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!---------------------------------------Registrar despiece menu------------------------------------------------------>
   <!-- /.modal -->
   <div class="modal fade" id="despiece">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Registrar despiece </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-5">
                     <div class="form-group">
                        <label>Nombre de Partida</label>
                        <select class="form-control select2bs4" name="partidas1" id="partidas1" style="width: 100%; height: 60%">
                                    <?php
                                    foreach($partidas as $i){
                                       echo '<option value="'.$i->id_partidas.'">'. $i->nombre .'</option>';
                                       }
                                       ?>
                        </select>
                     </div>
                     <!-- /.form-group -->
                     <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-2">
                     <!-- /.form-group -->
                     <div class="form-group">
                        <label class="invisible">Listar</label>
                        <button type="button" class="btn btn-block btn-primary" id="añadir-despiece">Listar</button>
                     </div>
                     <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="card-body" id="dynamic_field" >
                  <div class="box-body">
                  <div class="modal-body" id="detalle-etapas">
                  </div>
            </div>
                     
                  </div>
                 
               </div>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-primary">Guardar</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   
   <!-----------------------------------------Registrar Despiece-------------------->
   <!-- /.modal -->
   <div class="modal fade" id="registro_despiece">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Registrar Despiece</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
               <input type="text" id="ID_Despiece" class="form-control" style="visibility:hidden" />
                  <div class="col-lg-10" id="div_despiece">
                     <table class="table table-bordered" id="tabla_personal">
                        <TR>
                           <TH>Cantidad</TH>
                           <TH>item</TH>
                           <TH>Precio Unitario</TH>
                           <TH></TH>
                        </TR>
                        <tr>
                           <TD><input type="number" name="partida" id="numCantidad" class="form-control"/></TD>
                           <TD><input type="text" name="partida" id="txtItem" class="form-control"/></TD>
                           <TD><input type="number" name="partida" id="numPrecioDespiece" class="form-control"/></TD>
                           <TD><button type="button" name="add" id="GuardarDespiece" class="btn btn-success">+</button></TD>
                        </tr>
                     </table>
                  </div>
                  <!-- end of col -->
                  <!-- href="<?php echo base_url() ?>PlantillaOperaciones"-->
               </div>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" id="addDespiece"class="btn btn-primary">Guardar</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-----------------------Registrar fletes------------------------------------------------------------->
   <!-- /.modal -->
   <div class="modal fade" id="registro_flete">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Registrar fletes</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
               <input type="text" id="id_etapa" class="form-control" style="visibility:hidden" />
               
                  <div class="col-lg-10" id="divFletes">
                     <table class="table table-bordered" id="tabla_personal">
                        <TR>
                           <TH>Fletes</TH>
                        </TR>
                        <tr>
                           <TD><input type="number" name="partida" id="valor" class="form-control"/></TD>
                        </tr>
                     </table>
                  </div>
               </div>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" id="addflete" class="btn btn-primary">Guardar</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-----------------------Registrar Configuracion porcentaje------------------------------------------------------------->
   <div class="modal fade" id="porcentaje">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Registrar porcentajes</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-10" id="divFletes">
                     <form id="fromPorcentaje">
                     <label>Imprevistos %</label>
                     <div class="form-group">
                        <input type="text" class="form-control"id="imprevisto" required="required"  />
                     </div>
                     <label>Gastos generales %</label>
                     <div class="form-group">
                        <input type="text" class="form-control" id="generales" required="required"  />
                     </div>
                     <label>Comisiones %</label>
                     <div class="form-group">
                        <input type="text" class="form-control" id="comision" required="required"  />
                     </div>
                     <label>Ingeniería %</label>
                     <div class="form-group">
                        <input type="text" class="form-control" id="ingenieria" required="required"  />
                     </div>
                     <label>Utilidades %</label>
                     <div class="form-group">
                        <input type="text" class="form-control" id="utilidades" required="required"  />
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" id="addPorcentaje" class="btn btn-primary">Guardar</button>
            </div>
            </from>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   
   <script type="text/javascript">
      $(document).ready(function(){
           $('#partidas1').select2({
             theme: "bootstrap"
           });
         });
         $(document).ready(function(){
           $('#partidas2').select2({
             theme: "bootstrap"
           });
         });
         $(document).ready(function(){
           $('#partidas3').select2({
             theme: "bootstrap"
           });
         });
         
   </script>
   <script>
      //Mostrar tabla principal
      $(document).ready(function(){
        $('#tablaDespiece').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
          "processing": true,
          "serverSide": true, 
          "ajax":{url:"<?php echo base_url('Proyecto/tabla_despiece'); ?>",
          type: "POST"
        },
          "columnDefs":[
            {
                "targets": [1,2,3,4,5,6],
            }
          ]
        });
      });
   </script>
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
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/EvaluacionProyecto/PartidaProyecto.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/EvaluacionProyecto/EtapasProyecto.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/EvaluacionProyecto/DespieceProyecto.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/EvaluacionProyecto/InstalacionProyecto.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/EvaluacionProyecto/SupervisionProyecto.js"></script>
</body>
</html>