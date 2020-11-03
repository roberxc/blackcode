<!-- Content Wrapper. Contains page content -->
<form>
   <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Gestion de cuentas</h1>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <section class="content">
      <div class="row">
      <div class="col-md-4">
         <div class="card card-info">
            <div class="card-header">
               <h3 class="card-title">Informacion personal</h3>
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
               <h3 class="card-title">Contacto</h3>
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
            <h3 class="card-title">Otro</h3>
         </div>
         <div class="card-body">
            <!-- Date -->
            <!-- /.form group -->
            <!-- Date range -->
            <div class="form-group">
               <div class="form-group">
                  <label for="exampleInputEmail1">Tipo de usuario</label>
                  <select class="form-control" name="cars" id="tipo">
                     <option value="select">Seleccionar</option>
                     <option value="3">Bodeguero</option>
                     <option value="1">Administracion</option>
                     <option value="2">Trabajador</option>
                  </select>
               </div>
               <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <!-- Date and time range -->
            <div class="form-group">
               <label>Contraseña:</label>
               <div class="input-group">
                  <input type="text" class="form-control float-right" id="password" >
               </div>
               <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <div class="form-group">
               <label>Confirmar Contraseña:</label>
               <div class="input-group">
                  <input type="text" class="form-control float-right" id="password_confirm">
               </div>
               <!-- /.input group -->
            </div>
            <!-- /.form group -->
            <!-- Date and time range -->
            <!-- /.form group -->
         </div>
      </div>
   </section>
   <div class="row">
      <div class="col-md-4" >
      </div>
      <div class="col-md-4" >
         <!-- /.form-group -->
         <div class="form-group">
            <label class="invisible">Guardar</label>
            <button type="button" class="btn btn-block btn-primary">Guardar</button>
         </div>
         <!-- /.form-group -->
      </div>
      <div class="col-md-4" >
      </div>
   </div>
</form>
<script src="<?php echo base_url()?>assets/js/GestionCuentas/registro_cuentas.js"></script>
</body>
</html>