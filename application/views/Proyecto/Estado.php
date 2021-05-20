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
               <h1 class="m-0 text-dark">Estado de Proyecto</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Estado de proyecto</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <!-- /.container-fluid -->
   </div>
   <section class="content">
      <div class="box box-info ">
         <div class="box-body">
            <div class="table-responsive">
               <table id="example1" name="example1" class="table table-bordered table-striped" style="width: 100%;">
                  <thead>
                     <tr>
                        <!-- 0 ---> 
                        <th style="width: 3%;background-color: #006699; color: white;">Nombre Proyecto</th>
                        <!-- 1 --->
                        <th style="width: 3%;background-color: #006699; color: white;">Administrador</th>
                        <!-- 2 --->
                        <th style="width: 3%;background-color: #006699; color: white;">Fecha inicio</th>
                        <!-- 3 --->
                        <th style="width: 3%;background-color: #006699; color: white;">Fecha termino</th>
                        <!-- 4 --->
                        <th style="width: 3%;background-color: #006699; color: white;">Estado de avance</th>
                        <!-- 5 --->
                        <th style="width: 3%;background-color: #006699; color: white;">Ver documentos</th>
                        <!-- 6 --->
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
<!-- Modal -->
<div class="modal fade" id="myModalVerMas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
               <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3">
                     <h3 class="card-title">Detalle proyecto</h3>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Archivos</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Imagenes</a>
                  </li>
               </ul>
            </div>
            <div class="tab-content" id="custom-tabs-two-tabContent">
               <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                  <div class="card-header">
                     <div class="col-md-12">
                        <div class="card card-primary card-outline">
                           <div class="card-body p-0">
                              <div class="card-header" id="data-table">
                                 <table id="estado_proyecto" class="table table-bordered table-striped" style="width: 100%;">
                                    <thead>
                                       <tr>
                                          <th style="width: 3%;background-color: #006699; color: white;"></th>
                                          <th style="width: 3%;background-color: #006699; color: white;">Nombre</th>
                                          <th style="width: 3%;background-color: #006699; color: white;">Monto</th>
                                          <th style="width: 3%;background-color: #006699; color: white;">Detalle</th>
                                          <th style="width: 3%;background-color: #006699; color: white;">Accion</th>
                                       </tr>
                                    </thead>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                     <form method="post" action="<?php echo base_url(); ?>Proyecto/descargarArchivos">
                        <input type="hidden" class="form-control" id="tipo-descarga" name="tipo-descarga">
                        <div class="card-header">
                           <div class="col-md-12">
                              <div class="card card-primary card-outline">
                                 <div class="card-body p-0">
                                    <div class="mailbox-controls">
                                       <!---
                                          <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button>
                                          ---->
                                       <div class="btn-group">
                                          <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-confirmacion-descarga" onclick="descargarArchivos()"><i class="fa fa-download"></i></button>
                                       </div>
                                       <!---
                                          <div class="float-right">
                                             1-50/200
                                             <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                                             </div>
                                          </div>
                                          --->
                                    </div>
                                    <div class="table-responsive" id="tabla-fotos">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div id="modal-confirmacion-descarga" class="modal fade bd-example-modal-sm" role="dialog">
                           <div class="modal-dialog modal-sm">
                              <!-- Contenido del modal -->
                              <div class="modal-content">
                                 <div class="modal-header bg-blue">
                                    <H3>Confirmación</H3>
                                    <button type="button" class="close-white" data-dismiss="modal">&times;</button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="modal-body">
                                       <p>Estás seguro que deseas descargar estos archivos?</p>
                                    </div>
                                 </div>
                                 <div class="modal-footer bg-white">
                                    <input type="submit" class="btn btn-primary" value="Si">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</section>
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
       "ajax":{url:"<?php echo base_url('Proyecto/fetch_data'); ?>",
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
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
      $('#estado_proyecto').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Proyecto/ObtenerArchivosEstadoProyecto/'); ?>" + 0,
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2,3,4],
             className: 'select-checkbox',
            targets:   0
         }
       ],
      select: {
         style:    'os',
         selector: 'td:first-child'
      },
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
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url()?>assets/js/PlanillaProyecto/estado_proyecto.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>