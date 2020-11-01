<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Caja chica</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Inicio</li>
              <li class="breadcrumb-item">Administracion oficina</li>
              <li class="breadcrumb-item active">Caja chica</li>
            </ol>
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
                <h4>Ingreso</h4>
                <p>Registrar fecha y monto que ingresa a la caja chica</p>
                
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url()?>ControladorAdmin/CajaIngreso" class="small-box-footer">Más detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Egreso</h4>

                <p>Registrar fecha, monto y destinatario de la salida de caja chica</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url()?>ControladorAdmin/CajaEgreso" class="small-box-footer">Más detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Vueltos</h4>

                <p>Registro vuelto de los egreso asignados </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url()?>ControladorAdmin/vueltocaja" class="small-box-footer">Más detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-8">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Total de la caja chica</h4>

                <h3>$100.000</h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
             <!-- <a href="<?php echo base_url()?>Inicio" class="small-box-footer" data-toggle="modal" 
            data-target="#monto">Administrar <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div>


          


          <!-- ./col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>


    <!-- Modal administracion oficina -->
    <div class="modal fade" id="monto">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"> Administración de costos de oficina</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
               
                    <div class="container-fluid">
                      <!-- Small boxes (Stat box) -->
                      <div class="row">
                        <div class="col-lg-3 col-3">
                          <!-- small box -->
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h4>Costos fijos </h4>
                              
                            </div>
                            <div class="icon">
                              <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?php echo base_url()?>Inicio" class="small-box-footer" data-toggle="modal" 
                          data-target="#costo-fijo">Administrar <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-3">
                          <!-- small box -->
                          <div class="small-box bg-success">
                            <div class="inner">
                              <h4>Caja Chica</h4>

                            </div>
                            <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo base_url()?>ControladorAdmin/CajaIngreso" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                      </div>

                    </div><!-- /.container-fluid -->
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>          

  </div>
</body>
</html>