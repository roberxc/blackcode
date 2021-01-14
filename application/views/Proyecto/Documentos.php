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
            <h1>Ordenes de compraa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Inicio</li>
              <li class="breadcrumb-item">Compras</li>
              <li class="breadcrumb-item">Ordenes de compra</li>
            </ol>
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
          
          <div class="col-2">
          
            <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal" 
            data-target="#modal-lg">Nuevo</a>  
          
          </div>

          <!-- /.modal -->
          <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Sugerencia de Compra</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="col-4">
                          <label>Proveedor</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">Seleccione</option>
                            <option>Proveedor 1</option>
                            <option>Proveedor 2</option>
                            <option>Proveedor 3</option>
                        </select>
                    </div>
                    <br></br>


                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Inventario Actual</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Sugerencia</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Motorcito</td>
                    <td>2</td>
                    <td>1</td>
                    <td>20</td>
                    <td>10</td>
                  </tr>
                  </table>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <div class="col-2">
          
            <button type="button" class="btn btn-block btn-primary">Exportar</button>  
          
          </div>

          <br></br>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                  <div class="card-header">
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Estado</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">Seleccione</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                          </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-2">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Comprobante</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option disabled="disabled">California (disabled)</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                          </select>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Nombre producto</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ingrese">
                              </div>
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
              </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listado</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Folio</th>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>#</th>
                    <th>Total</th>
                    <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>5</td>
                    <td>C</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.5
                    </td>
                    <td>Win 95+</td>
                    <td>5.5</td>
                    <td>A</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Folio</th>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>#</th>
                    <th>Total</th>
                    <th>Opciones</th>
                  </tr>
                  </tfoot>
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
