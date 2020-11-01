<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Login</title>
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
                     <img src="assets/login/images/logo.png" alt="IMG">
                  </div>
                  <form class="login100-form validate-form" action="<?php echo base_url()?>Inicio" method="post">
                     <span class="login100-form-title">
                     Bienvenido a black code
                     </span>
                     <div class="wrap-input100 validate-input" data-validate = "Formato invalido: ex@black.xyz">
                        <input class="input100" type="text" name="email" placeholder="Correo">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                     </div>
                     <div class="wrap-input100 validate-input" data-validate = "Contraseña incorrecta">
                        <input class="input100" type="password" name="pass" placeholder="Contraseña">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                     </div>
                     <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                        Ingresar
                        </button>
                     </div>
                     </br></br></br>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--===============================================================================================-->
      <script src="<?php echo base_url()?>assets/lib/particles/particles.js"></script>
      <script src="<?php echo base_url()?>assets/lib/particles/demo/js/app.js"></script>
   </body>
</html>