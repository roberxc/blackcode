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
                        <input type="text" class="form-control" placeholder="Ingrese">
                     </div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <div class="col-md-3">
                  <!-- /.form-group -->
                  <div class="form-group">
                     <label>Fecha</label>
                     <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                     </div>
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
            <table class="table table-striped projects">
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
                        <?php echo $row->CodigoServicio?>
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
                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal"
                           data-target="#modal-detalle">
                        <i class="far fa-eye">
                        </i>
                        </a>
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal"
                           data-target="#modal-archivos">
                        <i class="fas fa-upload">
                        </i>
                        </a>
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal"
                           data-target="#modal-asistencia">
                        <i class="fas fa-book-open">
                        </i>
                        </a>
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
            <div class="modal-body">
               <div class="table-responsive">
                     <table class="table table-bordered" id="tabla_personal_mañana">
                        <tr>
                           <td>
                              <label>Fecha Asistencia</label>
                           </td>
                           <td>
                              <label>Nombre Completo</label>
                           </td>
                           <td>
                              <label>Hora llegada</label>
                           </td>

                           <td>
                              <label>Hora salida</label>
                           </td>

                           <td>
                              <label>Horas trabajadas</label>
                           </td>

                           <td>
                              <label>Horas extras</label>
                           </td>
                        </tr>
                        <tbody>
                           <tr>
                              <td>
                                 19-11-2020
                              </td>
                              <td>
                                 Trabajador1
                              </td>
                              <td>
                                 07:40
                              </td>
                              <td>
                                 19:30
                              </td>
                              <td>
                                 9
                              </td>
                              <td>
                                 2
                              </td>
                           </tr>
                           <tr>
                           <td>
                                 21-11-2020
                              </td>
                              <td>
                                 Trabajador2
                              </td>
                              <td>
                                 08:40
                              </td>
                              <td>
                                 18:30
                              </td>
                              <td>
                                 9
                              </td>
                              <td>
                                 0
                              </td>
                           </tr>
                           <tr>
                           <td>
                                 20-11-2020
                              </td>
                              <td>
                                 Trabajador3
                              </td>
                              <td>
                                 08:30
                              </td>
                              <td>
                                 19:30
                              </td>
                              <td>
                                 9
                              </td>
                              <td>
                                 1
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
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
            <div class="modal-body">
               <div class="card card-default">
                  <div class="modal-body">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Detalle del Trabajo realizado</label>
                        <textarea class="form-control" rows="3" placeholder="Ejemplo detalle trabajo" disabled></textarea>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Suma asignada</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="$140.000" disabled>
                     </div>
                  </div>
               </div>
               <div class="card card-default">
                  <div class="table-responsive">
                     <div class="modal-header">
                        <h5>Gastos viaticos</h5>
                     </div>
                     <table class="table table-striped">
                        <!--Table head-->
                        <thead>
                           <tr>
                              <th>Desayuno</th>
                              <th>Almuerzo</th>
                              <th>Cena</th>
                              <th>Agua</th>
                              <th>Alojamiento</th>
                           </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                           <tr>
                              <th>$4.300</th>
                              <td>$24.300</td>
                              <td>$5.300</td>
                              <td>$8.300</td>
                              <td>$44.300</td>
                           </tr>
                        </tbody>
                        <!--Table body-->
                     </table>
                     <!--Table-->
                  </div>
               </div>
               <!--------------------------->
               <div class="card card-default">
                  <div class="table-responsive">
                     <div class="modal-header">
                        <h5>Materiales comprados durante el trabajo</h5>
                     </div>
                     <table class="table table-striped">
                        <!--Table head-->
                        <thead>
                           <tr>
                              <th>Material</th>
                              <th>Cantidad</th>
                              <th>Valor/Unidad</th>
                           </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                           <tr>
                              <th>Material1</th>
                              <td>10</td>
                              <td>400</td>
                           </tr>
                           <tr>
                              <th>Material2</th>
                              <td>50</td>
                              <td>500</td>
                           </tr>
                        </tbody>
                        <!--Table body-->
                     </table>
                     <!--Table-->
                  </div>
               </div>
               <!--------------------------->
               <div class="card card-default">
                  <div class="table-responsive">
                     <div class="modal-header">
                        <h5>Materiales comprados antes del trabajo</h5>
                     </div>
                     <table class="table table-striped">
                        <!--Table head-->
                        <thead>
                           <tr>
                              <th>Material</th>
                              <th>Cantidad</th>
                              <th>Valor/Unidad</th>
                           </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                           <tr>
                              <th>Material1</th>
                              <td>10</td>
                              <td>400</td>
                           </tr>
                           <tr>
                              <th>Material2</th>
                              <td>50</td>
                              <td>500</td>
                           </tr>
                        </tbody>
                        <!--Table body-->
                     </table>
                     <!--Table-->
                  </div>
               </div>
               <!--------------------------->
               <div class="card card-default">
                  <div class="table-responsive">
                     <div class="modal-header">
                        <h5>Materiales de bodega</h5>
                     </div>
                     <table class="table table-striped">
                        <!--Table head-->
                        <thead>
                           <tr>
                              <th>Material</th>
                              <th>Cantidad</th>
                           </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                           <tr>
                              <th>Material1</th>
                              <td>10</td>
                           </tr>
                           <tr>
                              <th>Material2</th>
                              <td>50</td>
                           </tr>
                        </tbody>
                        <!--Table body-->
                     </table>
                     <!--Table-->
                  </div>
               </div>
               <!--------------------------->
               <div class="card card-default">
                  <div class="table-responsive">
                     <div class="modal-header">
                        <h5>Combustible</h5>
                     </div>
                     <table class="table table-striped">
                        <!--Table head-->
                        <thead>
                           <tr>
                              <th>Tipo</th>
                              <th>Valor Total</th>
                           </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                           <tr>
                              <th>Petróleo</th>
                              <th>$56403</th>
                           </tr>
                        </tbody>
                        <!--Table body-->
                     </table>
                     <!--Table-->
                  </div>
               </div>
               <!--------------------------->
               <div class="card card-default">
                  <div class="table-responsive">
                     <div class="modal-header">
                        <h5>Gastos varios</h5>
                     </div>
                     <table class="table table-striped">
                        <!--Table head-->
                        <thead>
                           <tr>
                              <th>Nombre</th>
                              <th>Valor</th>
                           </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                           <tr>
                              <th>Gasto1</th>
                              <td>$3.000</td>
                           </tr>
                        </tbody>
                        <!--Table body-->
                     </table>
                     <!--Table-->
                  </div>
               </div>
               <!--------------------------->
               <div class="card card-default">
                  <div class="table-responsive">
                     <div class="modal-header">
                        <h5>Materiales comprados durante el trabajo</h5>
                     </div>
                     <table class="table table-striped">
                        <!--Table head-->
                        <thead>
                           <tr>
                              <th>Material</th>
                              <th>Cantidad</th>
                              <th>Valor/Unidad</th>
                           </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                           <tr>
                              <th>Material1</th>
                              <td>10</td>
                              <td>$3.000</td>
                           </tr>
                           <tr>
                              <th>Material2</th>
                              <td>10</td>
                              <td>$3.000</td>
                           </tr>
                        </tbody>
                        <!--Table body-->
                     </table>
                     <!--Table-->
                  </div>
               </div>
               <!--------------------------->
               <div class="card card-default">
                  <div class="modal-header">
                     <h5>Total</h5>
                  </div>
                  <!--Table-->
                  <div class="row">
                     <div class="col-md-3">
                        <!-- /.form-group -->
                        <div class="form-group">
                           <label>Gasto total</label>
                           <div class="form-group">
                              <input type="text" class="form-control" disabled>
                           </div>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <div class="col-md-3">
                        <!-- /.form-group -->
                        <div class="form-group">
                           <label>Vuelto</label>
                           <div class="form-group">
                              <input type="text" class="form-control" disabled>
                           </div>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <!-- /.col -->
                  </div>
               </div>
               <!--------------------------->
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.content -->
   <!-- Modal de detalles descritos -->
   <div class="modal fade" id="modal-detallesdescritos">
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
            <div class="modal-body">
               <div class="form-group">
                  <label for="exampleInputEmail1">Detalle de los trabajos realizados</label>
                  <textarea class="form-control" rows="3" placeholder="Ingrese"></textarea>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Suma asignada</label>
                  <input type="email" class="form-control" id="exampleInputEmail1">
               </div>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
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
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Archivo</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Functional-requirements.docx</td>
                           <td class="text-right py-0 align-middle">
                              <div class="btn-group btn-group-sm">
                                 <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                 <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                              </div>
                           </td>
                        <tr>
                           <td>UAT.pdf</td>
                           <td class="text-right py-0 align-middle">
                              <div class="btn-group btn-group-sm">
                                 <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                              </div>
                           </td>
                        <tr>
                           <td>Email-from-flatbal.mln</td>
                           <td class="text-right py-0 align-middle">
                              <div class="btn-group btn-group-sm">
                                 <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                              </div>
                           </td>
                        <tr>
                           <td>Logo.png</td>
                           <td class="text-right py-0 align-middle">
                              <div class="btn-group btn-group-sm">
                                 <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                              </div>
                           </td>
                        <tr>
                           <td>Contract-10_12_2014.docx</td>
                           <td class="text-right py-0 align-middle">
                              <div class="btn-group btn-group-sm">
                                 <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                              </div>
                           </td>
                     </tbody>
                  </table>
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
</body>
</html>