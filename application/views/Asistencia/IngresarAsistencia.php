<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ingreso de asistencia</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Inicio</a></li>
               <li class="breadcrumb-item active">Asistencia</li>
               <li class="breadcrumb-item active">Ingresar asistencia</li>
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
                  <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-ingreso-asistencia">Nuevo</button>
               </div>
               <!-- /.form-group -->
            </div>
         </div>
         <div class="row">
            <div class="col-md-3">
               <!-- /.form-group -->
               <div class="form-group">
                  <label>Rut</label>
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
<!-- Default box -->
<section class="content">
   <div class="card">
      <div class="card-body p-0">
         <table class="table table-striped projects" id="tabla_trabajosrealizados">
            <thead>
               <tr>
                  <th style="width: 15%">
                     Rut
                  </th>
                  <th style="width: 20%">
                     Nombre
                  </th>
                  <th style="width: 15%">
                     Fecha
                  </th>
                  <th style="width: 20%">
                     Hora de entrada
                  </th>
                  <th style="width: 20%">
                     Hora de salida
                  </th>
                  <th style="width: 20%">
                     Opciones
                  </th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>
                     <input type="text" value="" class="form-control name-file" disabled/>
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                  <td class="project-actions text-right">
                     </button>
                     <button class="btn btn-info btn-sm" id="detalle_archivos" data-toggle="modal" data-target="#modal-archivos">
                     <i class="fas fa-edit">
                     </i>
                     </button>
                     <button class="btn btn-info btn-sm" id="detalle_asistencia" data-toggle="modal"data-target="#modal-asistencia">
                     <i class="fas fa-trash">
                     </i>
                     </button>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <!-- /.card-body -->
   </div>
   <!-- /.card -->
   <!-- /.container-fluid -->
</section>
<!-- Asistencia -->
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
<div class="modal fade" id="modal-ingreso-asistencia">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <div align="center"><img src=""></div>
            </br>
            <h4 class="modal-title">Ingreso asistencia</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Rut</label>
                        <input type="text" class="form-control" placeholder="Ingrese">
                     </div>
                     <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" class="form-control" placeholder="Ingrese" format="d/m/y">
                     </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese">
                     </div>
                  </div>
                  <!-- /.col -->
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Hora de entrada</label>
                        <input type="time" class="form-control" placeholder="Ingrese">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Hora de salida</label>
                        <input type="time" class="form-control" placeholder="Ingrese">
                     </div>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
               <!-- /.row -->
            </div>
            <!-- /.card-body -->
            
         </div>
         <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
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
   <!-- Horas extras -->
</div>
<div class="modal fade" id="modal-horasextras">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <div align="center"><img src=""></div>
            </br>
            <h4 class="modal-title">Horas extras</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="card card-info">
            <div class="card-body p-0">
               <div class="col-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-4">
                              <!-- /.form-group -->
                              <div class="form-group">
                                 <label>Fecha</label>
                                 <input type="text" id="date_range" name="date_range" class="form-control">
                                 <!-- /.form-group -->
                              </div>
                           </div>
                           <div class="col-md-3">
                              <!-- /.form-group -->
                              <div class="form-group">
                                 <label class="invisible">Filtrar</label>
                                 <button type="button" class="btn btn-block btn-primary" id="boton-filtrohorasextras">Filtrar</button>
                              </div>
                              <!-- /.form-group -->
                           </div>
                           <!-- /.col -->
                        </div>
                     </div>
                  </div>
               </div>
               <input type="hidden" id="rut_filtro" class="form-control"s>
               <div class="modal-body" id="horas-extras">
               </div>
               <!-- /.card-body -->
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
   </div>
   <!-- /.modal-dialog -->
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js" integrity="sha512-W76C8qrNYavcaycIH9EijxRuswoS+LCqA1+hq+ECrmjzAbe/SHhTgrwA1uc84husS/Gz50mxOEHPzrcd3sxBqQ==" crossorigin="anonymous"></script>
<script type="text/javascript">
   $(function () {
   $('#date_range').daterangepicker({
     "locale": {
         "format": "YYYY-MM-DD",
         "separator": " - ",
         "applyLabel": "Guardar",
         "cancelLabel": "Cancelar",
         "fromLabel": "Desde",
         "toLabel": "Hasta",
         "customRangeLabel": "Personalizar",
         "daysOfWeek": [
             "Do",
             "Lu",
             "Ma",
             "Mi",
             "Ju",
             "Vi",
             "Sa"
         ],
         "monthNames": [
             "Enero",
             "Febrero",
             "Marzo",
             "Abril",
             "Mayo",
             "Junio",
             "Julio",
             "Agosto",
             "Setiembre",
             "Octubre",
             "Noviembre",
             "Diciembre"
         ],
         "firstDay": 1
     },
     "startDate": "2020-11-01",
     "endDate": "2020-11-30",
     "opens": "center"
   });
   });
</script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="<?php echo base_url()?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>var base_url = '<?php echo base_url();?>';</script>
</body>
</html>