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
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<!----   --->
<div class="content-wrapper">
   <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
         <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="pt-2 px-3">
               <h3 class="card-title">Proveedores</h3>
            </li>
            <li class="nav-item">
               <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Nuevos</a>
            </li>
         </ul>
      </div>
      <div class="tab-content" id="custom-tabs-two-tabContent">
         <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Proveedores</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                           <li class="breadcrumb-item active">Compras</li>
                           <li class="breadcrumb-item active">Proveedores</li>
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
               <section class="content">
                  <div class="box box-info ">
                     <div class="box-body">
                        <div class="table-responsive">
                           <table id="example1" name="example1" class="table table-bordered table-striped" style="width: 100%;">
                              <thead>
                                 <tr>
                                    <th style="width: 3%;background-color: #006699; color: white;">#</th>
                                    <th style="width: 3%;background-color: #006699; color: white;">Rut</th>
                                    <th style="width: 3%;background-color: #006699; color: white;">Nombre</th>
                                    <!-- 1 --->
                                    <th style="width: 3%;background-color: #006699; color: white;">Telefono</th>
                                    <th style="width: 3%;background-color: #006699; color: white;">Estado</th>
                                    <th style="width: 3%;background-color: #006699; color: white;">Accion</th>
                                    <!-- 5 --->
                                 </tr>
                              </thead>
                           </table>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
         <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">


         </div>
      </div>
   </div>
</div>
<!-- MODAL INGRESAR NUEVO PROVEEDOR --->
<div id="modal-nueva-orden" class="modal fade bd-example-modal-lg" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="table-responsive">
         <!-- Contenido del modal -->
         <div class="modal-content">
            <div class="modal-header bg-blue">
               <H3>Agregar proveedor</H3>
               <button type="button" class="close-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-tipo" class="col-form-label">Rut: </label>
                           <input type="text" class="form-control" id="rut" placeholder="Ingrese">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-bodega" class="col-form-label">Nombre: </label>
                           <input type="text" class="form-control" id="nombre" placeholder="Ingrese">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-bodega" class="col-form-label">Correo electronico: </label>
                           <input type="mail" class="form-control" id="correo" name="nombre-documento" placeholder="Ingrese">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-bodega" class="col-form-label">Direccion: </label>
                           <input type="text" class="form-control" id="direccion" name="nombre-documento" placeholder="Ingrese">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-bodega" class="col-form-label">Telefono: </label>
                           <input type="text" class="form-control" id="telefono" name="nombre-documento" placeholder="Ingrese">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-bodega" class="col-form-label">Dias de credito: </label>
                           <input type="text" class="form-control" id="dias-credito" name="dias-credito" placeholder="Ingrese">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-bodega" class="col-form-label">Comentarios extra: </label>
                           <textarea class="form-control" id="comentario" rows="3"></textarea>
                        </div>
                     </div>
                  </div>
                  <hr class="cell-divide-hr">
                  <div class="modal-footer bg-white">
                     <button type="button" id="añadir-proveedor" class="btn btn-primary">Guardar</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<div id="modal-confirmacion" class="modal fade bd-example-modal-sm" role="dialog">
      <div class="modal-dialog modal-sm">
         <!-- Contenido del modal -->
         <div class="modal-content">
            <div class="modal-header bg-red">
               <H3>Confirmación</H3>
               <button type="button" class="close-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="modal-body">
                  <p>Estás seguro que deseas cambiar el estado de este registro?</p>
               </div>
            </div>
            <div class="modal-body">
               <div class="card-body" id="dynamic_field" >
                  <div class="box-body">
                     <div class="form-group">
                        <label for="sel1">Cambiar estado</label>
                        <select class="form-control" id="estado_registro">
                           <option value="" selected>Seleccione</option>
                           <option value="0">Activo</option>
                           <option value="1">Inactivo</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer bg-white">
               <input type="submit" class="btn btn-primary" value="Si" onclick="deleteRegistro()">
               <input type="hidden" id="id_usuario">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
         </div>
      </div>
   </div>
<div id="modal-detalle-proveedor" class="modal fade bd-example-modal-lg" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="table-responsive">
         <!-- Contenido del modal -->
         <div class="modal-content">
            <div class="modal-header bg-blue">
               <H3>Detalle proveedor</H3>
               <button type="button" class="close-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="card-body" id="dynamic_field" >
                  <div class="box-body">
                     <div class="modal-body" id="detalle-proveedores">
                     </div>
                  </div>
               </div>
               <div class="modal-footer bg-white">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div id="modal-editar-proveedor" class="modal fade bd-example-modal-lg" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="table-responsive">
         <!-- Contenido del modal -->
         <div class="modal-content">
            <div class="modal-header bg-blue">
               <H3>Editar proveedor</H3>
               <button type="button" class="close-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="card-body" id="dynamic_field" >
                  <div class="box-body">
                     <div class="modal-body" id="editar-proveedores">
                     </div>
                  </div>
               </div>
               <div class="modal-footer bg-white">
                  <input type="submit" class="btn btn-primary" value="Guardar" onclick="updateProveedor()">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#example1').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Proveedores/obtenerProveedores'); ?>",
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2],
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url();?>assets/js/Administracion/proveedores.js"></script>