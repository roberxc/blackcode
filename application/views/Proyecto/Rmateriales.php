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
            <h1>Editar Proyecto </h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">

          </div>






          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">

                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nombre proyecto</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Fecha Inicial</label>
                          <div class="form-group">
                            <input type="date" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Fecha de termino</label>
                          <div class="form-group">
                            <input type="date" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Monto total del Proyecto</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="row">

                      <div class="col-md-2">

                        <div class="form-group">
                          <label>Estado</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">Seleccione</option>
                            <option>Terminado</option>
                            <option>En proceso</option>

                          </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->




                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
              </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registro compras materiales proyecto</h3>
              </div>
              <!-- /.card-header -->


              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Compras</th>
                      <th>Monto</th>
                      <th>Detalle</th>
                      <th>Presupuesto</th>
                      <th>Balance por item</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>  <input type="text" class="form-control" placeholder="Ingrese"></td>
                      <td>  <input type="number" class="form-control" placeholder="Ingrese"></td>
                      <td>  <input type="text" class="form-control" placeholder="Ingrese"></td>
                      <td>  <input type="number" class="form-control" placeholder="Ingrese"></td>
                      <td>  <input type="number" class="form-control" placeholder="Ingrese"></td>

                    </tr>
                    <tr>
                      <td>  <input type="text" class="form-control" placeholder="Ingrese"></td>
                      <td>  <input type="number" class="form-control" placeholder="Ingrese"></td>
                      <td>  <input type="text" class="form-control" placeholder="Ingrese"></td>
                      <td>  <input type="number" class="form-control" placeholder="Ingrese"></td>
                      <td>  <input type="number" class="form-control" placeholder="Ingrese"></td>

                    </tr>
                    <tfoot>
                    <tr>
                      <th>Total:</th>
                      <th>0</th>
                      <th></th>
                      <th>0</th>
                      <th>0</th>

                    </tr>
                    </tfoot>
                </table>

              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <a class="btn btn-block btn-primary" href="<?php echo base_url()?>ProyectoEjecutados" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>"
          >Guardar</a>
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
