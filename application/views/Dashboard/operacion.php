<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bienvenido "Jose"</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>1° paso</h3>

                <p>Registro trabajo</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                data-target="#modal-lg1">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- small box  editar-->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>2° paso</h3>
                <p>Gastos de viáticos</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                data-target="#modal-lg2">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>3° paso</h3>

                <p>Materiales comprados durante los trabajos</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                data-target="#modal-lg">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>4° paso</h3>

                <p>Materiales comprados antes de los trabajos</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                data-target="#modal-lg">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>5° paso</h3>

                <p>Gastos varios</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                data-target="#modal-lg">Ingresar<i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->

          <!-- right col (We are only adding the ID to make the widgets sortable)-->


<!-- Map card -->
            <div class="modal fade" id="modal-lg1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <div align="center"><img src="<?php echo base_url();?>assets/Imagen/bot.gif"></div>
                  </br>
                    <h4 class="modal-title">Registra trabajo a realizar </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Codigo:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Fecha:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Persona a cargo:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Proyecto/cliente:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Detalle trabajo realizados:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-l">Guardar y siguente</button>
                    </tr>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
<!-- Fin dialog -->

<!-- Map card  2 paso-->
            <div class="modal fade" id="modal-lg2">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <div align="center"><img src="bot.gif"></div>
                  </br>
                    <h4 class="modal-title">Registro Gastos de viáticos </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Desayuno:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Almuerzo:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Cena:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>

                    <div class="form-group">
                      <label>Agua:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                    <div class="form-group">
                      <label>Alojamiento:</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ingrese">
                          </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                      data-target="#modal-l">Guardar y siguente</button>
                    </tr>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
<!-- Fin dialog -->


            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</body>
</html>
