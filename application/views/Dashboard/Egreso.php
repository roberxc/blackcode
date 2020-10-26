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
            <h1>Caja chica Egreso</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Buscador -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- SELECT2 EXAMPLE -->
                <h4>Registrar salida de caja chica </h4>
                <div class="card card-default">
                
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">

                    <div class="col-md-2">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Fecha</label>
                              <div class="form-group">
                                <input type="date" class="form-control" placeholder="Ingrese">
                              </div>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->

                      <div class="col-md-3">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Monto</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ingrese">
                              </div>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <div class="col-md-3">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Destinatario</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ingrese">
                              </div>
                        </div>
                        <!-- /.form-group -->
                      </div>

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
                    <th>Fecha</th>
                    <th>Monto $</th>
                    <th>Destinatario</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>25/10/2020</td>
                    <td>20000</td>
                    <td>Juan perez</td>
                    <td >
                        <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                          </a>
                      </td>
                  
                  </tr>
                  <tr>
                    <td>26/10/2020</td>
                    <td>40000</td>
                    <td>Sergio Adones</td>
                    <td >
                        <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
                          </a>
                      </td>
                  </tr>
                  <tr>
                    <td>27/10/2020</td>
                    <td>500000</td>
                    <td>Sebastian Miranda</td>
                    <td >
                        <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Eliminar
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
