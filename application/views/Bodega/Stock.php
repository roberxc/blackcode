<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Stock de Productos</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Stock</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <section class="content">
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
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Codigo de item</label>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ingrese">
                     </div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Nombre</label>
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
      <div class="card card-default">
         <div class="table-responsive">
            <table id="table_reajustar_stock" name="table_reajustar_stock" class="table table-bordered table-striped" style="width: 100%;">
               <thead>
                  <tr>
                     <th>ID</th>
                     <!-- 0 -->
                     <th>Nombre de Item</th>
                     <!-- 1 -->
                     <th>Tipo Item</th>
                     <!-- 2 -->
                     <th>Stock</th>
                     <!-- 3 -->
                     <th>Acción</th>
                     <!-- 6 -->
                  </tr>
                  <tr>
                     <td>1</td>
                     <td>Cañeria de cobre</td>
                     <td>Cañerias</td>
                     <td>20</td>
                     <td><a href="#" class="fas fa-eye" style="font-size: 20px;" ></a></td>
                  </tr>
                  <tr>
                     <td>2</td>
                     <td>Cañeria de oro</td>
                     <td>Cañerias</td>
                     <td>15</td>
                     <td><a href="#" class="fas fa-eye" style="font-size: 20px;" ></a></td>
                  </tr>
                  <tr>
                     <td>3</td>
                     <td>Cañeria de hierro</td>
                     <td>Cañerias</td>
                     <td>23</td>
                     <td><a href="#" class="fas fa-eye" style="font-size: 20px;" ></a></td>
                  </tr>
                  <tr>
                     <td>4</td>
                     <td>Pernos</td>
                     <td>Herramientas</td>
                     <td>66</td>
                     <td><a href="#" class="fas fa-eye" style="font-size: 20px;" ></a></td>
                  </tr>
                  <tr>
                     <td>5</td>
                     <td>Cemento</td>
                     <td>Construccion</td>
                     <td>17</td>
                     <td><a href="#" class="fas fa-eye" style="font-size: 20px;" ></a></td>
                  </tr>
               </thead>
            </table>
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
                                                   <th>Nombre del Producto</th>
                                                   <!-- 0 -->
                                                   <th>Bodega</th>
                                                   <!-- 1 -->
                                                   <th>Cantidad Almacenada</th>
                                                   <!-- 2 -->  
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