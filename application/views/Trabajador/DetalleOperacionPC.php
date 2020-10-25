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
         <div class="row">
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-info">
                  <div class="inner">
                     <p>Registro trabajo</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-person-stalker"></i>
                  </div>
                  <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                     data-target="#modal-lg1">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <!-- small box  editar-->
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
                     data-target="#modal-lg4">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
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
                     data-target="#modal-lg4">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
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
                     data-target="#modal-lg5">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>

            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-info">
                  <div class="inner">
                     <p>Subir documentos/fotos</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-arrow-up-a"></i>
                  </div>
                  <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                     data-target="#modal-lg5">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-info">
                  <div class="inner">
                     <p>Asistencia de personal</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-person"></i>
                  </div>
                  <a class="small-box-footer" href="<?php echo base_url()?>Inicio" data-toggle="modal"
                     data-target="#modal-lg5">Ingresar<i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>

            <!-- ./col -->
         </div>
         <!-- /.row -->
         <!-- Main row -->
         <div class="row">
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

            <!-- Gastos varios -->
            <div class="modal fade" id="modal-lg5">
               <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Gastos varios </h4>
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
            <!-- Fin dialog -->
            <!-- /.card -->
   </section>
   <!-- right col -->
   </div>
   <!-- /.row (main row) -->
   </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/operaciones.js"></script>
</body>
</html>