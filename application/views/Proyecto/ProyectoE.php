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
            <h1>Proyecto ejecutados o en ejecución</h1>
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



          <!-- /.modal -->
          <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Plataforma de proyecto</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Proyecto</th>
                    <th>Monto total proyecto</th>
                    <th>Balance Proyecto</th>
                    <th>Estado de avance </th>
                    <th>Materiales</th>

                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>QUILIMARÏ</td>
                    <td>$100.000.000</td>
                    <td>$98.000.000</td>
                    <td><a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg2" >Ver actividades</a></td>

                      <td><a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                        data-target="#modal-lg3" >Registro de compras</a></td>

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

          <!-- /.modal -->
          <div class="modal fade" id="modal-lg2">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"> Avances de Actividades</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Actividad</th>
                    <th>Descripcion</th>
                    <th>Estado</th>


                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Actividad 1</td>
                    <td>Descripcion de la actividad 1</td>
                    <td>Terminada</td>

                  </tr>
                  <tr>
                    <td>Actividad 2</td>
                    <td>Descripcion de la actividad 2</td>
                    <td>Terminada</td>

                  </tr>
                  <tr>
                    <td>Actividad 3</td>
                    <td>Descripcion de la actividad 3</td>
                    <td>En proceso</td>

                  </tr>
                  <tr>
                    <td>Actividad 4</td>
                    <td>Descripcion de la actividad 4</td>
                    <td>En proceso</td>

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


          <div class="modal fade" id="modal-lg3">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Registro de materiales</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
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
                    <td>Factura N°XX</td>
                    <td>50000</td>
                    <td>Armado estructura</td>
                    <td>100000</td>
                    <td>50000</td>

                  </tr>
                  <tr>
                    <td>Factura N°YY</td>
                    <td>150000</td>
                    <td>Armado </td>
                    <td>50000</td>
                    <td>100000</td>

                  </tr>
                  <tfoot>
                  <tr>
                    <th>Total:</th>
                    <th>200000</th>
                    <th></th>
                    <th>150000</th>
                    <th>50000</th>

                  </tr>
                  </tfoot>

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


          <div class="modal fade" id="modal-lg4">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Bloqueado, esta opcion es para usuario  premium </h4>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>

                </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>




          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">

                  <!-- /.card-header -->
                  <div class="card-body">
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

                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->

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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Proyecto</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Termino</th>
                    <th>Estado</th>
                    <th>Detalle</th>
                    <th>Editar</th>
                    <th>Descargar</th>

                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>QUILIMARÏ</td>
                    <td>03/10/2020
                    </td>
                    <td>04/10/2020</td>
                    <td>Terminado</td>
                    <td>

                      <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg">Ver detalle</a>

                    </td>
                    <td>

                      <a class="btn btn-block btn-primary" href="<?php echo base_url()?>RegistroMateriales" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>"
                      >Editar</a>

                    </td>
                    <td>

                      <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg4">Descargar</a>

                    </td>

                  </tr>
                  <tr>
                    <td>Proyecto 2</td>
                    <td>04/10/2020
                    </td>
                    <td></td>
                    <td>En proceso</td>
                    <td>  <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg">Ver detalle</a></td>
                      <td>

                        <a class="btn btn-block btn-primary" href="<?php echo base_url()?>RegistroMateriales" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>"
                        >Editar</a>

                      </td>
                      <td>

                        <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                        data-target="#modal-lg4">Descargar</a>

                      </td>

                  </tr>
                  <tr>
                    <td>Proyecto 3</td>
                    <td>06/10/2020
                    </td>
                    <td></td>
                    <td>En proceso</td>
                    <td>
                      <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg">Ver detalle</a></td>
                      <td>

                        <a class="btn btn-block btn-primary" href="<?php echo base_url()?>RegistroMateriales" class="nav-link <?php if(isset($activo) && ($activo == 1)){echo "active"; }?>"
                        >Editar</a>

                      </td>
                      <td>

                        <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                        data-target="#modal-lg4">Descargar</a>

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
