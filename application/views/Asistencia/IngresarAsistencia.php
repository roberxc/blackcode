<!-- Content Wrapper. Contains page content -->
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
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <!-- /.content-header -->
   <!-- Main content -->
   <div class="col-12 col-sm-12">
      <div class="card card-primary card-tabs">
         <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
               <li class="pt-2 px-3">
                  <h3 class="card-title">Asistencia</h3>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Ingreso asistencia</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Reportes</a>
               </li>
            </ul>
         </div>
         <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
               <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                  <br>
                  <a class="btn btn-app"  data-toggle="modal" data-target="#modal-ingreso-asistencia">
                  <i class="fas fa-plus">
                  </i> Nuevo
                  </a>
                  <div class="card-body">
                     <div class="card">
                        <section class="content">
                           <div class="box box-info ">
                              <div class="box-body">
                                 <div class="table-responsive">
                                    <table id="example1" name="example1" class="table table-bordered table-striped" style="width: 100%;">
                                       <thead>
                                          <tr>
                                             <th></th>
                                             <th>Rut</th>
                                             <!-- 0 ---> 
                                             <th>Nombre</th>
                                             <!-- 1 --->
                                             <th>Fecha</th>
                                             <!-- 3 --->
                                             <th>Detalle</th>
                                             <!-- 4 --->
                                             <!--<th>Accion</th>
                                                5 --->
                                          </tr>
                                       </thead>
                                    </table>
                                 </div>
                              </div>
                           </div>
                     </div>
                  </div>
                  </section>
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
                                          <input type="text" class="form-control" placeholder="Ingrese" id="rut">
                                       </div>
                                       <div class="form-group">
                                          <label>Fecha</label>
                                          <input type="date" class="form-control" placeholder="Ingrese" id="fecha" format="d/m/y">
                                       </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Nombre completo</label>
                                          <input type="text" class="form-control" placeholder="Ingrese" id="nombrecompleto">
                                       </div>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 </br>
                                 <hr class="mt-2 mb-3"/>
                                 <h5>Jornada mañana</h5>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Hora de entrada</label>
                                          <input type="time" class="form-control" placeholder="Ingrese" value="08:30" id="hora_llegadam">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Hora de salida</label>
                                          <input type="time" class="form-control" placeholder="Ingrese" value="14:00" id="hora_salidam">
                                       </div>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 </br>
                                 <hr class="mt-2 mb-3"/>
                                 <h5>Jornada tarde</h5>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Hora de entrada</label>
                                          <input type="time" class="form-control" placeholder="Ingrese" value="15:00" id="hora_llegadat">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>Hora de salida</label>
                                          <input type="time" class="form-control" placeholder="Ingrese" value="18:30" id="hora_salidat">
                                       </div>
                                    </div>
                                 </div>
                                 </br>
                                 <hr class="mt-2 mb-3"/>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="card card-primary">
                                          <div class="card-header">
                                             <h3 class="card-title">Horas extras</h3>
                                          </div>
                                          <div class="card-body">
                                          <input type="text" value="0">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="card card-primary">
                                          <div class="card-header">
                                             <h3 class="card-title">Asistente</h3>
                                          </div>
                                          <div class="card-body">
                                          <input type="checkbox" id="estado_asistencia" checked data-toggle="toggle" data-on="Si" data-off="No" data-onstyle="success" data-offstyle="danger">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                              <button type="button" class="btn btn-primary" id="guardar-asistencia">Guardar</button>
                           </div>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>


                  <div class="modal fade" id="modal-detalle-asistencia">
                     <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                           <div class="modal-header">
                              <div align="center"><img src=""></div>
                              </br>
                              <h4 class="modal-title">Detalle asistencia</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="card card-default">
                              <!-- /.card-header -->
                              <div class="card-body" id="asistencia-completa">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="card card-primary">
                                          <div class="card-header">
                                             <h3 class="card-title">Horas extras</h3>
                                          </div>
                                          <div class="card-body">
                                          <input type="text" value="0">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                           </div>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>

               </div>
               <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
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
                                    <label class="invisible">Graficar</label>
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
                  <div class="container">
                     <div class="row">
                        <div class="col-6">
                           <div class="card">
                              <div class="card-body">
                                 <div id="gh" align="center">
                                    <canvas id="myChart" width="100" height="100"></canvas>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /.card -->
      </div>
   </div>
</div>


   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js" integrity="sha512-zO8oeHCxetPn1Hd9PdDleg5Tw1bAaP0YmNvPY8CwcRyUk7d7/+nyElmFrB6f7vg4f7Fv4sui1mcep8RIEShczg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script>
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
<script src="<?php echo base_url();?>assets/js/Asistencia/asistencia.js"></script>
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#example1').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Asistencia/obtenerAsistencia'); ?>",
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2,3],
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
<!-- Bootstrap Switch -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</body>
</html>