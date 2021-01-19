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
                     <h1>Subir documentos</h1>
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
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-3">
                        <!-- /.form-group -->
                        <div class="form-group">
                           <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-nuevo-documento">Nuevo</button>
                        </div>
                        <!-- /.form-group -->
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <!-- /.form-group -->
                        <div class="form-group">
                           <label>Documento</label>
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Ingrese" id="codigoservicio_filtro" format="y-m-d">
                           </div>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <div class="col-md-3">
                        <!-- /.form-group -->
                        <div class="form-group">
                           <label>Fecha</label>
                           <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" id="fecha_filtro"/>
                        </div>
                        <!-- /.form-group -->
                     </div>
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
                           <th>Documento</th>
                           <th>Fecha limite</th>
                           <th>Opciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           if($documentos_actualizables){
                              foreach($documentos_actualizables as $row){
                           ?>
                        <tr>
                           <td style="display:none;">
                              <input type="hidden" value="<?php echo $row->iddocumentacion?>" class="form-control name-file" disabled/>
                           </td>
                           <td>
                              <?php echo $row->nombre?>
                           </td>
                           <td>
                              <?php echo $row->fechalimite?>
                           </td>
                           <td class="project-actions">
                              <button class="btn btn-primary btn-sm" id="detalle_trabajo" data-toggle="modal" data-target="#modal-detalle">
                              <i class="far fa-eye">
                              </i>
                              </button>
                              <button class="btn btn-info btn-sm" id="detalle_archivos" data-toggle="modal" data-target="#modal-archivos">
                              <i class="fas fa-upload">
                              </i>
                              </button>
                           </td>
                        </tr>
                        <?php }
                           }?>
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
               <h4 class="modal-title">Documentación actualizable</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
                  <div class="card card-primary">
                     <!-- /.card-header -->
                     <!-- form start -->
                     <form id="form-subir-archivos-actualizable" style="padding:0px 15px;" class="form-horizontal" role="form" action="<?php echo base_url();?>Upload/subirDocumentacionActualizable" method="POST">
                        <div class="card-body">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Nombre del documento</label>
                              <input type="text" class="form-control" id="nombre-documento" name="nombre-documento" placeholder="Ingrese">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Fecha limite</label>
                              <input type="date" class="form-control" id="fecha-limite" name="fecha-limite" format="d/m/y">
                           </div>
                           <div class="form-group">
                              <label for="pic_file">Archivo</label>
                              <div class="form-group">
                                 <input type="file" name="pic_file" class="form-control-file" id="pic_file">
                              </div>
                           </div>
                           <div class="form-check">
                              <label class="form-check-label" for="exampleCheck1">Formatos admitidos: pdf,docx,jpg,pptx,xlsx.</label>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                     <button type="submit" class="btn btn-primary">Guardar</button>
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
   <script>var base_url = '<?php echo base_url();?>';</script>
      <script src="<?php echo base_url();?>assets/js/Administracion/documentos_actualizables.js"></script>
   <!-- page script -->
</body>
</html>