
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Registro de Entradas</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Registro de entradas</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">
              Ingresar Entrada
        </button>
      <!-- /.container-fluid -->
   </div>
    <section class="content">
        <div class="box box-info ">
            <div class="box-body">
                <div class="table-responsive">
                    <table id="table_entrada" name="table_entrada" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th> <!-- 0 -->
                                <th>Nombre de Item</th> <!-- 1 -->
                                <th>Codigo Item</th> <!-- 2 -->
                                <th>Fecha de Ingreso</th>   <!-- 3 -->
                                <th>Cantidad Ingresada</th>        <!-- 4 --> 
                                <th>Acción</th>             <!-- 5 -->
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>Cañeria de cobre</td>
                              <td>001</td>
                              <td>19/10/2020</td>
                              <td>30</td>
                              <td><a href="#" class="glyphicon glyphicon-edit" style="font-size: 20px;"></a></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Cañeria de oro</td>
                              <td>002</td>
                              <td>20/10/2020</td>
                              <td>41</td>
                              <td><a href="#" class="glyphicon glyphicon-edit" style="font-size: 20px;"></a></td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Cañeria de hierro</td>
                              <td>003</td>
                              <td>21/10/2020</td>
                              <td>38</td>
                              <td><a href="#" class="glyphicon glyphicon-edit" style="font-size: 20px;"></a></td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Pernos</td>
                              <td>004</td>
                              <td>22/10/2020</td>
                              <td>105</td>
                              <td><a href="#" class="glyphicon glyphicon-edit" style="font-size: 20px;"></a></td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Cemento</td>
                              <td>005</td>
                              <td>23/10/2020</td>
                              <td>22</td>
                              <td><a href="#" class="glyphicon glyphicon-edit" style="font-size: 20px;"></a></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
      <!-- MODAL --->
      <div id="miModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
      <div class="table-responsive">
    <!-- Contenido del modal -->
      <div class="modal-content">
        <div class="modal-header bg-blue">
        
        <H3>Ingresar Entrada de Productos</H3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Ingrese nombre del item: <input type="text" require></p><br>
          <p>Ingrese codigo del item: <input type="text" require></p><br>
          <p>Ingrese fecha de ingreso: <input type="date" require></p><br>
          <p>Ingrese cantidad ingresada: <input type="number" require></p><br>
        </div>
        
        <div class="modal-footer bg-blue">
        <p>
          <input type="submit" class="btn btn-success" value="Completar ingreso">
        </p>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      </div>
    </div>
    </div>



        <div id="modal"></div>
        <!-- Modal -->
<div class="modal fade" id="myModalVerMas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <h4 class="modal-title" id="exampleModalLabel">Detalle Producto</h4>
        <small>Stock del producto entre bodegas</small>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="frmHistorialStock" method="POST">
      <div class="modal-body">
      <div class="box-body">
      <div class="col-md-12">
                <div class="panel-group">
                  <div class="panel panel-primary">
                    <div class="panel-heading">Mas Información</div>
                    <div class="panel-body">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="txtGlosa">Glosa:</label>
                              <textarea class="form-control" name="txtGlosa" id="txtGlosa" readonly></textarea>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="txtUsuarioResp">Usuario Responsable:</label>
                              <input class="form-control" name="txtUsuarioResp" id="txtUsuarioResp" readonly></input>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel-group">
                <div class="panel panel-primary">
                  <div class="panel-heading">Detalles Almacenamiento</div>
                  <div class="panel-body">
                     <div class="detalle-producto table-resposive">
                      <div class="table-responsive">
                      <table id="table_vermas_reajustar_stock" name="table_vermas_reajustar_stock" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre del Producto</th> <!-- 0 -->
                                <th>Bodega</th>              <!-- 1 -->
                                <th>Cantidad Almacenada</th> <!-- 2 -->  
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
      </form>
    </div>
    </div>
  </div>
</div>
    </section>
</div>
