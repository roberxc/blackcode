<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>BlackCode | Log in</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- icheck bootstrap -->
      <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
      <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/login.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   </head>
   <body class="hold-transition login-page" id="particles-js">
      <div class="login-box">
         <div class="login-logo">
            <b>CDH</b> Ingenieria
         </div>
         <!-- /.login-logo -->
         <div class="card">
            <div class="card-body login-card-body">
               <p class="login-box-msg">Ingresa tus datos</p>
               <form action="<?php echo base_url()?>Inicio" method="post">
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Email" name="email">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" placeholder="Contraseña" name="pass">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-8">
                     </div>
                     <!-- /.col -->
                     <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- /.login-box -->
      <script src="<?php echo base_url()?>assets/lib/particles/particles.js"></script>
      <script src="<?php echo base_url()?>assets/lib/particles/demo/js/app.js"></script>
      <!-- jQuery -->
      <script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
   </body>
</html>