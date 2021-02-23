
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div class="content-wrapper">

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Gestionar cuenta nueva</h1>
         </div>
      </div>
   </div>
</div>

<div class="col-12">
   <div class="card">
      <div class="card-header">
         <form role="form" id="form" method="POST">
            <div class="row">
               <div class="col-md-4">
                  <div class="card card-info">
                     <div class="card-header">
                        <h3 class="card-title">Datos personales</h3>
                     </div>
                     <div class="card-body">
                        <div class="form-group">
                           <label>Nombre completo:</label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="name">
                           </div>
                           <!-- /.input group -->
                        </div>
                        <!-- IP mask -->
                        <div class="form-group">
                           <label>Rut:</label>
                           <div class="input-group">
                              <input type="email" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="rut">
                           </div>
                           <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
               </div>
               <div class="col-md-4">
                  <div class="card card-success">
                     <div class="card-header">
                        <h3 class="card-title">Datos de Contacto</h3>
                     </div>
                     <div class="card-body">
                        <div class="form-group">
                           <label>Telefono:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-phone"></i></span>
                              </div>
                              <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask id="telefono">
                           </div>
                           <!-- /.input group -->
                        </div>
                        <!-- IP mask -->
                        <div class="form-group">
                           <label>Correo:</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                              </div>
                              <input type="email" class="form-control" data-inputmask="'alias': 'ip'" data-mask id="email">
                           </div>
                           <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
               </div>
               <!-- /.col (left) -->
               <div class="col-md-4">
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Rol</h3>
                     </div>
                     <div class="card-body">
                        <!-- Date -->
                        <!-- /.form group -->
                        <!-- Date range -->
                        <div class="form-group">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Cargo</label>
                              <div class="input-group">
                              
                              <input type="text" class="form-control"  data-mask id="cargo">
                           </div>
                           </div>
                           <!-- /.input group -->
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.row -->
         </form>
      </div>
   </div>
   <!-- /.card -->
   <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
         <div class="row">
            <div class="col-md-4" >
            </div>
            <div class="col-md-4" >
               <!-- /.form-group -->
               <div class="form-group">
                  <label class="invisible">Guardar</label>
                  <button type="button" class="btn btn-block btn-primary" id="add_Trabajador">Guardar</button>
               </div>
               <!-- /.form-group -->
            </div>
            <div class="col-md-4" >
            </div>
         </div>
      </div>
      <!-- /.card-body -->
   </div>
   <!-- /.card -->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
   integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?php echo base_url()?>assets/js/EvaluacionProyecto/registro_Trabajador.js"></script>

</body>
</html>