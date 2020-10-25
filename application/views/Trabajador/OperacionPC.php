<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Bienvenido <?php echo $_SESSION['email']?></h1>
            </div>
            <!-- /.col -->
         </div>
         <div class="col-sm-6">
            <br>
            <h4 class="m-0 text-dark">Dispositivo utilizado: <?php echo$dispositivo;?> </h4>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
         <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
               <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                  aria-selected="true">Inicio Trabajo</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                  aria-selected="false">Detalle Trabajo</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id="profile-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="profile"
                  aria-selected="false">Personal</a>
            </li>
         </ul>
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Registra trabajo a realizar</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form">
                     <div class="card-body">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Codigo de servicio</label>
                           <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Fecha</label>
                           <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Persona a cargo</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Proyecto / Cliente</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Detalle de los trabajos realizados</label>
                              <textarea class="form-control" rows="3" placeholder="Ingrese"></textarea>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Suma asignada</label>
                              <input type="email" class="form-control" id="exampleInputEmail1">
                           </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                           <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
               <div class="row">
                  <div class="col-lg-3 col-6">
                     <div class="small-box bg-success">
                        <div class="inner">
                           <p>Gastos de viáticos</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-cash"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                           data-target="#modal-lg2">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                        <div class="inner">
                           <p>Materiales comprados durante los trabajos</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-cash"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                           data-target="#modal-lg3">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                        <div class="inner">
                           <p>Materiales comprados antes de los trabajos</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-cash"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                           data-target="#modal-lg4">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                  </div>

                  <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                        <div class="inner">
                           <p>Materiales de bodega</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-cash"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                           data-target="#modal-lg5">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                  </div>

                  <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                        <div class="inner">
                           <p>Combustible</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-cash"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                           data-target="#modal-lg9">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                        <div class="inner">
                           <p>Gastos varios</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-cash"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                           data-target="#modal-lg10">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                  </div>

                  <div class="col-lg-3 col-6">
                     <div class="small-box bg-info">
                        <div class="inner">
                           <p>Subir documentos/fotos</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-arrow-up-a"></i>
                        </div>
                        <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                           data-target="#modal-lg6">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  
               </div>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
               <div class="row">
                  <div class="col-lg-3 col-6">
                     <div class="small-box bg-info">
                        <div class="inner">
                           <p>Asistencia de personal</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-person"></i>
                        </div>
                           <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                              data-target="#modal-lg6">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
         <!-- Left col -->
         <!-- right col (We are only adding the ID to make the widgets sortable)-->
         <!-- Map card -->
         <div class="modal fade" id="modal-lg1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <div align="center"><img src=""></div>
                     </br>
                     <h4 class="modal-title">Registra trabajo a realizar </h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Codigo de servicio</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Fecha</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                           <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Persona a cargo</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Proyecto / Cliente</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Ingrese">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Detalle de los trabajos realizados</label>
                        <textarea class="form-control" rows="3" placeholder="Ingrese"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Suma asignada</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                     </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                        data-target="#modal-l">Guardar</button>
                     </tr>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- Fin dialog -->
         <!-- Map card  2 paso-->
         <div class="modal fade" id="modal-lg2">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <div align="center"><img src=""></div>
                     </br>
                     <h4 class="modal-title">Registro Gastos de viáticos </h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label>Desayuno</label>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                           </div>
                           <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Almuerzo</label>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                           </div>
                           <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Cena</label>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                           </div>
                           <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Agua</label>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                           </div>
                           <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Alojamiento</label>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text">$</span>
                           </div>
                           <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                        data-target="#modal-l">Guardar</button>
                     </tr>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- Materiales comprados durante los trabajos -->
         <div class="modal fade" id="modal-lg3">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Materiales comprados durante los trabajos</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form role="form" id="form" action="">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="dynamic_field">
                              <tr>
                                 <td>
                                    <label>Material</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <label>Cantidad</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <label>Valor/Unidad</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <label>Agregar más</label>
                                    <button type="button" name="add" id="addmaterial" class="btn btn-success">+</button>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                              data-target="#modal-l">Guardar</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- Materiales comprados antes de los trabajos -->
         <div class="modal fade" id="modal-lg4">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Materiales comprados antes de los trabajos </h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form role="form" id="form" action="">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="dynamic_field2">
                              <tr>
                                 <td>
                                    <label>Material</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <label>Cantidad</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <label>Valor/Unidad</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <label>Agregar más</label>
                                    <button type="button" name="add" id="addmaterial2" class="btn btn-success">+</button>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                              data-target="#modal-l">Guardar</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- Materiales de bodega -->
         <div class="modal fade" id="modal-lg5">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Materiales de bodega </h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form role="form" id="form" action="">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="tabla_bodega">
                              <tr>
                                 <td>
                                    <p><label>Material</label></p>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <p><label>Cantidad</label></p>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <p><label>Agregar más</label></p>
                                    <button type="button" name="add" id="addmaterial_bodega" class="btn btn-success">+</button>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                              data-target="#modal-l">Guardar</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- Gastos varios -->
         <div class="modal fade" id="modal-lg6">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Subir registro fotografico</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="table-responsive">
                        <table class="table table-bordered" id="tabla_archivo">
                           <tr>
                              <td>
                                 <p><label>Archivo</label></p>
                                 <div class="input-group">
                                    
                                       <input type="file" name="archivossubidos[]">
                                       

                                 </div>
                              </td>
                              <td>
                                 <p><label>Agregar más</label></p>
                                 <button type="button" name="add" id="addarchivo" class="btn btn-success">+</button>
                              </td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                        data-target="#modal-l">Guardar</button>
                     </tr>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>

         <!-- Asistencia -->
         <div class="modal fade" id="modal-lg6">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Asistencia Personal</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-info">
                              <div class="inner">
                                 <p>Mañana</p>
                              </div>
                              <div class="icon">
                                 <i class="ion ion-clock"></i>
                              </div>
                              <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                                 data-target="#modal-lg7">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
                           </div>
                        </div>

                        <div class="col-lg-3 col-6">
                           <!-- small box -->
                           <div class="small-box bg-info">
                              <div class="inner">
                                 <p>Tarde</p>
                              </div>
                              <div class="icon">
                                 <i class="ion ion-clock"></i>
                              </div>
                              <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                                 data-target="#modal-lg8">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>

         <!-- Asistencia mañana -->
         <div class="modal fade" id="modal-lg7">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Asistencia Personal Mañana</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form role="form" id="form" action="">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="tabla_personal_mañana">
                              <tr>
                                 <td>
                                    <label>Rut</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <label>Nombre Completo</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <label>Hora Salida</label>
                                    <input type="time" id="default-picker" class="form-control">
                                 </td>
                                 <td>
                                    <label>Añadir más</label>
                                    <br>
                                    <button type="button" name="add" id="addpersonal_mañana" class="btn btn-success">+</button>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                              data-target="#modal-l">Guardar</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- Asistencia de tarde -->
         <div class="modal fade" id="modal-lg8">
            <div class="modal-dialog modal-xl">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Asistencia Personal Tarde</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form role="form" id="form" action="">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="tabla_personal_tarde">
                              <tr>
                                 <td>
                                    <label>Rut</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <label>Nombre Completo</label>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <label>Hora Retorno</label>
                                    <input type="time" id="default-picker" class="form-control">
                                 </td>
                                 <td>
                                    <label>Hora Salida</label>
                                    <input type="time" id="default-picker" class="form-control">
                                 </td>
                                 <td>
                                    <label>Hora Retorno</label>
                                    <input type="time" id="default-picker" class="form-control">
                                 </td>
                                 <td>
                                    <p><label>Añadir más</label></p>
                                    <button type="button" name="add" id="addpersonal_tarde" class="btn btn-success">+</button>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                              data-target="#modal-l">Guardar</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- Combustible -->
         <div class="modal fade" id="modal-lg9">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Combustible</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form role="form" id="form" action="">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="tabla_personal_tarde">
                              <tr>
                                 <td>
                                    <div class="form-group">
                                       <label>Tipo</label>
                                       <select class="form-control select2" style="width: 100%;">
                                       <option selected="selected">Seleccione</option>
                                       <option>Petróleo</option>
                                       <option>Gasolina</option>
                                       </select>
                                    </div>
                                 </td>

                                 <td>
                                    <label>Valor</label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text">$</span>
                                       </div>
                                       <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                              data-target="#modal-l">Guardar</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>

         <!-- Gastos varios -->
         <div class="modal fade" id="modal-lg10">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Gastos varios </h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form role="form" id="form" action="">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="tabla_gastosvarios">
                              <tr>
                                 <td>
                                    <p><label>Nombre</label></p>
                                    <input type="text" name="name[]" placeholder="Ingrese" class="form-control" />
                                 </td>
                                 <td>
                                    <p><label>Valor</label></p>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text">$</span>
                                       </div>
                                       <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                 </td>
                                 <td>
                                    <p><label>Agregar más</label></p>
                                    <button type="button" name="add" id="addgastos_varios" class="btn btn-success">+</button>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                           <button type="button" class="btn btn-primary" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                              data-target="#modal-l">Guardar</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- Fin dialog -->
         <!-- /.card -->
   </section>
   <!-- right col -->
   </div>
   <!-- /.row (main row) -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
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
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>