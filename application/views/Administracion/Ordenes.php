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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

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
   <a class="btn btn-app" data-toggle="modal" data-target="#modal-nueva-orden">
   <i class="fas fa-download">
   </i> Exportar
   </a>
   <div class="card-header">
      <section class="content">
         <div class="box box-info ">
            <div class="box-body">
               <div class="table-responsive">
                  <table id="ordenes_principales" name="example1" class="table table-bordered table-striped" style="width: 100%;">
                     <thead>
                        <tr>
                           <th>Numero</th>
                           <th>Fecha</th>
                           <th>Proveedor</th>
                           <th>Total</th>
                           <th>Estado</th>
                           <th>Accion</th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
         </div>
      </section>
   </div>
   <!-- Modal -->
   <!-- MODAL INGRESAR NUEVA ORDEN --->
   <div id="modal-nueva-orden" class="modal fade bd-example-modal-xl" role="dialog">
      <div class="modal-dialog modal-xl">
         <div class="table-responsive">
            <!-- Contenido del modal -->
            <div class="modal-content">
               <div class="modal-header bg-blue">
                  <H3>Ingresar nueva orden</H3>
                  <button type="button" class="close-white" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-tipo" class="col-form-label">Numero Orden </label>
                           <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="nroorden" name="nroorden"/>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-tipo" class="col-form-label">Numero cotizacion </label>
                           <select name="nrocotizacion" id="nrocotizacion" style="width: 100%; height: 60%" onchange="obtenerCotizacion()">
                           <option value="" selected>Seleccione</option>
                           <?php
                              foreach($lista_cotizaciones as $i){
                                 echo '<option value="'.$i->id_cotizacion.'">'. $i->nrocotizacion.'</option>';
                                    }
                                 ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-bodega" class="col-form-label">Bodega </label>
                           <select name="bodega" id="bodega" style="width: 100%; height: 60%">
                           <option value="" selected>Seleccione</option>
                           <?php
                              foreach($lista_bodegas as $i){
                                 echo '<option value="'.$i->id_tipobodega.'">'. $i->nombretipobodega .'</option>';
                                    }
                                 ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-bodega" class="col-form-label">Estado </label>
                           <select name="estado" id="estado" style="width: 100%; height: 60%">
                              <option value="1" selected>Seleccione</option>
                              <option value="2">Pagada</option>
                              <option value="1">Impagada</option>
                              <option value="0">Cheque a 30 dias</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-bodega" class="col-form-label">Proyecto </label>
                           <select name="proyecto" id="proyecto" style="width: 100%; height: 60%">
                           <option value="" selected>Seleccione</option>
                           <?php
                              foreach($lista_proyectos as $i){
                                 echo '<option value="'. $i->id_proyecto.'">'. $i->nombreproyecto .'</option>';
                                 }
                                 ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <hr class="cell-divide-hr">
                  <div class="card-body">
                     <section class="content">
                        <div class="box box-info ">
                           <div class="box-body" id="detalle-cotizacion">

                           </div>
                        </div>
                     </section>
                     <hr class="cell-divide-hr">
                     <div class="row">
                        <div class="col">
                           <div class="float-right" id="subtotal-txt">Subtotal:</div>
                           <br>
                           <div class="float-right" id="iva-txt">IVA: 19%</div>
                           <br>
                           <div class="float-right" id="total-txt">Total:</div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer bg-white">
                     <input type="submit" class="btn btn-primary" value="Guardar" id="añadir-nuevaorden">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- TERMINO MODAL INGRESAR NUEVA ORDEN --->                             
   <!-- MODAL INGRESAR PRODUCTO NUEVOS --->
   <div id="modal-nuevo-producto" class="modal fade bd-example-modal-lg" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="table-responsive">
            <!-- Contenido del modal -->
            <div class="modal-content">
               <div class="modal-header bg-blue">
                  <H3>Nuevo producto</H3>
                  <button type="button" class="close-white" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-tipo" class="col-form-label">Nombre </label>
                           <input type="text" class="form-control" id="nombre-producto" placeholder="Ingrese">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="recipient-tipo" class="col-form-label">Valor unitario</label>
                           <input type="text" class="form-control" id="valor-producto" placeholder="Ingrese">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer bg-white">
                     <input type="submit" class="btn btn-primary" id="añadir-producto" value="Guardar">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- MODAL DETALLE ORDEN DE COMPRA --->
   <div id="modal-detalle-orden" class="modal fade bd-example-modal-lg" role="dialog">
      <div class="modal-dialog modal-lg">
         <div class="table-responsive">
            <!-- Contenido del modal -->
            <form id="form-descargar-detalle-orden" role="form" action="Ordenes/descargarDetalleOrden" method="POST">
               <div class="modal-content">
                  <div class="modal-header bg-blue">
                     <H3>Detalle orden</H3>
                     <button type="button" class="close-white" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                     <hr class="cell-divide-hr">
                     <button type='submit' class='btn btn-app'>
                     <i class="fas fa-plus">
                     </i> Exportar
                     </button>
                     <div class="card-body" id="dynamic_field" >
                        <div class="box-body">
                           <div class="modal-body" id="detalle-ordenes">
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer bg-white">
                        <input class="btn btn-primary">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- MODAL ESTADO ORDEN DE COMPRA --->
   <div id="modal-estado-orden" class="modal fade bd-example-modal-sm" role="dialog">
      <div class="modal-dialog modal-sm">
         <div class="table-responsive">
            <!-- Contenido del modal -->
            <div class="modal-content">
               <div class="modal-header bg-blue">
                  <H3>Estado de orden</H3>
                  <button type="button" class="close-white" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="card-body" id="dynamic_field" >
                     <div class="box-body">
                        <div class="modal-body" id="estado-ordenes">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<input type="hidden" class="form-control" id="idhidden">
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#ordenes_principales').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Ordenes/listaOrdenes'); ?>",
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2,3,4],
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
   
     $('#proyecto').select2({
       theme: "bootstrap"
     });
   
     $('#proveedor').select2({
       theme: "bootstrap"
     });
   
     $('#bodega').select2({
       theme: "bootstrap"
     });
   
     $('#material').select2({
       theme: "bootstrap"
     });
   
     $('#nrocotizacion').select2({
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
<script src="<?php echo base_url();?>assets/js/Administracion/ordenes.js"></script>