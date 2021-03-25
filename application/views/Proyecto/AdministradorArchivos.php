<head>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <!-- SELECT CON BUSCADOR -->
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <!-- DataTables -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
   <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
</head>
<div class="content-wrapper">
   <!-- Main Sidebar Container -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <!-- left column -->
            <div class="col-md-4">
               <!-- general form elements -->
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Carpetas</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="widgets.html" data-source-selector="#card-refresh-content" data-load-on-init="false"><i class="fas fa-sync-alt"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <br>
                  <div class="col-md-12">
                     <p>
                        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#licitaciones" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-folder"></i> Licitaciones</button>
                     </p>
                     <div class="row">
                        <div class="collapse" id="licitaciones">
                           <div class="card card-body">
                              <p>
                                 <button class="btn btn-secondary"><i class="far fa-file"></i> Antecedentes tecnicos</button>
                              </p>
                              <p>
                                 <button class="btn btn-secondary"><i class="far fa-file"></i> Propuestas tecnicas</button>
                              </p>
                              <p>
                                 <button class="btn btn-secondary"><i class="fas fa-file-image"></i> Fotos</button>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--- COTIZACIONES --->
                  <div class="col-md-12">
                     <p>
                        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#cotizaciones" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-folder"></i> Cotizaciones</button>
                     </p>
                     <div class="row">
                        <div class="collapse" id="cotizaciones">
                           <div class="card card-body">
                              <!--- Clientes --->
                              <p>
                              <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#clientes" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-folder"></i> Clientes</button>
                              </p>
                              <div class="row">
                                 <div class="collapse" id="clientes">
                                    <div class="card card-body">
                                       <p>
                                          <button class="btn btn-warning"><i class="fa fa-folder"></i> Cotizaciones</button>
                                       </p>
                                       <p>
                                          <button class="btn btn-warning"><i class="fa fa-folder"></i> Evaluacion de proyectos</button>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                             
                              <!--- Proveedores --->
                              <p>
                                 <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#proveedores" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-folder"></i> Proveedores</button>
                              </p>
                              <div class="row">
                                 <div class="collapse" id="proveedores">
                                    <div class="card card-body">
                                       <p>
                                       <button class="btn btn-danger"><i class="fa fa-folder"></i> Cotizaciones</button>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <!------------------>
                              <p>
                                 <button class="btn btn-success"><i class="fa fa-folder"></i> Documentos tecnicos</button>
                              </p>
                              <p>
                                 <button class="btn btn-success"><i class="fa fa-folder"></i> Planos</button>
                              </p>

                           </div>
                           
                        </div>
                        
                     </div>
                  </div>

               </div>
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-8">
               <!-- general form elements disabled -->
               <div class="card card-secondary">
                  <div class="card-header">
                     <h3 class="card-title">Archivos</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form role="form">
                        <div class="row">
                           <div class="col-md-3 col-sm-6 col-12">
                              <div class="info-box">
                                 <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                                 <div class="info-box-content">
                                    <span class="info-box-text">Messages</span>
                                    <span class="info-box-number">1,410</span>
                                 </div>
                                 <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                           </div>
                        </div>
                     </form>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!--/.col (right) -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
</div>
</body>
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
<script src="<?php echo base_url()?>assets/js/CajaChica/ingreso_cajachica.js"></script>
</html>