<head>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
               <h1 class="m-0 text-dark">Costos fijos</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Administracion oficina</li>
                  <li class="breadcrumb-item active">Costos fijos</li>
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
   </i> Nuevo
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
                     <label>Fecha</label>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ingrese">
                     </div>
                  </div>
               </div>
               <div class="col-md-2">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Tipo</label>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ingrese">
                     </div>
                  </div>
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
                           <th>Fecha</th>
                           <!-- 0 ---> 
                           <th>Costo</th>
                           <!-- 1 --->
                           <th>Tipo</th>
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
                  <H3>Ingresar nuevo costo fijo</H3>
                  <button type="button" class="close-white" data-dismiss="modal">&times;</button>
               </div>

               <a class="btn btn-app" data-toggle="modal" data-target="#modal-nuevo-tipocosto">
                  <i class="fas fa-plus">
                  </i> Nuevo tipo
               </a>
               <div class="modal-body">
                     <div class="row">
                     <div class="col-md-4">
                           <div class="form-group">
                              <label for="recipient-bodega" class="col-form-label">Costo </label>
                              <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Ingrese" id="valor">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="recipient-bodega" class="col-form-label">Fecha </label>
                              <div class="form-group">
                                 <input type="date" class="form-control" placeholder="Ingrese" data-date-format="dd/mm/yyyy" id="fecha">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="recipient-bodega" class="col-form-label">Tipo </label>
                              <select name="tipocosto" id="tipocosto" style="width: 100%; height: 60%">
                              <?php
                                 foreach($lista_tipocostos as $i){
                                   echo '<option value="'. $i->id_tipo .'">'. $i->nombre .'</option>';
                                 }
                                 ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="recipient-tipo" class="col-form-label">Detalle </label>
                              <textarea class="form-control" id="detalle" rows="3"></textarea>
                           </div>
                        </div>
                     </div>
                     <hr class="cell-divide-hr">
                     </div>
                     <div class="modal-footer bg-white">
                        <input type="submit" class="btn btn-primary" value="Guardar" id="añadirnuevo-costo">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div id="modal-nuevo-tipocosto" class="modal fade bd-example-modal-lg" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="table-responsive">
            <!-- Contenido del modal -->
            <div class="modal-content">
               <div class="modal-header bg-blue">
                  <H3>Ingresar nuevo tipo</H3>
                  <button type="button" class="close-white" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                     <div class="row">
                     <div class="col-md-4">
                           <div class="form-group">
                              <label for="recipient-bodega" class="col-form-label">Nombre </label>
                              <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Ingrese" id="tipocosto">
                              </div>
                           </div>
                        </div>

                     </div>
                     <hr class="cell-divide-hr">
                     </div>
                     <div class="modal-footer bg-white">
                        <input type="submit" class="btn btn-primary" value="Guardar" id="añadirnuevo-tipocosto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                     </div>
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
             "targets": [1,2,3],
         }
       ]
     });
   });
</script>
<script type="text/javascript">
   $(document).ready(function(){
     $('#tipocosto').select2({
       theme: "bootstrap"
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url();?>assets/js/Administracion/costosfijos.js"></script>