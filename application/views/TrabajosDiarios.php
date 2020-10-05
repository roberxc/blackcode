<body class="hold-transition sidebar-mini">
   <div class="wrapper">
   <!-- Main Sidebar Container -->
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1>Gestion de trabajos</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item">Inicio</li>
                     <li class="breadcrumb-item">Compras</li>
                     <li class="breadcrumb-item">Ordenes de compra</li>
                  </ol>
               </div>
            </div>
         </div>
         <!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12">
                  
                  <div class="row">
                     <div class="col-md-6">
                        <div class="card card-primary">
                           <div class="card-header">
                              <h3 class="card-title">Detalles</h3>
                              <div class="card-tools">
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                 <i class="fas fa-minus"></i></button>
                              </div>
                           </div>
                           <div class="card-body">
                              <form role="form">
                                 <div class="card-body">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Codigo de servicio</label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Fecha</label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Persona a cargo</label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Proyecto / Cliente</label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Detalle de los trabajos realizados</label>
                                       <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Suma asignada</label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- GASTOS DE VIATICOS -->
                     <div class="col-md-6">
                        <div class="card card-secondary">
                           <div class="card-header">
                              <h3 class="card-title">Gastos de viáticos</h3>
                              <div class="card-tools">
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                 <i class="fas fa-minus"></i></button>
                              </div>
                           </div>
                           <div class="card-body">
                              <form role="form">
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-sm-3">
                                          <!-- text input -->
                                          <div class="form-group">
                                             <label>Desayuno</label>
                                             <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-3">
                                          <div class="form-group">
                                             <label>Almuerzo</label>
                                             <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-3">
                                          <div class="form-group">
                                             <label>Cena</label>
                                             <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-3">
                                          <div class="form-group">
                                             <label>Agua</label>
                                             <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-3">
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
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- TERMINO DE MATERIALES COMPRADOS -->
                        <!-- /.card -->
                     </div>
                     <!-- TERMINO DE GASTOS DE VIATICO -->
                  </div>

                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Materiales comprados durante los trabajos</h3>
                     </div>
                     <div class="card-body">
                        <form role="form" id="form" action="">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Material</label>
                                       <div class="input-group mb-3" id ="divmaterial1">
                                          <input type="text" class="form-control" placeholder="Ingrese" name="mytext[]">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-2">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Cantidad</label>
                                       <div class="input-group mb-3" id ="divcantidadmat1">
                                          <input type="text" class="form-control" placeholder="Ingrese" name="mytext[]">
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-sm-2">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Valor * Unidad</label>
                                       <div class="input-group mb-3" id ="divvalormat1">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" placeholder="Ingrese" name="mytext[]">
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-sm-2">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Eliminar</label>
                                       <div class="input-group mb-3" id ="divdeletemat1">
                                          <button type="button" class="btn"><i class="fa fa-trash btndeletemat1"></i></button>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-sm-2">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Agregar más</label>
                                       <div class="input-group mb-3">
                                          <button type="button" class="btn btn-block btn-primary" id="btnmat1agregar">+</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <!-- /.content -->
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Materiales comprados antes de los trabajos</h3>
                     </div>
                     <div class="card-body">
                        <form role="form">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Material</label>
                                       <div class="input-group mb-3">
                                          <input type="text" class="form-control" placeholder="Ingrese">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Valor $</label>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Agregar más</label>
                                       <div class="input-group mb-3">
                                          <button type="button" class="btn btn-block btn-primary">Añadir</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>

                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Materiales de bodega</h3>
                     </div>
                     <div class="card-body">
                        <form role="form">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Material</label>
                                       <div class="input-group mb-3">
                                          <input type="text" class="form-control" placeholder="Ingrese">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Valor $</label>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Agregar más</label>
                                       <div class="input-group mb-3">
                                          <button type="button" class="btn btn-block btn-primary">Añadir</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.card-body -->
                  </div>

                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Combustible</h3>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                           <i class="fas fa-minus"></i></button>
                        </div>
                     </div>
                     <div class="card-body">
                        <form role="form">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Material</label>
                                       <div class="input-group mb-3">
                                          <input type="text" class="form-control" placeholder="Ingrese">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Valor $</label>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Agregar más</label>
                                       <div class="input-group mb-3">
                                          <button type="button" class="btn btn-block btn-primary">Añadir</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.card-body -->
                  </div>

                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Gastos varios</h3>
                     </div>
                     <div class="card-body">
                        <form role="form">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Material</label>
                                       <div class="input-group mb-3">
                                          <input type="text" class="form-control" placeholder="Ingrese">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Valor $</label>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Agregar más</label>
                                       <div class="input-group mb-3">
                                          <button type="button" onclick="test()" class="btn btn-block btn-primary">Añadir</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.card-body -->
                  </div>

                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Resultados</h3>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                           <i class="fas fa-minus"></i></button>
                        </div>
                     </div>
                     <div class="card-body">
                        <form role="form">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Gasto total</label>
                                       <div class="input-group mb-3">
                                          <input type="text" class="form-control" placeholder="Ingrese">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Vuelto</label>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.card-body -->
                  </div>

                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Personal asistido</h3>
                        <div class="card-tools">
                           <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                           <i class="fas fa-minus"></i></button>
                        </div>
                     </div>
                     <div class="card-body">
                        <form role="form">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Material</label>
                                       <div class="input-group mb-3">
                                          <input type="text" class="form-control" placeholder="Ingrese">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Valor $</label>
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text">$</span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                       <label>Agregar más</label>
                                       <div class="input-group mb-3">
                                          <button type="button" onclick="test()" class="btn btn-block btn-primary">Añadir</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                     </div>
                  </div>
      </section>
      <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="<?php echo base_url()?>assets/js/trabajosdiarios.js"></script>
   <!-- Bootstrap 4 -->
   <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- DataTables -->
   <script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="<?php echo base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?php echo base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="<?php echo base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <!-- AdminLTE App -->
   <script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
   <!-- page script -->
   <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
   </script>
</body>
</html>