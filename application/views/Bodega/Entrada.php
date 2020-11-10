<head>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>


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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Mimodal2">
              Crear Categoria
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
                                <th>Nombre Producto</th> <!-- 1 -->
                                <th>Categoria</th> <!-- 2 -->
                                <th>Centro Costo</th> <!-- 3 -->
                                <th>Fecha de Ingreso</th>   <!-- 4 -->
                                <th>Cantidad Ingresada</th>        <!-- 5 --> 
                                <th>Precio de compra anterior</th> <!-- 6 -->
                                <th>Precio de compra actual</th> <!-- 7 -->
                                <th>Diferencia de Precio</th> <!-- 8 -->
                                <th>Bodega</th> <!-- 9 -->
                                <th>Responsable</th> <!-- 10 -->
                                <th>Acción</th> <!-- 11 -->
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>Cañeria de cobre</td>
                              <td>Cañerias</td>
                              <td>19/10/2020</td>
                              <td>30</td>
                              <td><a href="#" class="fas fa-edit" style="font-size: 20px;"></a>
                              <a href="#" class="fas fa-eye" style="font-size: 20px;" ></a></td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Cañeria de oro</td>
                              <td>Cañerias</td>
                              <td>20/10/2020</td>
                              <td>41</td>
                              <td><a href="#" class="fas fa-edit" style="font-size: 20px;"></a>
                              <a href="#" class="fas fa-eye" style="font-size: 20px;" ></a></td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Cañeria de hierro</td>
                              <td>Cañerias</td>
                              <td>21/10/2020</td>
                              <td>38</td>
                              <td><a href="#" class="fas fa-edit" style="font-size: 20px;"></a>
                              <a href="#" class="fas fa-eye" style="font-size: 20px;" ></a></td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Pernos</td>
                              <td>Herramientas</td>
                              <td>22/10/2020</td>
                              <td>105</td>
                              <td><a href="#" class="fas fa-edit" style="font-size: 20px;"></a>
                              <a href="#" class="fas fa-eye" style="font-size: 20px;" ></a></td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Cemento</td>
                              <td>Construccion</td>
                              <td>23/10/2020</td>
                              <td>22</td>
                              <td><a href="#" class="fas fa-edit" style="font-size: 20px;"></a>
                              <a href="#" class="fas fa-eye" style="font-size: 20px;" ></a></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
      <!-- MODAL INGRESAR PRODUCTO --->
      <div id="miModal" class="modal fade bd-example-modal-lg" role="dialog">
      <div class="modal-dialog modal-lg">
      <div class="table-responsive">
    <!-- Contenido del modal -->
      <div class="modal-content">
        <div class="modal-header bg-blue">
        
        <H3>Ingresar Entrada de Productos</H3>
          <button type="button" class="close-white" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <form action="<?= base_url('RegistroEntrada/registrarproductoentrada') ?>" accept-charset="utf-8" method="POST">

          <div class="form-group">
            <label for="recipient-tipo" class="col-form-label">Seleccion centro de costos </label>
              <select name="centrocostos" id="centrocostos" style="width: 100%; height: 60%">
                <?php
                    foreach($centrocosto as $i){
                      echo '<option value="'. $i->ID_CentroCosto .'">'. $i->Nombre .'</option>';
                    }
                ?>
              </select>
          </div>

          <div class="form-group">
            <label for="recipient-nombre" class="col-form-label">Ingrese nombre del producto:</label>
            <input type="text" class="form-control" name="nombreproducto" require>
          </div>

          <div class="form-group">
            <label for="recipient-tipo" class="col-form-label">Seleccione tipo de producto: </label>
              <select name="tipoproducto" id="tipoproducto" style="width: 100%; height: 60%">
                <?php
                    foreach($categorias as $i){
                      echo '<option value="'. $i->ID_TipoMaterial .'">'. $i->Nombre .'</option>';
                    }
                ?>
              </select>
            
          </div>

          <div class="form-group">
            <label for="recipient-fecha" class="col-form-label">Ingrese fecha de ingreso: </label>
            <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>" name="fechaentrada" require>
          </div>

          <div class="form-group">
            <label for="recipient-cantidad" class="col-form-label">Ingrese cantidad ingresada: </label>
            <input type="number" min="1" class="form-control" name="cantidadentrada" id="cantidadentrada" require>
          </div>

          <div class="form-group">
              <label for="recipient-precio" class="col-for-label">Ingrese precio del producto: </label>
              <input type="number" min="1" class="form-control" name="precioproducto" id="precioproducto" require>
          </div>

          <div class="form-group">
            <label for="recipient-usuario" class="col-form-label">Seleccione quien realizo la compra:</label>
              <select class="form-control" name="usuario" id="personal" style="width: 100%; height: 60%">
                <?php
                    foreach($usuarios as $i){
                      echo '<option value="'. $i->ID_Personal .'">'. $i->NombreCompleto .'</option>';
                    }
                ?>
              </select>
            
          </div>

          <div class="form-group">
            <label for="recipient-glosa" class="col-form-label">Glosa: </label><br>
            <input type="text" class="form-control" name="glosa" id="glosa" require>
          </div>

          
        </div>
        
        <div class="modal-footer bg-white">
          
          <input type="submit" class="btn btn-primary" value="Completar ingreso"  onclick="Success();" >
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          
        </div>
        </form>
      </div>
      </div>
    </div>
    </div>
</div>

 <!-- MODAL INGRESAR CATEGORIA --->

<div class="modal" tabindex="-1" role="dialog" id="Mimodal2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <h3 class="modal-title">Ingreso de nueva categoria</h3>
        <button type="button" class="close-white" data-dismiss="modal">&times;</button>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('RegistroEntrada/registrarCategoria') ?>" accept-charset="utf-8" method="POST">
              <div class="form-group">
                <label for="recipient-nombre" class="col-form-label">Ingrese el nombre de la nueva categoria:</label>
                <input type="text" class="form-control" name="nombrecategoria" required>
              </div>
      </div>
      <div class="modal-footer bg-white">
        <input type="submit" class="btn btn-primary" value="Completar ingreso"  onclick="Success();" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
        </form>
    </div>
  </div>
</div>

<script type="text/javascript">
      $(document).ready(function(){
        $('#tipoproducto').select2({
          theme: "bootstrap"
        });
      });
      $(document).ready(function(){
        $('#personal').select2({
          theme: "bootstrap"
        });
      });
      $(document).ready(function(){
        $('#centrocostos').select2({
          theme: "bootstrap"
        });
      });
</script>

 <!-- ESTE PARA LAS ALERTAS --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>
