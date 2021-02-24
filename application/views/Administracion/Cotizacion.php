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
               <h1 class="m-0 text-dark">Cotizaciones</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Compras</li>
                  <li class="breadcrumb-item active">Facturas</li>
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
   <!-- MODAL INGRESAR NUEVA ORDEN --->
   <div id="modal-nueva-orden" class="modal fade bd-example-modal-xl" role="dialog">
      <div class="modal-dialog modal-xl">
         <div class="table-responsive">
            <!-- Contenido del modal -->
            <div class="modal-content">
               <div class="modal-header bg-blue">
                  <H3>Ingresar nueva cotizacion</H3>
                  <button type="button" class="close-white" data-dismiss="modal">&times;</button>
               </div>
               <form id="form-subir-cotizaciones" style="padding:0px 15px;" class="form-horizontal" role="form" action="<?php echo base_url();?>Cotizacion/subirCotizaciones" method="POST">
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="recipient-tipo" class="col-form-label">Numero Cotizacion </label>
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="nrocotizacion" name="nrocotizacion"/>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="recipient-tipo" class="col-form-label">Fecha </label>
                              <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" id="fecha" name="fecha"/>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label class="col-form-label">Proveedor </label>
                              <select name="proveedor" id="proveedor" style="width: 100%; height: 60%">
                              <?php
                                 foreach($lista_proveedores as $i){
                                   echo '<option value="'. $i->id_proveedor.'">'. $i->nombre .'</option>';
                                 }
                                 
                                 ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                           <div class="form-group">
                              <label for="pic_file">Archivo (Respaldo)</label>
                              <div class="form-group">
                                 <input type="file" name="pic_file" class="form-control-file" id="pic_file">
                              </div>
                           </div>
                           <div class="form-check">
                              <label class="form-check-label" for="exampleCheck1">Formatos admitidos: pdf, docx, jpg, pptx, xlsx.</label>
                           </div>
                        </div>
                     </div>
                     <hr class="cell-divide-hr">
                     <a class="btn btn-app" data-toggle="modal" data-target="#modal-nuevo-producto">
                     <i class="fas fa-plus" id="nuevo-producto">
                     </i> Nuevo producto
                     </a>
                     <div class="card-body" id="dynamic_field" >
                        <table class="table table-bordered" id="tablaproductos">
                           <tr>
                              <!-- 0 ---> 
                              <th><label for="recipient-bodega" class="col-form-label">Producto </label></th>
                              <!-- 1 --->
                              <th><label for="recipient-bodega" class="col-form-label">Añadir </label></th>
                              <!-- 5 --->
                           </tr>
                           <TR>
                              <TD>
                                 <div class="form-group">
                                    <select name="material" id="material" style="width: 100%; height: 60%">
                                    <?php
                                       foreach($lista_materiales as $i){
                                          echo '<option value="'.$i->id_material.','.$i->nombre.','.$i->valor.'">'. $i->nombre .'</option>';
                                          }
                                          ?>
                                    </select>
                                 </div>
                              </TD>
                              <TD>
                                 <div class="form-group">
                                    <button type="button" name="add" class="btn btn-success"  id="añadir-orden">+</button>
                                 </div>
                              </TD>
                           </TR>
                        </table>
                        <hr class="cell-divide-hr">
                        <div class="button-wrapper">
                        </div>
                     </div>
                     <hr class="cell-divide-hr">
                     <div class="card-body">
                        <section class="content">
                           <div class="box box-info ">
                              <div class="box-body">
                                 <div class="table-responsive">
                                    <table id="productos_orden" name="productos_orden" class="table table-bordered table-striped tableprod" style="width: 100%;">
                                       <thead>
                                          <tr>
                                             <th>Codigo</th>
                                             <!-- 0 ---> 
                                             <th>Producto</th>
                                             <!-- 1 --->
                                             <th>Cantidad</th>
                                             <!-- 2 --->
                                             <th>Costo</th>
                                             <th>IVA %</th>
                                             <th>Importe</th>
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
               </form>
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
   <!-- Archivos -->
   <div class="modal fade" id="modal-archivos">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <div align="center"><img src=""></div>
               </br>
               <h4 class="modal-title">Documento</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="card card-info">
               <div class="card-body p-0">
                  <div class="modal-body" id="descargar-documento">
                  </div>
                  <!-- /.card-body -->
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
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
       "ajax":{url:"<?php echo base_url('Cotizacion/obtenerCotizaciones'); ?>",
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
<script type="text/javascript">
   //mostrar centrocostos
   $(document).ready(function(){
     $('#proveedor').select2({
       theme: "bootstrap"
     });
   });

   $(document).ready(function(){
     $('#material').select2({
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
<script src="<?php echo base_url();?>assets/js/Administracion/cotizaciones.js"></script>