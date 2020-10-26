<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard de <?php echo $_SESSION['email']?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
                <h3>150</h3>

                <p>Nuevas ordenes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url()?>Ordenes" class="small-box-footer">Más detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Administracion de oficina</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url()?>Inicio" class="small-box-footer" data-toggle="modal" 
            data-target="#oficina1">Administrar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Administracion de trabajadores</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Trabajos Diarios</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>


    <!-- Modal administracion oficina -->
    <div class="modal fade" id="oficina1">
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
                            <a href="<?php echo base_url()?>ControladorAdmin/MenuCaja" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
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

                  <!-- /.modal -->
          <div class="modal fade" id="costo-fijo">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Costo Fijo</h4>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Seleccione un  Mes</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">Seleccione</option>
                            <option>Enero</option>
                            <option>Febrero</option>
                            <option>Marzo</option>
                            <option>Abril</option>
                            <option>Mayo</option>
                            <option>Junio</option>
                            <option>Julio</option>
                            <option>Agosto</option>
                            <option>Septiembre</option>
                            <option>Octubre</option>
                            <option>Noviembre</option>
                            <option>Diciembre</option>

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
                          <label class="invisible">Buscar</label>
                          <button type="button" class="btn btn-block btn-primary">Buscar</button>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                    </div>
                  
                    <br></br>


                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Costo Fijo</th>
                    <th>Enero</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Pago de luz</td>
                    <td>50.000</td>

                  </tr>
                  <tr>
                    <td>Pago de agua</td>
                    <td>50.000</td>

                  </tr>
                  <tr>
                    <td>Mantenimiento de equipo</td>
                    <td>50.000</td>

                  </tr>
                  <tr>
                    <td>Telefono</td>
                    <td>50.000</td>

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

          

  </div>
</body>
</html>