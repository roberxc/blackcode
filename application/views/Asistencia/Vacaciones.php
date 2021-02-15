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
                  <h3 class="card-title">Vacaciones</h3>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Ingreso vacaciones</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Registros</a>
               </li>
            </ul>
         </div>
         <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
               <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                  <br>
                  <div class="card-body">
                  <form id="form-descargar-detalle-vacaciones" role="form" action="Vacaciones/descargarDetalle" method="POST">
                     <div class="row">
                        <div class="col-md-3">
                           <!-- /.form-group -->
                           <div class="form-group">
                              <label>Rut</label>
                              <div class="form-group">
                                 <select name="rutpersonal" id="rutpersonal" style="width: 100%; height: 60%">
                                 <?php
                                    foreach($lista_personal as $i){
                                       echo '<option value="'.$i->id_personal.'">'. $i->rut .'</option>';
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                           <!-- /.form-group -->
                           <div class="form-group">
                              <label>Dias pedidos</label>
                              <input type="text" id="diaspedidos" name="diaspedidos" class="form-control">
                           </div>
                           <!-- /.form-group -->
                        </div>
                        <div class="col-md-2">
                           <!-- /.form-group -->
                           <div class="form-group">
                              <label class="invisible">Actualizar</label>
                              <button type="button" id="boton-filtrodetallevacaciones" class="btn btn-block btn-primary">Actualizar</button>
                           </div>
                        </div>
                        <!-- /.col -->
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <!-- /.form-group -->
                           <div class="form-group">
                              <label>Fecha inicio trabajo</label>
                              <input type="date" id="fecha_iniciotrabajo" name="date_range" class="form-control">
                           </div>
                           <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                           <!-- /.form-group -->
                           <div class="form-group">
                              <label>Fecha solicitud</label>
                              <input type="date" id="fecha_terminotrabajo" name="fecha_termino" class="form-control">
                           </div>
                           <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                     </div>
                     <div class="card-body" id="detalle-vacaciones" name="detalle-vacaciones">
                     </div>
                  </div>
                  </form>
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
                  <div class="container">
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
                                          <th>Fecha inicio</th>
                                          <th>Fecha termino</th>
                                          <!-- 3 --->
                                          <th>Dias pedidos</th>
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
               </div>
            </div>
         </div>
         <!-- /.card -->
      </div>
   </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js" integrity="sha512-W76C8qrNYavcaycIH9EijxRuswoS+LCqA1+hq+ECrmjzAbe/SHhTgrwA1uc84husS/Gz50mxOEHPzrcd3sxBqQ==" crossorigin="anonymous"></script>
<script type="text/javascript">
   var today = new Date();
   var dd = String(today.getDate()).padStart(2, '0');
   var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
   var yyyy = today.getFullYear();
   var date = dd+mm+yyyy;
   $(function () {
      $('#date_range').daterangepicker({
      "locale": {
            "format": "DD-MM-YYYY",
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

   $(function () {
      $('#fecha_termino').daterangepicker({
      "locale": {
            "format": "DD-MM-YYYY",
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js" integrity="sha512-zO8oeHCxetPn1Hd9PdDleg5Tw1bAaP0YmNvPY8CwcRyUk7d7/+nyElmFrB6f7vg4f7Fv4sui1mcep8RIEShczg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script>
<script src="<?php echo base_url()?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url();?>assets/js/Asistencia/vacaciones.js"></script>
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#example1').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Vacaciones/obtenerVacaciones'); ?>",
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
<script type="text/javascript">
   //mostrar tipoproducto
   $(document).ready(function(){
     $('#rutpersonal').select2({
       theme: "bootstrap"
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