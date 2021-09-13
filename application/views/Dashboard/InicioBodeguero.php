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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <p>Registro entrada</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars text-red"></i>
              </div>
              <a href="<?php echo base_url()?>RegistroEntrada" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <p>Registro salida</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars text-red"></i>
              </div>
              <a href="<?php echo base_url()?>RegistroSalida" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <p>Stock</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars text-red"></i>
              </div>
              <a href="<?php echo base_url()?>Stock" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
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
</body>
<!-- ESTE PARA LAS ALERTAS --->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
   var lista_stock = <?php echo $total_materiales_no_stock;?>;
   var flag_stock = <?php echo $flag_stock;?>;
</script>
<script>var base_url = '<?php echo base_url();?>';</script>
<script src="<?php echo base_url();?>assets/js/Bodega/iniciobodega.js"></script>
</html>