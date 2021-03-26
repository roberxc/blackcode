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
               <h1 class="m-0 text-dark">Bienvenido <?php $set_data = $this->session->all_userdata(); 
                  if (isset($set_data['nombre_usuario'])) {
                    echo $set_data['nombre_usuario'];
                  }?></h1>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <input type="hidden" id="estado-alerta" value="<?php if(isset($expiracion)){echo$expiracion;}else{ echo 0;}?>">
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <!-- Info boxes -->
         <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
               <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">Usuarios registrados</span>
                     <span class="info-box-number"><?php if(isset($total_registros)){echo$total_registros[0]['total'];}else{echo'0';}?></span>
                  </div>
                  <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
               <div class="info-box mb-3">
                  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-poll"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text">Total caja chica</span>
                     <span class="info-box-number"><?php if(isset($totalcajachica)){ if($totalcajachica[0]->balance>0){echo"$".$totalcajachica[0]->balance;}else{echo'$0';}}?></span>
                  </div>
                  <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>
         </div>
         <!-- Small boxes (Stat box) -->
         <div class="row">
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                  <div class="inner">
                     <p>Administracion de oficina</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?php echo base_url()?>Administracion/MenuCaja" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-warning">
                  <div class="inner">
                     <p>Administracion de usuarios</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-person-add"></i>
                  </div>
                  <a href="<?php echo base_url()?>Administracion/registroTrabajador" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-danger">
                  <div class="inner">
                     <p>Trabajos Diarios</p>
                  </div>
                  <div class="icon">
                     <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?php echo base_url()?>Operacion/trabajoDiario" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
               </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
         </div>
         <!-- /.row -->
         <!-- /.row (main row) -->
         <div class="row">
            <!-- Grafico de costos fijos -->
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-header border-0">
                     <div class="d-flex justify-content-between">
                        <h3 class="card-title">Costos fijos</h3>
                        <a href="<?php echo base_url()?>Administracion/CostosFijos">Administrar</a>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="d-flex">
                        <p class="d-flex flex-column">
                           <span class="text-bold text-lg">$<?php echo$totalcostosfijos[0]['total'];?></span>
                           <span>Costos fijos totales</span>
                        </p>
                     </div>
                     <!-- /.d-flex -->
                     <div class="position-relative mb-4">
                        <canvas id="sales-chart" height="200"></canvas>
                     </div>
                     <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> Este año
                        </span>
                        <span>
                        <i class="fas fa-square text-gray"></i> Año pasado
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Lista de tareas -->
            <div class="col-lg-6">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">
                        <i class="ion ion-clipboard mr-1"></i>
                        Lista de tareas 
                     </h3>
                     <div class="card-tools">
                        <ul class="pagination pagination-sm">
                           <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                           <li class="page-item"><a href="#" class="page-link">1</a></li>
                           <li class="page-item"><a href="#" class="page-link">2</a></li>
                           <li class="page-item"><a href="#" class="page-link">3</a></li>
                           <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                        </ul>
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <ul class="todo-list" data-widget="todo-list" id="lista_tareas">
                     </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                     <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" placeholder="Ingrese nueva tarea" id="tareatxt">
                     <button type="button" class="btn btn-info float-right" onclick="agregarTarea()"><i class="fas fa-plus"></i> Agregar tarea</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
</section>
<!-- /.content -->
</div>
</body>
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
<script type="text/javascript">
   var lista_nrodoc = <?php echo json_encode($lista_nrodocactualizables); ?>;
</script>
<script type="text/javascript">
   var total_cajachica = <?php echo $totalcajachica[0]->Balance;?>;
</script>
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url();?>assets/js/Administracion/inicio.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/pages/inicio_admin.js"></script>
</html>