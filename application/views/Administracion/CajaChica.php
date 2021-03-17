<!-- Content Wrapper. Contains page content -->
<head>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Caja chica</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">Inicio</li>
                  <li class="breadcrumb-item">Administracion oficina</li>
                  <li class="breadcrumb-item active">Caja chica</li>
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
   <section class="content">
      <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
         <div class="row">
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-info">
                  <div class="inner">
                     <h4>Ingreso</h4>
                     <p>Registrar fecha y monto que ingresa a la caja chica</p>
                  </div>
                  <div class="icon">
                     <i class="ion-android-arrow-dropup-circle"></i>
                  </div>
                  <a href="<?php echo base_url()?>Administracion/CajaIngreso" class="small-box-footer">Más detalle <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                  <div class="inner">
                     <h4>Egreso</h4>
                     <p>Registrar fecha, monto y destinatario de la salida de caja chica</p>
                  </div>
                  <div class="icon">
                     <i class="ion-android-arrow-dropdown-circle"></i>
                  </div>
                  <a href="<?php echo base_url()?>Administracion/CajaEgreso" class="small-box-footer">Más detalle <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                  <div class="inner">
                     <h4>Vueltos</h4>
                     <p>Registro vuelto de los egreso asignados </p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?php echo base_url()?>Administracion/vueltocaja" class="small-box-footer">Más detalle <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <div class="col-lg-3 col-8">
               <!-- small box -->
               <?php 
                  $balancecajachica = 0;
                  if (isset($totalcajachica)){
                      $balancecajachica = $totalcajachica[0]->balance;
                  }
                  if($balancecajachica <=5000){
                  ?>
               <div class="small-box bg-danger">
                  <div class="inner">
                     <h4>Total de la caja chica</h4>
                     <h3><?php echo '$'.$balancecajachica;?></h3>
                  </div>
                  <div class="icon">
                     <i class="ion ion-stats-bars"></i>
                  </div>
               </div>
               <?php }else{?>
               <div class="small-box bg-success">
                  <div class="inner">
                     <h4>Total de la caja chica</h4>
                     <h3><?php echo '$'.$balancecajachica;?></h3>
                  </div>
                  <div class="icon">
                     <i class="ion ion-stats-bars"></i>
                  </div>
               </div>
               <?php }?>
            </div>
            <!-- ./col -->
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Modal administracion oficina -->
   <div class="modal fade" id="monto">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title"> Administración de costos de oficina</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                     <div class="col-lg-3 col-3">
                        <!-- small box -->
                        <div class="small-box bg-info">
                           <div class="inner">
                              <h4>Costos fijos </h4>
                           </div>
                           <div class="icon">
                              <i class="ion ion-bag"></i>
                           </div>
                           <a href="<?php echo base_url()?>Inicio" class="small-box-footer" data-toggle="modal" 
                              data-target="#costo-fijo">Administrar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-3">
                        <!-- small box -->
                        <div class="small-box bg-success">
                           <div class="inner">
                              <h4>Caja Chica</h4>
                           </div>
                           <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                           </div>
                           <a href="<?php echo base_url()?>Administracion/CajaIngreso" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-primary">Aceptar</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
</div>
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
<script>var total_cajachica = '<?php echo $balancecajachica;?>';</script>
<script src="<?php echo base_url();?>assets/js/Administracion/cajachica.js"></script>
</body>
</html>