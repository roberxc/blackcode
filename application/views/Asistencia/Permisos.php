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
   <!-- PDF Y EXCEL -->
</head>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Permisos</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item active">Registro</li>
                  <li class="breadcrumb-item active">Permisos</li>
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
      <div class="card card-default">
         <div class="card-header">
            <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
         </div>
         <!-- /.card-header -->
         <form id="form-registro-permiso" style="padding:0px 15px;" class="form-horizontal" role="form" action="<?php echo base_url();?>Permisos/registrarPermiso" method="POST">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-3">
                     <!-- /.form-group -->
                     <div class="form-group">
                        <label>Rut</label>
                        <div class="form-group">
                           <select name="rutpersonal" id="rutpersonal" style="width: 100%; height: 60%">
                           <option value="" selected>Seleccione</option>
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
                        <label>Tipo permiso</label>
                        <select name="tipopermiso" id="tipopermiso" style="width: 100%; height: 60%">
                        <option value="" selected>Seleccione</option>
                        <?php
                           foreach($lista_permisos as $i){
                              echo '<option value="'.$i->id_tipopermiso.'">'. $i->nombre .'</option>';
                              }
                              ?>
                        </select>
                     </div>
                     <!-- /.form-group -->
                  </div>
                  <div class="col-md-3">
                     <!-- /.form-group -->
                     <div class="form-group">
                        <label>Fecha</label>
                        <input type="text" id="fecha_permiso" name="fecha_permiso" class="form-control">
                     </div>
                     <!-- /.form-group -->
                  </div>
                  <div class="col-md-2">
                     <!-- /.form-group -->
                     <div class="form-group">
                        <label class="invisible">Guardar</label>
                        <button type="submit" class="btn btn-block btn-primary">Guardar</button>
                     </div>
                     <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
               </div>
               <div class="row">
                  <div class="col-md-5">
                     <div class="form-group">
                        <label>Detalle</label>
                           <div class="form-group">
                              <textarea type="text" class="form-control" placeholder="Ingrese" id="detalle" name="detalle"></textarea>
                           </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <!-- /.form-group -->
                     <div class="form-group">
                        <label for="pic_file_update">Archivo</label>
                        <div class="form-group">
                           <input type="file" name="pic_file" class="form-control-file" id="pic_file">
                        </div>
                     </div>
                     <div class="form-check">
                        <label class="form-check-label" for="exampleCheck1">Formatos admitidos: pdf,docx,jpg,pptx,xlsx.</label>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
   <!-- Default box -->
   <div class="card-header">
      <div class="card card-default">
         <section class="content">
            <div class="card-body">
               <div class="table-responsive">
                  <table id="example1" name="example1" class="table table-bordered table-striped" style="width: 100%;">
                     <thead>
                        <tr>
                           <th style="width: 3%;background-color: #006699; color: white;">Rut</th>
                           <th style="width: 3%;background-color: #006699; color: white;">Nombre</th>
                           <!-- 0 ---> 
                           <th style="width: 3%;background-color: #006699; color: white;">Permiso</th>
                           <!-- 1 --->
                           <th style="width: 3%;background-color: #006699; color: white;">Fecha inicio</th>
                           <!-- 2 --->
                           <th style="width: 3%;background-color: #006699; color: white;">Fecha termino</th>
                        </tr>
                     </thead>
                  </table>
               </div>
            </div>
            <!-- /.card-body -->
         </section>
      </div>
   </div>
</div>
</body>
</html>
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
      $('#fecha_permiso').daterangepicker({
      "locale": {
            "format": "DD/MM/YYYY",
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
<script src="<?php echo base_url();?>assets/js/Asistencia/permisos.js"></script>
<script>
   //Mostrar tabla principal
   $(document).ready(function(){
     $('#example1').DataTable({
       "language": {
         "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
         },
       "processing": true,
       "serverSide": true, 
       "ajax":{url:"<?php echo base_url('Permisos/obtenerPermisos'); ?>",
       type: "POST"
     },
       "columnDefs":[
         {
             "targets": [1,2,3,4],
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

   $(document).ready(function(){
     $('#tipopermiso').select2({
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