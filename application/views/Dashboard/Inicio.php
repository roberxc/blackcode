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
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <input type="hidden" id="estado-alerta" value="<?php if(isset($expiracion)){echo$expiracion;}else{ echo 0;}?>">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
            <a href="<?php echo base_url()?>Inicio" class="small-box-footer" data-toggle="modal" 
               data-target="#oficina1">Administrar <i class="fas fa-arrow-circle-right"></i></a>
         </div>
      </div>

      



          <!-- ./col -->
          <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-warning">
            <div class="inner">
               <p>Administracion de trabajadores</p>
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
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">

          </section>
          <!-- /.Left col -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.container-fluid -->
<section class="content">
   <!-- Modal administracion oficina -->
   <div class="modal fade" id="oficina1">
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
                           <a href="<?php echo base_url()?>Administracion/MenuCaja" class="small-box-footer">Administrar <i class="fas fa-arrow-circle-right"></i></a>
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
</section>
<section class="content">
   <!-- /.modal -->
   <div class="modal fade" id="costo-fijo">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Costo Fijo</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Seleccione un  Mes</label>
                           <select class="form-control select2bs4" style="width: 100%;">
                              <option selected="selected">Seleccione</option>
                              <option>Enero</option>
                              <option>Febrero</option>
                              <option>Marzo</option>
                              <option>Abril</option>
                              <option>Mayo</option>
                              <option>Junio</option>
                              <option>Julio</option>
                              <option>Agosto</option>
                              <option>Septiembre</option>
                              <option>Octubre</option>
                              <option>Noviembre</option>
                              <option>Diciembre</option>
                           </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <!-- /.col -->
                     <div class="col-md-2">
                        <!-- /.form-group -->
                        <div class="form-group">
                           <label class="invisible">Buscar</label>
                           <button type="button" class="btn btn-block btn-primary">Buscar</button>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <!-- /.col -->
                  </div>
                  <br></br>
                  <table id="example1" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>Costo Fijo</th>
                           <th>Enero</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Pago de luz</td>
                           <td>50.000</td>
                        </tr>
                        <tr>
                           <td>Pago de agua</td>
                           <td>50.000</td>
                        </tr>
                        <tr>
                           <td>Mantenimiento de equipo</td>
                           <td>50.000</td>
                        </tr>
                        <tr>
                           <td>Telefono</td>
                           <td>50.000</td>
                        </tr>
                  </table>
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
</section>
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
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url();?>assets/js/Administracion/inicio.js"></script>
</html>