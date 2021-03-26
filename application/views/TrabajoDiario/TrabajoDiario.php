<!-- Content Wrapper. Contains page content -->
<head>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <!-- DataTables -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet"/>
   <style>
      .foo { color: #808080; text-size: smaller; }
   </style>
</head>
<div class="content-wrapper">
   <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
         <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="pt-2 px-3">
               <h3 class="card-title">Trabajos diarios</h3>
            </li>
            <li class="nav-item">
               <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Registros</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Reportes</a>
            </li>
         </ul>
      </div>
      <div class="tab-content" id="custom-tabs-two-tabContent">
         <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Trabajos diarios</h1>
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
               <!-- /.container-fluid -->
            </div>
            <div class="card-header">
               <div class="card">
                  <div class="card-body p-0">
                     <table id="trabajos_diarios" name="trabajos_diarios" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                           <tr>
                              <th style="width: 3%;background-color: #006699; color: white;">Codigo servicio</th>
                              <th style="width: 3%;background-color: #006699; color: white;">Fecha</th>
                              <th style="width: 3%;background-color: #006699; color: white;">Proyecto/Cliente</th>
                              <th style="width: 3%;background-color: #006699; color: white;">Persona a cargo</th>
                              <th style="width: 3%;background-color: #006699; color: white;">Accion</th>
                           </tr>
                        </thead>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
         </div>
         <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Reportes</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                           <li class="breadcrumb-item active">Trabajos diarios</li>
                           <li class="breadcrumb-item active">Reportes</li>
                        </ol>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
               <!-- /.container-fluid -->
            </div>
            <div class="card-header">
               <!-- SELECT2 EXAMPLE -->
               <div class="card card-default">
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Filtrado</h3>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                           </button>
                           <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">
                        <div class="row">
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="recipient-bodega" class="col-form-label">Fecha </label>
                                 <div class="form-group">
                                 <input type="text" id="date_reporte" name="date_reporte" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Rut personal</label>
                                 <select class="form-control select2" style="width: 100%;" id="rut_personal_reporte">
                                   <option selected="selected" data-foo="">Seleccione</option>
                                    <?php foreach($lista_personal as $i){
                                       echo'<option data-foo="'.$i->rut.'" value='.$i->rut.'>'.$i->nombrecompleto.'</option>';
                                     }?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <!-- /.form-group -->
                              <div class="form-group">
                                 <label class="invisible">Graficar</label>
                                 <button type="button" class="btn btn-block btn-primary" onclick="obtenerHorasExtrasReporte()">Actualizar</button>
                              </div>
                           </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                     </div>
                  </div>
               </div>
               <div class="card card-success">
                  <div class="card-header">
                     <h3 class="card-title">Total horas extras</h3>
                  </div>
                  <div class="modal-body" id="horas-extras-reportes">
                  
                  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
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
               <input type="hidden" id="rut_filtro" class="form-control">
               <input type="hidden" id="codigoservicio" class="form-control">
               <input type="hidden" id="fechatrabajo" class="form-control">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#trabajos_diarios').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Operacion/obtenerTrabajosDiarios');?>",
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2],
         }
       ]
     });
   
     $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
   });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?php echo base_url();?>assets/js/sweetAlert.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js" integrity="sha512-W76C8qrNYavcaycIH9EijxRuswoS+LCqA1+hq+ECrmjzAbe/SHhTgrwA1uc84husS/Gz50mxOEHPzrcd3sxBqQ==" crossorigin="anonymous"></script>
<script type="text/javascript">
   var today = new Date();
   var dd = String(today.getDate()).padStart(2, '0');
   var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
   var yyyy = today.getFullYear();
   var date = yyyy+mm+dd;
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
     "startDate": date,
     "opens": "center"
   });
   });
</script>

<script type="text/javascript">
   var today = new Date();
   var dd = String(today.getDate()).padStart(2, '0');
   var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
   var yyyy = today.getFullYear();
   var date = yyyy+mm+dd;
   $(function () {
   $('#date_reporte').daterangepicker({
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
     "startDate": date,
     "opens": "center"
   });
   });
</script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
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