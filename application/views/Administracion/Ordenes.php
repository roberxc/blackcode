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
               <h1 class="m-0 text-dark">Ordenes de compra</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Compras</li>
                  <li class="breadcrumb-item active">Ordenes de compra</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <!-- /.container-fluid -->
   </div>
   <a class="btn btn-app" data-toggle="modal" data-target="#modal-nueva-orden">
   <i class="fas fa-plus">
   </i> Nueva
   </a>
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
                     <label class="invisible">Buscar</label>
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
   <div class="card-header">
      <section class="content">
         <div class="box box-info ">
            <div class="box-body">
               <div class="table-responsive">
                  <table id="example1" name="example1" class="table table-bordered table-striped" style="width: 100%;">
                     <thead>
                        <tr>
                           <th>Numero</th>
                           <!-- 0 ---> 
                           <th>Proveedor</th>
                           <!-- 1 --->
                           <th>Fecha</th>
                           <!-- 2 --->
                           <th>Estado</th>
                           <!-- 4 --->
                           <th>Accion</th>
                           <!-- 5 --->
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
      </section>
   </div>
   <!-- Modal -->
   <!-- MODAL INGRESAR PRODUCTO NUEVOS --->
   <div id="modal-nueva-orden" class="modal fade bd-example-modal-lg" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="table-responsive">
            <!-- Contenido del modal -->
            <div class="modal-content">
               <div class="modal-header bg-blue">
                  <H3>Ingresar nueva orden</H3>
                  <button type="button" class="close-white" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <form action="<?= base_url('RegistroEntrada/registrarproductoentrada') ?>" accept-charset="utf-8" method="POST">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="recipient-tipo" class="col-form-label">Proveedor </label>
                              <select name="centrocostos" id="proveedor" style="width: 100%; height: 60%">
                              <?php
                                 foreach($centrocosto as $i){
                                   echo '<option value="'. $i->ID_Proyecto .'">'. $i->NombreProyecto .'</option>';
                                 }
                                 ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="recipient-bodega" class="col-form-label">Bodega </label>
                              <select name="tipobodega" id="tipobodega" style="width: 100%; height: 60%">
                              <?php
                                 foreach($tipobodega as $i){
                                   echo '<option value="'. $i->ID_TipoBodega .'">'. $i->NombreTipoBodega .'</option>';
                                 }
                                 ?>
                              </select>
                           </div>
                        </div>

                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="recipient-bodega" class="col-form-label">Estado </label>
                              <select name="tipobodega" id="estado" style="width: 100%; height: 60%">
                              <?php
                                 foreach($tipobodega as $i){
                                   echo '<option value="'. $i->ID_TipoBodega .'">'. $i->NombreTipoBodega .'</option>';
                                 }
                                 ?>
                              </select>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="recipient-bodega" class="col-form-label">Proyecto </label>
                              <select name="tipobodega" id="proyecto" style="width: 100%; height: 60%">
                              <?php
                                 foreach($tipobodega as $i){
                                    echo '<option value="'. $i->ID_TipoBodega .'">'. $i->NombreTipoBodega .'</option>';
                                    }
                                    ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     
                     <section class="content">
                        <div class="box box-info ">
                           <div class="box-body">
                              <div class="table-responsive">
                                 <table id="productos_orden" name="productos_orden" class="table table-bordered table-striped" style="width: 100%;">
                                    <thead>
                                       <tr>
                                          <th>ID</th>
                                          <!-- 0 ---> 
                                          <th>Nombre Producto</th>
                                          <!-- 1 --->
                                          <th>Categoria</th>
                                          <!-- 2 --->
                                          <th>Stock Total Producto</th>
                                          <!-- 3 --->
                                          <th>Bodega</th>
                                          <!-- 4 --->
                                          <th>Accion</th>
                                          <!-- 5 --->
                                       </tr>
                                    </thead>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </section>  




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
</div>
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#example1').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Stock/fetch_data'); ?>",
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2,3,4],
         }
       ]
     });

     $('#productos_orden').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Stock/fetch_data'); ?>",
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2,3,4,5],
         }
       ]
     });
   });
</script>
<script type="text/javascript">
   //mostrar tipoproducto
   $(document).ready(function(){
     $('#estado').select2({
       theme: "bootstrap"
     });
   });
   //mostrar personal
   $(document).ready(function(){
     $('#proyecto').select2({
       theme: "bootstrap"
     });
   });
   //mostrar centrocostos
   $(document).ready(function(){
     $('#proveedor').select2({
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
   
   
   //mostrar tabla ver mas
   
   
   
</script> 
<!-- ESTE PARA LAS ALERTAS --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>