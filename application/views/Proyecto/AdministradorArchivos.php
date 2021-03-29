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
   <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
</head>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Administrador de archivos: <?php echo$id_proyecto; ?></h1>
               <input type="hidden" class="form-control" id="id_proyecto_dir" value="<?php echo$id_proyecto;?>"/>
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
            <div class="card card-primary card-outline">
               <div class="card-header">
                  <h3 class="card-title" id="directorio-archivos">Archivos</h3>
                  <?php echo !empty($statusMsg)?'<p class="status-msg">'.$statusMsg.'</p>':''; ?>
                  <div class="card-tools">
                     <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Buscador">
                        <div class="input-group-append">
                           <div class="btn btn-primary">
                              <i class="fas fa-search"></i>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-tools -->
               </div>
               <!-- /.card-header -->
               <div class="card-body p-0">
                  <div class="mailbox-controls">
                     <!-- Check all button -->
                     <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                     </button>
                     <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                     </div>
                     <!-- /.btn-group -->
                     <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                     <div class="float-right">
                        1-50/200
                        <div class="btn-group">
                           <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                           <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                        </div>
                        <!-- /.btn-group -->
                     </div>
                     <!-- /.float-right -->
                  </div>
                  <div class="table-responsive mailbox-messages" id="tabla-archivos">
                     
                  </div>
                  <!-- /.mail-box-messages -->
               </div>
               <!-- /.card-body -->
               <div class="card-footer p-0">
                  <div class="mailbox-controls">
                     <!-- Check all button -->
                     <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                     </button>
                     <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                     </div>
                     <!-- /.btn-group -->
                     <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                     <div class="float-right">
                        1-50/200
                        <div class="btn-group">
                           <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                           <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                        </div>
                        <!-- /.btn-group -->
                     </div>
                     <!-- /.float-right -->
                  </div>
               </div>
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
         <form method="post" action="<?php echo base_url();?>Proyecto/subirArchivos" enctype="multipart/form-data">
            <div class="modal-body">
               <input type="hidden" class="form-control" id="tipo-archivo" name="tipo-archivo">
               <input type="hidden" class="form-control" id="id_proyecto_dir" name="id_proyecto" value="<?php echo$id_proyecto;?>"/>
               <div class="form-group">
                  <label>Buscar archivos</label>
                  <input type="file" class="form-control" name="files[]" multiple/>
               </div>
               <div class="form-group">
                  <input class="form-control" type="submit" name="fileSubmit" value="Subir"/>
               </div>
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
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
</html>