<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Login |</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="assets/css/particles-login.css">
      <!--===============================================================================================-->	
      <link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="assets/login/diseño/bootstrap/css/bootstrap.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="assets/login/diseño/animate/animate.css">
      <!--===============================================================================================-->	
      <link rel="stylesheet" type="text/css" href="assets/login/diseño/css-hamburgers/hamburgers.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="assets/login/diseño/select2/select2.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
      <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
      <!--===============================================================================================-->
   </head>
   <body>
      <div class="container text-center">
         <div id="particles-js"></div>
         <div id="overlay">
            <div class="container-login100">
               <div class="wrap-login100">
                  <div class="login100-pic js-tilt" data-tilt>
                     <img src="<?php echo base_url();?>assets/Imagen/logologin.png" alt="IMG">
                  </div>
                  <form action="<?= base_url('login/validate') ?>" method="POST" id="frm_login">
                     <span class="login100-form-title">
                    Bienvenido a BlackCode
                     </span>
                     <div class="wrap-input100 validate-input" data-validate = "Formato invalido: ex@black.xyz" id="email">
                        <input class="input100" type="email" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <div class="invalid-feedback">
                        </div>
                     </div>  
                     <div class="wrap-input100 validate-input" data-validate = "Contraseña incorrecta" id="password">
                        <input class="input100" type="password" name="password"  id="exampleInputPassword1">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                       <!-- <div align="center" class> <a href='#' > Restablecer sus credenciales?</a></div> -->
                     </div>

                     <div class="form-group">
                        <center>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                     </div>
                     <div class="form-group" id="alert"></div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--===============================================================================================-->
      <script src="<?php echo base_url()?>assets/lib/particles/particles.js"></script>
      <script src="<?php echo base_url()?>assets/lib/particles/demo/js/app.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="<?=base_url('assets/js/auth/login.js')?>"></script>
   </body>
</html>