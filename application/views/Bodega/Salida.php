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

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Registro de Salidas</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Registro de Salidas</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">
              Ingresar Salida
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
                               <th>ID</th>  <!-- 0 ---> 
                               <th>Nombre Producto</th>  <!-- 1 --->
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

          <form action="<?= base_url('RegistroSalida/registrarproductosalida') ?>" accept-charset="utf-8" method="POST">

          <div class="form-group">
            <label for="recipient-tipo" class="col-form-label">Seleccion centro de costos </label>
              <select name="centrocostos" id="centrocostos" style="width: 100%; height: 60%">
                <?php
                    foreach($centrocosto as $i){
                      echo '<option value="'. $i->ID_Proyecto .'">'. $i->NombreProyecto .'</option>';
                    }
                ?>
              </select>
          </div>

          <div class="form-group">
            <label for="recipient-tipo" class="col-form-label">Seleccione producto: </label>
              <select name="material" id="material" style="width: 100%; height: 60%">
                <?php
                    foreach($material as $i){
                      echo '<option value="'. $i->ID_Material .'">'. $i->NombreMaterial .'</option>';
                    }
                ?>
              </select>
            
          </div>

          <div class="form-group">
            <label for="recipient-tipo" class="col-form-label">Seleccione tipo de producto: </label>
              <select name="tipoproducto" id="tipoproducto" style="width: 100%; height: 60%">
                <?php
                    foreach($categorias as $i){
                      echo '<option value="'. $i->ID_TipoMaterial .'">'. $i->NombreTipoMaterial .'</option>';
                    }
                ?>
              </select>
            
          </div>

          <div class="form-group">
            <label for="recipient-fecha" class="col-form-label">Ingrese fecha de ingreso: </label>
            <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>" name="fechaentrada" id="fechaentrada" require>
          </div>

          <div class="form-group">
            <label for="recipient-cantidad" class="col-form-label">Ingrese cantidad ingresada: </label>
            <input type="number" min="1" class="form-control" name="cantidadentrada" id="cantidadentrada" require>
          </div>

          <div class="form-group">
            <label for="recipient-bodega" class="col-form-label">Seleccione Bodega: </label>
              <select name="tipobodega" id="tipobodega" style="width: 100%; height: 60%">
                <?php
                    foreach($tipobodega as $i){
                      echo '<option value="'. $i->ID_TipoBodega .'">'. $i->NombreTipoBodega .'</option>';
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


<script type="text/javascript">
  //mostrar tipo producto
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
      //mostrar centro de costos
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
      $(document).ready(function(){
        $('#material').select2({
          theme: "bootstrap"
        });
      });
      $(document).ready(function(){
        $('#example1').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
          "processing": true,
          "serverSide": true, 
          "ajax":{url:"<?php echo base_url('RegistroSalida/fetch_data'); ?>",
          type: "POST"
        },
          "columnDefs":[
            {
                "targets": [1,2,3,4,5,6,7],
            }
          ]
        });
      });
</script> 

 <!-- ESTE PARA LAS ALERTAS --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>

<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>




