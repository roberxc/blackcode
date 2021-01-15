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
                     <h1>Combustible</h1>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </section>
         <!-- Buscador -->
         <div class="col-12">
            <div class="card card-default">
               <div class="card-header">
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>

                  <div class="col-md-3 text">
                          <button type="submit" class="btn btn-info">Listar</button>
                        
                          <button type="submit" class="btn btn-dark">Guardar</button>
                        </div>
               </div>
               
               <!-- /.card-header -->
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-3">
                        <!-- /.form-group -->
                        
                        <!-- /.form-group -->
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        
                     </div>
                     <div class="col-md-3">
                        <!-- /.form-group -->
                        <div class="form-group">
                           <label>Seleccione fecha</label>
                           <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" id="fecha_filtro" format="d/m/y"/>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <div class="col-md-2">
                        <!-- /.form-group -->
                        <hr class="mt-3 mb-3"/>
                        <div class="form-group">
                           <button type="button" class="btn btn-block btn-dark" data-toggle="modal" data-target="#modal-nuevo-documento">Adjuntar</button>
                       
                       
                        <!-- /.form-group -->
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
            </div>
            <!-- /.card -->
            <div class="card">
               <!-- /.card-header -->
               <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>N° Documento</th>
                           <th>Fecha</th>
                           <th>Costo</th>
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
   <div class="modal fade" id="modal-nuevo-documento">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Documento Evidencial</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
                  <div class="card card-primary">
                     <!-- /.card-header -->
                     <!-- form start -->
                     <form role="form">
                        <div class="card-body">
                        <div class="form-group">
                              <label for="exampleInputEmail1">Patente de Vehiculo</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                           </div>
                        <div class="form-group">
                              <label for="exampleInputEmail1">Conductor o designado</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Estación de servicios</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Litros</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Valor Total</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                           </div>
                          
                           <div class="form-group">
                              <label for="exampleInputFile">Documento adjuntar</label>
                              <div class="input-group">
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Buscar archivo</label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-check">
                              <label class="form-check-label" for="exampleCheck1">Formatos admitidos: pdf, docx, jpg, pptx, xlsx.</label>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                     <button type="button" class="btn btn-dark">Guardar</button>
                  </div>
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
</html>