<head>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
   <div class="wrapper">
      <!-- Main Sidebar Container -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1>Caja chica Vuelto</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </section>
         <!-- Buscador -->
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <!-- SELECT2 EXAMPLE -->
                  <div class="card card-default">
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-4">
                              <!-- /.form-group -->
                              <div class="form-group">
                                 <label>Destinatario</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Ingrese">
                                 </div>
                              </div>
                              <!-- /.form-group -->
                           </div>
                           <!-- /.col -->
                           <div class="col-md-4">
                              <!-- /.form-group -->
                              <div class="form-group">
                                 <label>Fecha</label>
                                 <div class="form-group">
                                    <input type="date" class="form-control" placeholder="Ingrese">
                                 </div>
                              </div>
                              <!-- /.form-group -->
                           </div>
                           <div class="col-md-2">
                              <!-- /.form-group -->
                              <div class="form-group">
                                 <label class="invisible">Buscar</label>
                                 <button type="button" class="btn btn-block btn-primary" id="buscador">Buscar</button>
                              </div>
                              <!-- /.form-group -->
                           </div>
                           <div class="col-md-2">
                              <!-- /.form-group -->
                              <div class="form-group">
                                 <label class="invisible">Volver</label>
                                 <button type="button" class="btn btn-block btn-warning" id="back">Volver</button>
                              </div>
                              <!-- /.form-group -->
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                     </div>
                  </div>
               </div>
               <!-- /.card -->
               <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>Destinatario</th>
                              <th>Fecha</th>
                              <th>Monto asignado</th>
                              <th>Vuelto</th>
                           </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
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
   <div class="modal fade" id="vuelto1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Registrar vuelto </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
              <form role="form" id="formvuelto" method="POST">
                  <div class="table-responsive">
                     <table class="table table-bordered" id="dynamic_field">
                        <tr>
                           <td>
                              <label>Vuelto</label>
                              <input type="text" placeholder="Ingrese" class="form-control" id="vuelto"/>
                              <input type="hidden" class="form-control" id="fecha"/>
                           </td>
                        </tr>
                     </table>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#modal-l" id="guardarvuelto">Guardar</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- Bootstrap 4 -->
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   <script src="<?php echo base_url()?>assets/js/CajaChica/vuelto_cajachica.js"></script>
   <!-- page script -->
</body>
</html>s