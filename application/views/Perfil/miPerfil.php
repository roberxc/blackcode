<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <!-- SELECT CON BUSCADOR -->
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   </head>
   <body class="hold-transition sidebar-mini">
      <div class="wrapper">
         <!-- /.navbar -->
         <!-- Content Wrapper. Contains page content nnnnnnnnnnnnnn-->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1>Ajustes de perfil</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item active"><a href="#">Inicio</a></li>
                           <li class="breadcrumb-item">Sistema</li>
                           <li class="breadcrumb-item">Perfil</li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                           <div class="card-body box-profile">
                              <div class="text-center">
                                 <img class="profile-user-img img-fluid img-circle"
                                    src="<?php echo base_url();?>assets/dist/img/0012.png"
                                    alt="User profile picture">
                              </div>
                              <?php
                                 foreach($lista_perfil as $i){?>
                              <h3 class="profile-username text-center"><?php echo$i->nombre_completo;?></h3>
                              <!-- <p class="text-muted text-center">Software Engineer</p> -->
                              <?php }?>
                              <ul class="list-group list-group-unbordered mb-3">
                                 <?php
                                    foreach($lista_perfil as $i){?>
                                 <li class="list-group-item">
                                    <b>Rut</b> <a class="float-right"><?php echo$i->rut;?></a>
                                 </li>
                                 <?php }?>
                              </ul>
                              <!-- <a href="#" class="btn btn-primary btn-block"><b>Cambiar imagen</b></a>-->
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col -->
                     <div class="col-md-9">
                        <div class="card">
                           <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                 <li class="nav-item"><a class="active nav-link" href="#settings" data-toggle="tab">Configuración</a></li>
                              </ul>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="active tab-pane" id="settings">
                                    <?php
                                       foreach($lista_perfil as $i){?>
                                    <div class="form-group row">
                                       <label for="inputName" class="col-sm-2 col-form-label">Nombre completo</label>
                                       <div class="col-sm-10">
                                          <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo$i->nombre_completo;?>">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                                       <div class="col-sm-10">
                                          <input type="email" class="form-control" id="correo" name="correo" value="<?php echo$i->correo;?>">
                                       </div>
                                    </div>
                                    <?php }?>
                                    <hr class="mt-3 mb-3"/>
                                    <div class="form-group row">
                                       <label>Contraseña actual:</label>
                                       <div class="input-group" id="show_hide_password">
                                          <input class="form-control" type="password" id="currentpassword" name="currentpassword" placeholder="Su contraseña actual">
                                          <div class="input-group-addon">
                                             <span class="input-group-text">
                                             <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label>Contraseña nueva:</label>
                                       <div class="input-group" id="show_hide_password">
                                          <input class="form-control" type="password" id="setpassword" name="setpassword" placeholder="Contraseña nueva">
                                          <div class="input-group-addon">
                                             <span class="input-group-text">
                                             <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label>Confirmar contraseña:</label>
                                       <div class="input-group" id="show_hide_password">
                                          <input class="form-control" type="password" id="setpassword2" name="setpassword2" placeholder="Confirme su Contraseña nueva">
                                          <div class="input-group-addon">
                                             <span class="input-group-text">
                                             <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="offset-sm-2 col-sm-10">
                                          <div class="checkbox">
                                             <label>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="offset-sm-2 col-sm-10">
                                          <button type="submit" id="update-perfil" class="btn btn-danger">Guardar</button>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                 </div>
                                 <!-- /.tab-pane -->
                              </div>
                              <!-- /.tab-content -->
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
         </aside>
         <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
      <!-- ESTE PARA LAS ALERTAS --->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>
      <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
      <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
      <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"
         integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
         integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
      <script>var base_url = '<?php echo base_url();?>';</script>
      <script src="<?php echo base_url();?>assets/js/auth/miperfil.js"></script>
   </body>
</html>