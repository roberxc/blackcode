<head>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
   <link rel="stylesheet" href="<?php echo base_url()?>assets/js/PlanillaProyecto/barra_subida.css">
</head>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h5>Administrador de archivos del proyecto: <?php echo$nombre_proyecto[0]['nombreproyecto']; ?></h5>
               
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Proyectos</li>
                  <li class="breadcrumb-item active">Administrador de archivos</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-md-3">
            <a class="btn btn-primary btn-block mb-3" id="click-modal-archivos">Subir archivo</a>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Licitaciones</h3>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                     </button>
                  </div>
               </div>
               <div class="card-body p-0">
                  <ul class="nav nav-pills flex-column">
                     <li class="nav-item active">
                        <a href="#" class="nav-link" id="antecedentes-tecnicos">
                        <i class="fa fa-folder"></i> Antecedentes tecnicos
                        <span class="badge bg-primary float-right">12</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link" id="propuestas-tecnicas">
                        <i class="fa fa-folder"></i> Propuestas tecnicas
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link" id="fotos">
                        <i class="fa fa-folder"></i> Fotos
                        </a>
                     </li>
                  </ul>
               </div>
               <!-- /.card-body -->
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Cotizaciones</h3>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                     </button>
                  </div>
               </div>
               <div class="card-body p-0">
                  <ul class="nav nav-pills flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        <i class="fa fa-folder"></i> Clientes <i class="fas fa-plus"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="#" class="nav-link" id="cotizaciones-clientes">
                              <i class="far fa-circle nav-icon"></i> Cotizaciones
                              </a>
                           </li>
                        </ul>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="#" class="nav-link" id="evaluacion-proyecto">
                              <i class="far fa-circle nav-icon"></i> Evaluacion de proyecto
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        <i class="fa fa-folder"></i> Proveedores <i class="fas fa-plus"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="#" class="nav-link" id="cotizaciones-proveedores">
                              <i class="far fa-circle nav-icon"></i> Cotizaciones
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link" id="documentos-tecnicos">
                        <i class="fa fa-folder"></i> Documentos tecnicos
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link" id="planos">
                        <i class="fa fa-folder"></i> Planos
                        <span class="badge bg-warning float-right">65</span>
                        </a>
                     </li>
                  </ul>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Labels</h3>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                     </button>
                  </div>
               </div>
               <div class="card-body p-0">
                  <ul class="nav nav-pills flex-column">
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle text-danger"></i>
                        Important
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle text-warning"></i> Promotions
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle text-primary"></i>
                        Social
                        </a>
                     </li>
                  </ul>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col ------------------------------------------>
         <div class="col-md-9">
         <form method="post" action="<?php echo base_url(); ?>Proyecto/descargarArchivos">
         <input type="hidden" class="form-control" id="tipo-descarga" name="tipo-descarga">
         <input type="hidden" class="form-control" id="id_proyecto_dir" name="id_proyecto_dir" value="<?php echo$id_proyecto;?>"/>
            <div class="card card-primary card-outline">
               <div class="card-header">
               <input type="hidden" class="form-control" id="cdirectorio-archivos" name="cdirectorio-archivos">
                  <h3 class="card-title" id="directorio-archivos">Archivos</h3>
                  <?php echo !empty($statusMsg)?'<p class="status-msg">'.$statusMsg.'</p>':''; ?>
                  <!--
                     <div class="card-tools">
                        <div class="input-group input-group-sm">
                           <input type="text" class="form-control" id="filtro_nombre" placeholder="Buscador" onkeyup="buscarArchivos()">
                           <div class="input-group-append">
                              <div class="btn btn-primary">
                                 <i class="fas fa-search"></i>
                              </div>
                           </div>
                        </div>
                     </div>
                     -->
               </div>
               
                  <div class="card-body p-0">
                     <div class="mailbox-controls">
                        <!---
                           <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button>
                           ---->
                        <div class="btn-group">
                           <button type="submit" class="btn btn-default btn-sm" onclick="eliminarArchivos()"><i class="far fa-trash-alt"></i></button>
                           <button type="submit" class="btn btn-default btn-sm" onclick="descargarArchivos()"><i class="fa fa-download"></i></button>
                        </div>
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
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
                     <div class="table-responsive mailbox-messages" id="tabla-fotos">
                     </div>
                     <div class="card-header" id="data-table">
                        <table id="administrador_archivos" class="table table-bordered table-striped" style="width: 100%;">
                           <thead>
                              <tr>
                                 <th style="width: 3%;background-color: #006699; color: white;"></th>
                                 <th style="width: 3%;background-color: #006699; color: white;">Nombre</th>
                                 <th style="width: 3%;background-color: #006699; color: white;">Fecha</th>
                                 <th style="width: 3%;background-color: #006699; color: white;">Directorio</th>
                              </tr>
                           </thead>
                        </table>
                     </div>
                  </div>
               </form>
               <!--                  
                  <div class="card-footer p-0">
                     <div class="mailbox-controls">
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                        </button>
                        <div class="btn-group">
                           <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                        </div>
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                        <div class="float-right">
                           1-50/200
                           <div class="btn-group">
                              <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                              <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                           </div>
                        </div>
                     </div>
                  </div>
                  --->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
</div>
<div id="modal-archivos" class="modal fade bd-example-modal-lg" role="dialog">
   <div class="modal-dialog modal-lg">
      <!-- Contenido del modal -->
      <div class="modal-content">
         <div class="modal-header bg-blue">
            <h3 class="card-title" id="directorio-archivos-modal"></h3>
            <button type="button" class="close-white" data-dismiss="modal">&times;</button>
         </div>
         <form  name="FormArchivos" method="post" id="FormArchivos" action="<?php echo base_url();?>Proyecto/subirArchivos" enctype="multipart/form-data">
            <div class="modal-body">
               <input type="hidden" class="form-control" id="tipo-archivo" name="tipo-archivo">
               <input type="hidden" class="form-control" id="id_proyecto_dir" name="id_proyecto_dir" value="<?php echo$id_proyecto;?>"/>
               <div class="form-group">
                  <label>Buscar archivos</label>
                  <input type="file" class="form-control" name="files[]" multiple/>
               </div>
               <div class="form-group">
                  <input class="form-control" type="submit" name="fileSubmit" value="Subir" onclick="subirArchivos();"/>
               </div>
               <div id="progress-div">
                  <div id="progress-bar"></div>
               </div>
               <div id="loader-icon" style="display:none;"><img src="<?php echo base_url()?>assets/Imagen/LoaderIcon.gif" /></div>
            </div>
            <div class="modal-footer bg-white">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
         </form>
      </div>
   </div>
</div>
</body>
<!-- ESTE PARA LAS ALERTAS --->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<!-- Data table -->
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url()?>assets/js/PlanillaProyecto/administrador_archivos.js"></script>
<!-- Ekko Lightbox -->
<script src="<?php echo base_url()?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Filterizr-->
<script src="<?php echo base_url()?>assets/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Page specific script -->
<script>
   $(function () {
     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
       event.preventDefault();
       $(this).ekkoLightbox({
         alwaysShowClose: true
       });
     });
   
     $('.filter-container').filterizr({gutterPixels: 3});
     $('.btn[data-filter]').on('click', function() {
       $('.btn[data-filter]').removeClass('active');
       $(this).addClass('active');
     });
   });
</script>
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
      $('#administrador_archivos').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Proyecto/ObtenerArchivos/'); ?>" + 0,0,
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2,3],
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
</html>