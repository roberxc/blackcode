<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bienvenido <?php $set_data = $this->session->all_userdata(); 
            if (isset($set_data['nombre_usuario'])) {
              echo $set_data['nombre_usuario'];
            }?></h1>
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
          <!-- ./col ------------------------------------------------------->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>Estado de proyecto</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url();?>Proyecto/Estado_proyecto" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <!-- ./col ------------------------------------------------------->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>Registrar proyecto</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url();?> nicio" data-toggle="modal" data-target="#modal-lg" class="small-box-footer">
              Ingresar <i class="fas fa-arrow-circle-right"></i></a>
              
            </div>
          </div>
          <!-- ./col ------------------------------------------------------->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>Proyectos ejecutados o en ejecución</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url();?>Proyecto/Proyecto_ejecucion" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <!-- ./col ------------------------------------------------------->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>Crear proyectos</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url();?>Proyecto/Evaluacion_proyecto" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <!-- ./col ------------------------------------------------------->

            <!-- /.modal -->
          <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Registrar proyecto</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                          <label>Nombre Proyecto</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ingrese">
                              </div>
                 </div>
                 <div class="form-group">
                          <label>Fecha de inicio</label>
                              <div class="form-group">
                                <input type="date" class="form-control" placeholder="Ingrese">
                              </div>
                 </div>
                 <div class="form-group">
                          <label>Fecha termino </label>
                              <div class="form-group">
                                <input type="date" class="form-control" placeholder="Ingrese">
                              </div>
                 </div>
                 <div class="form-group">
                          <label>Monto total del proyecto</label>
                              <div class="form-group">
                                <input type="number" class="form-control" placeholder="Ingrese">
                              </div>
                 </div>
                        <!--
                    <div class="col-4">
                          <label>Proveedor</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">Seleccione</option>
                            <option>Proveedor 1</option>
                            <option>Proveedor 2</option>
                            <option>Proveedor 3</option>
                        </select>
                    </div>
                    -->
                   
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-primary">Guardar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">

          </section>
          <!-- /.Left col -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</body>
</html>