<head>
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
   <!--------------------------------------------------------------------------------------------------->
   <div id="home-sec">
      <div class="overlay">
         <div class="container">
            <div class="row pad-top-bottom  move-me">
               <div class="col-lg-5 col-md-5 col-sm-5 text-center">
                  <form id="registroproyecto">
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
                        <button type="button" id="addProyecto" class="btn custom-btn-one">Guardar</button>
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
                  <select class="form-control" name="cars" id="cars">
                     <option value="volvo">Plantas</option>
                     <option value="saab">Elevación</option>
                     <option value="mercedes">Elevación 2</option>
                     <option value="audi">Elevación 3</option>
                  </select>
                  </br>
                  <TABLE BORDER class="table table-bordered ">
                     <TR>
                        <TH>Subtotal por partida</TH>
                        <TD>$361000</TD>
                     </TR>
                     <TR>
                        <TH>Imprevistos</TH>
                        <TD>$36100</TD>
                     </TR>
                     <TR>
                        <TH>Costo materiales</TH>
                        <TD>$397100</TD>
                     </TR>
                     <TR>
                        <TH>Instalación</TH>
                        <TD>$500000</TD>
                     </TR>
                     <TR>
                        <TH>Supervisión</TH>
                        <TD>$240000</TD>
                     </TR>
                     <TR>
                        <TH>Valor equipamiento instalado</TH>
                        <TD>$24000</TD>
                     </TR>
                     <TR>
                        <TH>Supervisión</TH>
                        <TD>$1137100</TD>
                     </TR>
                     <TR>
                        <TH>Flete traslado </TH>
                        <TD>$300000</TD>
                     </TR>
                     <TR>
                        <TH>Gastos generales </TH>
                        <TD></TD>
                     </TR>
                     <TR>
                        <TH>Comisiones </TH>
                        <TD></TD>
                     </TR>
                     <TR>
                        <TH>Ingeniería </TH>
                        <TD></TD>
                     </TR>
                     <TR>
                        <TH>Utilidades </TH>
                        <TD></TD>
                     </TR>
                     <TR>
                        <TH>Precio sugerido venta </TH>
                        <TD>$1437100</TD>
                     </TR>
                  </TABLE>
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
                                 <input type="number" class="form-control" required="required"  />
                              </div>
                           </div>
                           <!-- /.form-group -->
                           <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-2">
                           <!-- /.form-group -->
                           <div class="form-group">
                              <label class="invisible">Guardar</label>
                              <button type="button" class="btn btn-block btn-primary">Guardar</button>
                           </div>
                           <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
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
                  <button type="button" class="btn btn-primary">Guardar</button>
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
                              <label>Valor total según días de instalación:</label>
                              <div class="form-group">
                                 <input type="number" class="form-control" required="required"  />
                              </div>
                           </div>
                           <!-- /.form-group -->
                           <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-2">
                           <!-- /.form-group -->
                           <div class="form-group">
                              <label class="invisible">Guardar</label>
                              <button type="button" class="btn btn-block btn-primary">Guardar</button>
                           </div>
                           <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
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
                  <button type="button" class="btn btn-primary">Guardar</button>
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
               <button type="button" class="btn btn-primary">Guardar</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!--------------------------------------------Registrar etapas de las pratidas--------------------->
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
                  <div class="col-lg-10" id="divEtapa">
                     <table class="table table-bordered">
                        <TR>
                           <TH>Nombre de partida</TH>
                           <TH>Etapa</TH>
                        </TR>
                        <tr>
                           <TD>
                              <select class="form-control select2bs4" style="width: 90%;" id="nombrePartida">
                                 <option selected="selected">Seleccione</option>
                                 <option>Proveedor 1</option>
                                 <option>Proveedor 2</option>
                                 <option>Proveedor 3</option>
                              </select>
                           </TD>
                           <TD><input type="text" name="Etapa" id="nombre_etapa" class="form-control"/></TD>
                           <TD><button type="button" name="add" id="GuardarEtapa" class="btn btn-success">+</button></TD>
                        </tr>
                     </table>
                  </div>
                  <!-- end of col -->
                  <!-- href="<?php echo base_url() ?>PlantillaOperaciones"-->
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
   <!---------------------------------------Registrar Partidas del proyecto------------------------------------------------------>
   <!-- /.modal -->
   <div class="modal fade" id="despiece">
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
                  <!-- Buscador de partidas ------------------------------>      
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-5">
                           <div class="form-group">
                              <label>Partida</label>
                              <select class="form-control select2bs4" style="width: 100%;">
                                 <option selected="selected">Seleccione</option>
                                 <option>Plantas</option>
                                 <option>Elevación</option>
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
                              <button type="button" class="btn btn-block btn-primary">Listar</button>
                           </div>
                           <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                     </div>
                     <!--Tabla despiece-------------------------------------->
                     <div class="col-lg-10" id="dynamic_field">
                        <table id="example1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Etapa</th>
                                 <th>Estado</th>
                                 <th>Ingresar Despiece</th>
                                 <th>Fletes</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Parillas</td>
                                 <td>Sin registro</td>
                                 <td>
                                    <a class="btn btn-block btn-primary" href="<?php echo base_url() ?>Inicio" data-toggle="modal"
                                       data-target="#registro_despiece">Despiece</a>
                                 </td>
                                 <td>
                                    <a class="btn btn-block btn-primary" href="<?php echo base_url() ?>Inicio" data-toggle="modal"
                                       data-target="#registro_flete">Flete</a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Lineas aireación</td>
                                 <td>Registrado</td>
                                 <td>
                                    <a class="btn btn-block btn-primary" href="<?php echo base_url() ?>Inicio" data-toggle="modal"
                                       data-target="#registro_despiece">Despiece</a>
                                 </td>
                                 <td>
                                    <a class="btn btn-block btn-primary" href="<?php echo base_url() ?>Inicio" data-toggle="modal"
                                       data-target="#registro_flete">Flete</a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <!-- end of col -->
                     <!-- href="<?php echo base_url() ?>PlantillaOperaciones"-->
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
               <button type="button" class="btn btn-primary">Guardar</button>
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
                  <div class="col-lg-10" id="divFletes">
                     <table class="table table-bordered" id="tabla_personal">
                        <TR>
                           <TH>Fletes</TH>
                        </TR>
                        <tr>
                           <TD><input type="text" name="partida" id="txtFletes" class="form-control"/></TD>
                        </tr>
                     </table>
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
                  <label>Imprevistos %</label>
                      <div class="form-group">
                        <input type="text" class="form-control" required="required"  />
                      </div>
                  <label>Gastos generales %</label>
                      <div class="form-group">
                        <input type="text" class="form-control" required="required"  />
                      </div>
                      <label>Comisiones %</label>
                      <div class="form-group">
                        <input type="text" class="form-control" required="required"  />
                      </div>
                      <label>Ingeniería %</label>
                      <div class="form-group">
                        <input type="text" class="form-control" required="required"  />
                      </div>
                      <label>Utilidades %</label>
                      <div class="form-group">
                        <input type="text" class="form-control" required="required"  />
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
    <!-- ESTE PARA LAS ALERTAS --->

   <!---------------------------------------->
   <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/EvaluacionProyecto/PartidaProyecto.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/EvaluacionProyecto/EtapasProyecto.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/EvaluacionProyecto/DespieceProyecto.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/EvaluacionProyecto/InstalacionProyecto.js"></script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/EvaluacionProyecto/SupervisionProyecto.js"></script>


<script src="<?php echo base_url();?>assets/js/EvaluacionProyecto/registro_proyecto.js"></script>

</body>
</html>