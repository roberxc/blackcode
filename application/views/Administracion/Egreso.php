<head>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1>Caja chica Egreso</h1>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
      </section>
      <!-- Buscador -->
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <!-- SELECT2 EXAMPLE -->
               <div class="card card-default">
                  <!-- /.card-header -->
                  <form role="form" id="form" method="POST">
                     <div class="card-body">
                        <div class="row">
                        <div class="col-md-2">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                 <label>Fecha</label>
                                 <div class="form-group">
                                    <input type="date" class="form-control" placeholder="Ingrese" data-date-format="dd/mm/yyyy" id="fechaegreso">
                                 </div>
                              </div>
                                 <!-- /.form-group -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-2">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                    <label>Monto</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Ingrese" id="montoegreso">
                                    </div>
                                 </div>
                                 <!-- /.form-group -->
                              </div>
                              <div class="col-md-3">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                    <label>Destinatario</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Ingrese" id="destinatario">
                                    </div>
                                 </div>
                                 <!-- /.form-group -->
                              </div>
                              <div class="col-md-5">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                    <label>Detalle</label>
                                    <div class="form-group">
                                       <textarea type="text" class="form-control" placeholder="Ingrese" id="detalle"></textarea>
                                    </div>
                                 </div>
                                 <!-- /.form-group -->
                              </div>
                              <div class="col-md-2">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                    <label class="invisible">Guardar</label>
                                    <button type="button" class="btn btn-block btn-primary" id="add">Guardar</button>
                                 </div>
                                 <!-- /.form-group -->
                              </div>
                              <div class="col-md-2">
                                 <!-- /.form-group -->
                                 <div class="form-group">
                                    <label class="invisible">Volver</label>
                                    <button type="button" class="btn btn-block btn-warning" id="back">Volver</button>
                                 </div>
                                 <!-- /.form-group -->
                              </div>
                           <!-- /.col -->
                        </div>
                        <!-- /.row -->
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- /.card -->
         <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                     <th>Fecha</th>
                           <th>Monto $</th>
                           <th>Destinatario</th>
                           <th>Detalle</th>
                           <th>Estado</th>
                           <th></th>
                     </tr>
                  </thead>
                  <tbody id="tbody">
                  </tbody>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.col -->
   </div>
   <!-- ./wrapper -->
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
      integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   <script src="<?php echo base_url()?>assets/js/CajaChica/egreso_cajachica.js"></script>
</body>
</html>