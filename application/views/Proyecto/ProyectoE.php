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
                  <li class="breadcrumb-item active">Proyectos</li>
                  <li class="breadcrumb-item active">Proyectos ejecutados</li>
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
                        <th style="width: 3%;background-color: #006699; color: white;">Fecha inicio</th>
                        <!-- 3 --->
                        <th style="width: 3%;background-color: #006699; color: white;">Fecha termino</th>
                        <!-- 4 --->
                        <th style="width: 3%;background-color: #006699; color: white;">Estado</th>
                        <!-- 4 --->
                        <th style="width: 3%;background-color: #006699; color: white;">Accion</th>
                        <!-- 6 --->
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </section>
</div>
<div class="modal fade" id="detalleDocumentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
               <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3">
                     <h3 class="card-title">Detalle</h3>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Documentos subidos</a>
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
                                 <table id="tabla_archivos" class="table table-bordered table-striped" style="width: 100%;">
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
            </div>
         </div>
      </div>
   </div>
</div>

<!-- MODAL ESTADO ORDEN DE PROYECTO --->
<div id="modal-estado-proyecto" class="modal fade bd-example-modal-sm" role="dialog">
      <div class="modal-dialog modal-sm">
         <div class="table-responsive">
            <!-- Contenido del modal -->
            <div class="modal-content">
               <div class="modal-header bg-blue">
                  <H3>Estado de proyecto</H3>
                  <button type="button" class="close-white" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="card-body" id="dynamic_field" >
                     <div class="box-body">
                     <H6>Seleccione para cambiar el estado del proyecto</H6>
                        <div class="modal-body" id="estado-proyecto">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>  
</html> 
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#example1').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Proyecto/fetch_ProyectoEjecutados'); ?>",
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
<!-- ESTE PARA LAS ALERTAS --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url();?>assets/js/EvaluacionProyecto/proyectos.js"></script>