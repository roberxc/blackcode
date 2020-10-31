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
      </div><!-- /.container-fluid -->
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
                          <button type="button" class="btn btn-block btn-primary">Buscar</button>
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
                  <tbody>
                  <tr>
                    <td>Paulo</td>
                    <td>30/10/2020</td>
                    <td>20000</td>
                      <td>2000</td>
                      <td >
                        <a class="btn btn-info btn-sm" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                        data-target="#vuelto1">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Ingresar
                          </a>
                          
                      </td>
                    
                   
                  </tr>
                  <tr>
                    <td>Proyecto</td>
                    <td>Destinatario</td>
                    <td>20000</td>
                      <td>0</td>
                      <td >
                        <a class="btn btn-info btn-sm" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                        data-target="#vuelto1">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Ingresar
                          </a>
                          
                      </td>


                  </tr>
                  <tr>
                    <td>Proyecto</td>
                    <td>Destinatario</td>
                    <td>20000</td>
                      <td>0</td>
                      <td >
                        <a class="btn btn-info btn-sm" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                        data-target="#vuelto1">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Ingresar
                          </a>
                          
                      </td>

                  </tr>
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
                     <form role="form" id="form" action="">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="dynamic_field">
                              <tr>
                                 <td>
                                    <label>Vuelto</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 
                              </tr>
                           </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                              data-target="#modal-l">Guardar</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
