<head>
<!-- SELECT CON BUSCADOR -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">



</head>

<html>
<body>
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
              Ingresar Nuevo Producto
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal3">
              Agregar Stock
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
                      <table id="example1" name="example1" class="table table-bordered table-striped" style="width: 100%;">  
                        <thead>  
                          <tr>  
                               <th>ID_Entrada</th>  <!-- 0 ---> 
                               <th>Nombre Producto</th>  <!-- 1 --->
                               <th>Codigo del Producto</th>  <!-- 0 ---> 
                               <th>Categoria</th>  <!-- 2 --->
                               <th>Centro Costo</th>  <!-- 3 --->
                               <th>Fecha de Ingreso</th>  <!-- 4 --->
                               <th>Cantidad Ingresada</th> <!-- 5 --->
                               <th>Bodega</th> <!-- 6 --->
                               <th>Accion</th> <!-- 7 --->
                          </tr>  
                        </thead>  
                      </table>   
                </div>
              </div>
            </div>
          </div>     
        </div>
      </section>     
 </body>  
 </html> 

      <!-- MODAL INGRESAR PRODUCTO NUEVOS --->
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
                      echo '<option value="'. $i->id_proyecto .'">'. $i->nombreproyecto .'</option>';
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
                      echo '<option value="'. $i->id_tipomaterial .'">'. $i->nombretipomaterial .'</option>';
                    }
                ?>
              </select>
            
          </div>

          <!--- ESTO ERA POR SI QUIERE LA MISMA EMPRESA ESCOGER LA FECHA
          <div class="form-group">
            <label for="recipient-fecha" class="col-form-label">Ingrese fecha de ingreso: </label>
            <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>" name="fechaentrada" id="fechaentrada" require>
          </div>
          --->
          
          <div class="form-group">
            <label for="recipient-cantidad" class="col-form-label">Ingrese cantidad ingresada: </label>
            <input type="number" min="1" class="form-control" name="cantidadentrada" id="cantidadentrada" require>
          </div>

          <div class="form-group">
            <label for="recipient-bodega" class="col-form-label">Seleccione Bodega: </label>
              <select name="tipobodega" id="tipobodega" style="width: 100%; height: 60%">
                <?php
                    foreach($tipobodega as $i){
                      echo '<option value="'. $i->id_tipobodega .'">'. $i->nombretipobodega .'</option>';
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


<!-- MODAL INGRESAR STOCK A PRODUCTOS EXISTENTES --->
<div id="miModal3" class="modal fade bd-example-modal-lg" role="dialog">
      <div class="modal-dialog modal-lg">
      <div class="table-responsive">
    <!-- Contenido del modal -->
      <div class="modal-content">
        <div class="modal-header bg-blue">
        
        <H3>Agregar Stock a Producto Existente</H3>
          <button type="button" class="close-white" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <form action="<?= base_url('RegistroEntrada/agregarstockaproducto') ?>" accept-charset="utf-8" method="POST">

          <div class="form-group">
            <label for="recipient-tipo" class="col-form-label">Seleccion centro de costos </label>
              <select name="centrodecostos2" id="centrodecostos2" style="width: 100%; height: 60%">
                <?php
                    foreach($centrocosto as $i){
                      echo '<option value="'. $i->id_proyecto .'">'. $i->nombreproyecto .'</option>';
                    }
                ?>
              </select>
          </div>


          <div class="form-group">
            <label for="recipient-material" class="col-form-label">Seleccione Producto </label>
              <select name="material" id="material" style="width: 100%; height: 60%">
                <?php
                    foreach($material as $i){
                      echo '<option value="'. $i->id_material .'">'. $i->nombrematerial .'</option>';
                    }
                ?>
              </select>
          </div>



          <div class="form-group">
            <label for="recipient-cantidad" class="col-form-label">Ingrese cantidad ingresada: </label>
            <input type="number" min="1" class="form-control" name="cantidadentradaagregar" id="cantidadentradaagregar" require>
          </div>


          <div class="form-group">
            <label for="recipient-glosa" class="col-form-label">Glosa: </label><br>
            <input type="text" class="form-control" name="glosaactualizar" id="glosaactualizar" require>
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

<!-- MODAL VER MAS --->


<div class="modal fade" id="myModalVerMas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <h4 class="modal-title" id="exampleModalLabel">Detalle Producto</h4>
        <button type="button" class="close-white" data-dismiss="modal">&times;</button>
        </button>
      </div>
      <form id="frmHistorialStock" method="POST">
      <div class="modal-body">
      <div class="box-body">
      <div class="col-md-12">
              </div>
            </div>
            <div class="col-md-12">
              <div class="panel-group">
                <div class="panel panel-primary">
                  <div class="panel-body">
                     <div class="detalle-producto table-resposive">
                      <div class="table-responsive">
                      <table id="example2" name="example2" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Bodega</th> <!-- 0 -->
                                <th>Glosa</th>              <!-- 1 -->
                                <th>Responsable</th> <!-- 2 -->  
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




<script type="text/javascript">
      //mostrar tipoproducto
      $(document).ready(function(){
        $('#tipoproducto').select2({
          theme: "bootstrap"
        });
      });
      //mostrar personal
      $(document).ready(function(){
        $('#personal').select2({
          theme: "bootstrap"
        });
      });
      //mostrar centrocostos
      $(document).ready(function(){
        $('#centrocostos').select2({
          theme: "bootstrap"
        });
      });
      //mostrar bodega
      $(document).ready(function(){
        $('#tipobodega').select2({
          theme: "bootstrap"
        });
      });
      //mostrar material en tabla agregar stock
      $(document).ready(function(){
        $('#material').select2({
          theme: "bootstrap"
        });
      });
      //mostrar tipoproducto en tabla agregar stock
      $(document).ready(function(){
        $('#tipoproducto2').select2({
          theme: "bootstrap"
        });
      });
      //mostrar tipobodega2 en tabla agregar stock
      $(document).ready(function(){
        $('#tipobodega2').select2({
          theme: "bootstrap"
        });
      });
      //mostrar centrodecosto2 en tabla agregar stock
      $(document).ready(function(){
        $('#centrodecostos2').select2({
          theme: "bootstrap"
        });
      });
      //Mostrar tabla principal
      $(document).ready(function(){
        $('#example1').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
          "processing": true,
          "serverSide": true, 
          "ajax":{url:"<?php echo base_url('RegistroEntrada/fetch_data'); ?>",
          type: "POST"
        },
          "columnDefs":[
            {
                "targets": [1,2,3,4,5,6,7,8],
            }
          ]
        });
      });

      //mostrar tabla ver mas



</script> 

 <!-- ESTE PARA LAS ALERTAS --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>

<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>





