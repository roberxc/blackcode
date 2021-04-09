<!-- Content Wrapper. Contains page content -->
<!--Script alarma  -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Proyectos en ejecución</span>
                  <span class="info-box-number"><?php if(isset($proyectos_en_ejecucion)){echo$proyectos_en_ejecucion[0]['total'];}else{echo'0';}?></span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>

         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Proyectos a cargo</span>
                  <span class="info-box-number"><?php if(isset($proyectos_acargo)){echo$proyectos_acargo[0]['total'];}else{echo'0';}?></span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
      </div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <!-- ./col ------------------------------------------------------->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
               <div class="inner">
                  <p>Crear proyectos</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a  href="<?php echo base_url(); ?> nicio" data-toggle="modal" data-target="#modal-lg" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col ------------------------------------------------------->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
               <div class="inner">
                  <p>Estado de proyecto</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="<?php echo base_url();?>Proyecto/Estado_proyecto" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col ------------------------------------------------
            <div class="col-lg-3 col-6">
              
              <div class="small-box bg-success">
                <div class="inner">
                  <p>Cotización</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url();?> nicio" data-toggle="modal" data-target="#modal-lg" class="small-box-footer">
                Ingresar <i class="fas fa-arrow-circle-right"></i></a>
                
              </div>
            </div>------->
         <!-- ./col ------------------------------------------------------->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
               <div class="inner">
                  <p>Proyectos ejecutados o en ejecución</p>
               </div>
               <div class="icon">
                  <i class="ion ion-stats-bars"></i>
               </div>
               <a href="<?php echo base_url();?>Proyecto/Proyecto_ejecucion" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- /.modal -->
         <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title">Registrar proyecto</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form id="fromProyecto">
                        <label>Nombre Proyecto</label>
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Proyecto" id="nombreProyecto" required="required"  />
                        </div>
                        <label>Fecha de inicio</label>
                        <div class="form-group">
                           <input type="date" class="form-control" id="fechaInicio" required="required"  />
                        </div>
                        <label>Fecha de termino</label>
                        <div class="form-group">
                           <input type="date" class="form-control" id="fechaTermino" required="required"  />
                        </div>
                        <label>Monto total del proyecto</label>
                        <div class="form-group">
                           <input type="number" class="form-control" id="monto" required="required" placeholder="$" />
                        </div>
                        <div class="form-group">
                           <button type="button" id="addProyectoModal"  class="btn btn-primary">Guardar</button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.row -->
         <!-- Main row -->
         <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
            </section>
            <!-- /.Left col -->
            <!-- right col -->
         </div>
         <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!--Script alarma  -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--Script alarma  -->
<script>
   var base_url = '<?php echo base_url();?>';
</script>
<script src="<?php echo base_url();?>assets/js/EvaluacionProyecto/RegistroProyecto.js"></script>
</body>
</html>