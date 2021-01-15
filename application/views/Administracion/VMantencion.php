<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <h1>Registro mantención</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item">Sistema</li>
              <li class="breadcrumb-item">Perfil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
                       src="<?php echo base_url();?>assets/dist/img/mantencion.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Mantención Vehiculo</h3>

                <p class="text-muted text-center">CDH Ingenieria</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Totales</b> <a class="float-right">142</a>
                  </li>
                
                </ul>

                <button type="reset" class="btn btn-dark btn-block">Actualizar</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
              <div class="col-md-3 text-center">
              <h5>Ficha de servicios</h5>
              </div>
                <ul class="nav nav-pills">
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal">
                    
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Fecha Servicio</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="inputName" placeholder="Fecha">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Patente</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Placa patente unica">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Kilometraje</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail" placeholder="Kilometraje entrante">
                        </div>
                      </div>
                    
                      
                      
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Servicio</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Trabajo realizado">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Encargado</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Encargado de la mantención">
                        </div>
                      </div>
                      <hr class="mt-3 mb-3"/>
                      <hr class="mt-3 mb-3"/>
                      <div class="col-md-3 text-center">
              <h5>Mecánico Asignado</h5>
              </div>
              <hr class="mt-3 mb-3"/>
              <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail" placeholder="Nombre del mecánico">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Taller</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail" placeholder="Taller o planta de mantención">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Notas</label>
                        <div class="col-sm-10">
                        <textarea class="form-control"id="inputEmail" rows="3" placeholder="Detalles del servicio o mantención..."></textarea>
                        </div>
                      </div>
                      <hr class="mt-3 mb-3"/>
                      <hr class="mt-3 mb-3"/>
                      <div class="col-md-3 text-center">
              <h5>Costo Servicios</h5>
              </div>
              <hr class="mt-3 mb-3"/>
      
              <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="inputEmail" placeholder="$ Costo Total">
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
                     

                      <hr class="mt-3 mb-3"/>

                      <div class="form-group">
                              <label for="exampleInputFile">Adjuntar Documento Asociado</label>
                              <div class="input-group center">
                                 
                              </div>
                           </div>
                           <hr class="mt-3 mb-3"/>
                      <div class="form-group row">
                      
                       
                              <div class="form-group">
                                 <input type="file" class="form-control-file" id="exampleFormControlFile1">
                              </div>
                           </div>
                           <hr class="mt-3 mb-3"/>
                           <hr class="mt-3 mb-3"/>
                           <div class="form-check">
                              
                      
                      <div class="col-md-3 text-center">
                          <button type="submit" class="btn btn-dark">Registrar</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>