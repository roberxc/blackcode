<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ordenes de compra <?php echo $_SESSION['email']?></h1>
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
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Numero</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ingrese">
                              </div>
                        </div>
                        <!-- /.form-group -->
                      </div>

                      <div class="col-md-2">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Fecha emisión</label>
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ingrese">
                              </div>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Estado</label>
                          <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">Seleccione</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                          </select>
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-2">
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Proveedor</label>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Numero</th>
                      <th>Trabajador</th>
                      <th>Proveedor</th>
                      <th>Productos</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>Sodimac</td>
                      <td>Tuercas</td>
                      <td>11-7-2014</td>
                      <td><span class="bg-gradient-success">Aprobada</span></td>
                      <td><button type="button" class="btn btn-default"><i class="fas fa-align-left"></i></button><button type="button" class="btn btn-default"><i class="fas fa-align-left"></i></button></td>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>Sodimac</td>
                      <td>Tuercas</td>
                      <td>11-7-2014</td>
                      <td><span class="bg-gradient-warning">En espera</span></td>
                      <td><button type="button" class="btn btn-default"><i class="fas fa-align-left"></i></button><button type="button" class="btn btn-default"><i class="fas fa-align-left"></i></button></td>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>Sodimac</td>
                      <td>Tuercas</td>
                      <td>11-7-2014</td>
                      <td><span class="bg-gradient-danger">Rechazada</span></td>
                      <td><button type="button" class="btn btn-default"><i class="fas fa-align-left"></i></button><button type="button" class="btn btn-default"><i class="fas fa-align-left"></i></button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</body>
</html>