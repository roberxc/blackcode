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
            <h1>Registro trabajos diarios proyecto</h1>
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
                  <h4 class="modal-title">Registro trabajos diarios proyecto</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Detalle</th>
                    <th>Codigo de servicio</th>
                    <th>Personal</th>
                    <th>Registro fotográfico</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>04/10/2020</td>
                    <td>Se trabaja en armado</td>
                    <td>1</td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg3">Personal</a></td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg">Descargar</a></td>
                  </tr>
                  <tr>
                    <td>05/10/2020</td>
                    <td>Se trabaja en instalación</td>
                    <td>1</td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg3">Personal</a></td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg">Descargar</a></td>
                  </tr>
                  <tr>
                    <td>06/10/2020</td>
                    <td>Se trabaja en inspección</td>
                    <td>1</td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg3">Personal</a></td>
                    <td> <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-lg">Descagar</a></td>
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
<!-- Fin dialog -->

<!-- /.modal -->
<div class="modal fade" id="modal-lg2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Planilla mano de obra</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Total mano de obra</th>
          <th>Total horas</th>
          <th>Hora trabajador</th>
          <th>Costo total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Jose</td>
          <td>16</td>
          <td>20000</td>
          <td>320000</td>
        </tr>

        <tr>
          <td>Omar</td>
          <td>10</td>
          <td>20000</td>
          <td>320000</td>
        </tr>
        <tfoot>
        <tr>
          <th>Total:</th>
          <th></th>
          <th></th>
          <th>520000</th>
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
<!-- Fin dialog -->

<!-- /.modal -->
<div class="modal fade" id="modal-lg3">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Personal que asiste</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Personal</th>
          <th>Horas</th>

        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Jorge</td>
          <td>7</td>


        </tr>
        <tr>
          <td>Omar</td>
          <td>7</td>


        </tr>
        </table>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
          data-target="#modal-l">Atras</button>


        </tr>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- Fin dialog -->






          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">

                      <!-- /.col -->

                      <div class="col-md-4">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Proyecto</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ingrese">
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
            <!-- editacion-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Proyectos
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Terminados</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">En proceso</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       <p>Hola</p>
                       <div class="card-body">
                         <table id="tabla1" class="table table-bordered table-striped">
                           <thead>
                           <tr>
                             <th>Proyectos</th>
                             <th>Fecha Inicio</th>
                             <th>Fecha Termino</th>
                             <th>Registro trabajo</th>
                             <th>Planilla Mano de obra</th>

                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                             <td>QUILIMARÏ</td>
                             <td>03/10/2020
                             </td>
                             <td>04/10/2020</td>
                             <td>  <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                               data-target="#modal-lg">Trabajo Diarios</a></td>
                             <td>  <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                               data-target="#modal-lg2">Mano de obra</a></td>
                           </tr>
                           <tr>
                             <td>proyecto2</td>
                             <td>04/10/2020
                             </td>
                             <td>06/10/2020</td>
                             <td>  <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                               data-target="#modal-lg">Trabajo Diarios</a></td>
                             <td>  <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                               data-target="#modal-lg2">Mano de obra</a></td>
                           </tr>
                           <tr>
                             <td>Proyecto3</td>
                             <td>05/10/2020
                             </td>
                             <td>07/10/2020</td>
                             <td>  <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                               data-target="#modal-lg">Trabajo Diarios</a></td>
                             <td>  <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                               data-target="#modal-lg2">Mano de obra</a></td>
                           </tr>
                           </tbody>

                         </table>
                       </div>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" >
                    <p>hola 2</p>
                    <div class="card-body">
                      <table id="tabla1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Proyectos</th>
                          <th>Fecha Inicio</th>
                          <th>Fecha Termino</th>
                          <th>Registro trabajo</th>


                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Proyecto 1</td>
                          <td>03/10/2020
                          </td>
                          <td>04/10/2020</td>
                          <td>  <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                            data-target="#modal-lg">Ingresar</a></td>

                        </tr>
                        <tr>
                          <td>proyecto2</td>
                          <td>04/10/2020
                          </td>
                          <td>06/10/2020</td>
                          <td>  <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                            data-target="#modal-lg">Ingresar</a></td>
                        </tr>
                        <tr>
                          <td>Proyecto3</td>
                          <td>05/10/2020
                          </td>
                          <td>07/10/2020</td>
                          <td>  <a class="btn btn-block btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                            data-target="#modal-lg">Ingresar</a></td>
                        </tr>
                        </tbody>

                      </table>
                    </div>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>




<!-- editacion -->

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
