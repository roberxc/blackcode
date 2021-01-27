<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- SELECT CON BUSCADOR -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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
                    <b>Existencia total</b> <a class="float-right">142</a>
                  </li>
                
                </ul>

                <button type="reset" class="btn btn-outline-info btn-block">Actualizar</button>
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
                  <form id="formmantencion" style="padding:0px 15px;" class="form-horizontal" role="form">
                    
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Fecha Servicio</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="fecha" placeholder="Fecha">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Patente</label>
                        <div class="col-sm-10">
                        <select name="patentes" id="patentes" style="width: 100%; height: 60%">
                              <?php
                                 foreach($lista_vehiculos as $i){
                                   echo '<option value="'. $i->id_vehiculo .'">'. $i->patente .'</option>';
                                 }
                                 ?>
                              </select>


                        </div>
                      </div>

                      <div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Kilometraje </label>
												<div class="col-sm-10">
													<input type="number" min="0" step="1" maxlength="10" style="text-transform:lowercase;" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="kilometraje" placeholder="123.431.000 K/M " >
												</div>
											</div>
                    
                      
                      
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Servicio</label>
                        <div class="col-sm-10">
                        <input type="text" maxlength="35" style="text-transform:lowercase;" class="form-control" id="servicio" placeholder="Trabajo realizado">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Encargado</label>
                        <div class="col-sm-10">
                        <select name="personal" id="personal" style="width: 100%; height: 60%">
                              <?php
                                 foreach($lista_personal as $i){
                                   echo '<option value="'. $i->id_personaltrabajo .'">'. $i->nombrecompleto .'</option>';
                                 }
                                 ?>
                              </select>
                        </div>
                      </div>
                      <hr class="mt-3 mb-3"/>
                      <hr class="mt-3 mb-3"/>
                      <div class="col-md-3 text-center">
              <h5>Datos Mecánico</h5>
              </div>
              <hr class="mt-3 mb-3"/>
              <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" maxlength="50" style="text-transform:lowercase;" class="form-control" id="nmecanico" placeholder="Nombre del mecánico">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Taller</label>
                        <div class="col-sm-10">
                          <input type="text" maxlength="40" style="text-transform:lowercase;" class="form-control" id="taller" placeholder="Taller o planta de mantención">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Notas</label>
                        <div class="col-sm-10">
                        <textarea style="text-transform:lowercase;" class="form-control"id="detalle" rows="3" placeholder="Detalles del servicio o mantención..."></textarea>
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


                          <input type="number" maxlength="10" style="text-transform:lowercase;" class="form-control" id="total_m" placeholder="$ Costo Total">

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
                                 <input type="file" class="form-control-file" id="doc_adj">
                              </div>
                           </div>
                           <hr class="mt-3 mb-3"/>
                           <hr class="mt-3 mb-3"/>
                           <div class="form-check">
                              
                      
                      <div class="col-md-3 text-center">
                          <button type="submit" id="addmantencion" class="btn btn-outline-dark btn-block">Registrar</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  
                      
                     
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url()?>assets/js/ModoMantencion/registro_mantencion.js"></script>
<script type="text/javascript">
   //mostrar tipoproducto
   //mostrar centrodecosto2 en tabla agregar stock
   $(document).ready(function(){
     $('#patentes').select2({
       theme: "bootstrap"
     });
   });
   $(document).ready(function(){
     $('#personal').select2({
       theme: "bootstrap"
     });
   }); 
</script> 
</body>
</html>