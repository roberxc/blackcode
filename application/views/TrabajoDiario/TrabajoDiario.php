<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Trabajos realizados</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Trabajos Diarios</li>
                  <li class="breadcrumb-item active">Trabajos Realizados</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
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
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Codigo servicio</label>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ingrese" id="codigoservicio_filtro" format="y-m-d">
                     </div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Fecha</label>
                        <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" id="fecha_filtro"/>
                     
                  </div>
                  <!-- /.form-group -->
               </div>
               <div class="col-md-2">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label class="invisible">Listar</label>
                     <button type="button" class="btn btn-block btn-primary" id="listar_trabajosrealizados">Listar</button>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
         </div>
      </div>
   </div>
   <!-- Default box -->
   <section class="content">
      <div class="card">
         <div class="card-body p-0">
            <table class="table table-striped projects" id="tabla_trabajosrealizados">
               <thead>
                  <tr>
                     <th style="width: 15%">
                        Codigo Servicio
                     </th>
                     <th style="width: 20%">
                        Fecha
                     </th>
                     <th style="width: 20%">
                        Proyecto/Cliente
                     </th>
                     <th style="width: 20%">
                        Persona a cargo
                     </th>
                     <th style="width: 20%">
                        Opciones
                     </th>
                  </tr>
               </thead>
               <tbody>
               <?php 
                     if($trabajos_realizados){
                        foreach($trabajos_realizados as $row){
                  ?>
                  <tr>
                     <td>
                        <input type="text" value="<?php echo $row->CodigoServicio?>" class="form-control name-file" disabled/>
                     </td>
                     <td>
                        <?php echo $row->FechaTrabajo?>
                     </td>
                     <td>
                        <?php echo $row->NombreProyecto?>
                     </td>
                     <td>
                        <?php echo $row->PersonalCargo?>
                     </td>
                     <td class="project-actions text-right">
                        <button class="btn btn-primary btn-sm" id="detalle_trabajo" data-toggle="modal" data-target="#modal-detalle">
                        <i class="far fa-eye">
                        </i>
                        </button>
                        <button class="btn btn-info btn-sm" id="detalle_archivos" data-toggle="modal" data-target="#modal-archivos">
                        <i class="fas fa-upload">
                        </i>
                        </button>
                        <button class="btn btn-info btn-sm" id="detalle_asistencia" data-toggle="modal"data-target="#modal-asistencia">
                        <i class="fas fa-book-open">
                        </i>
                        </button>
                     </td>
                  </tr>
                  <?php }
                        }?>
               </tbody>
            </table>
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!-- /.container-fluid -->
   </section>
   <!-- Asistencia -->
   <!-- Asistencia -->
   <div class="modal fade" id="modal-asistencia">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Asistencia Personal</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body" id="asistencia-trabajo">
                  
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- Modal de detalle -->
   <div class="modal fade" id="modal-detalle">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <div align="center"><img src=""></div>
               </br>
               <h4 class="modal-title">Detalle de trabajo</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body" id="detalle-trabajo">
               
               <!--------------------------->
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.content -->
   <!-- Archivos -->
   <div class="modal fade" id="modal-archivos">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <div align="center"><img src=""></div>
               </br>
               <h4 class="modal-title">Archivos</h4>
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
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/operaciones.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/asistencia_tarde.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/asistencia_mañana.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/adjuntar_archivo.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/material_bodega.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/gastos_varios.js"></script>
<script>var base_url = '<?php echo base_url();?>';</script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/Administracion/trabajos_realizados.js"></script>
</body>
</html>