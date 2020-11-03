<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
    <title>Login|</title>
</head>
<body>
 
<div class="container" style="magin-top:4em">
    <div class="row justify-content-lg-center align-items-lg-center">
        <div class="col-lg-6 align-self-center">
            <form action="<?= base_url('login/validate') ?>" method="POST" id="frm_login">
                <div class="form-group">
                    <h1  >Login</h1>

<!--Cajas de textos -->
    </div> 
    <div class="form-group" id="email">
        <label for="exampleInputEmail1">Correo</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su email">
        <div class="invalid-feedback">
             
        </div>
    </div>

  <div class="form-group" id="password">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su contraseña">
    <div class="invalid-feedback">
    
        </div>
        <div align="right" class> <a href='#' > Restablecer sus credenciales?</a></div>
        
    </div>

<div class="form-group">
<center>
        <button type="submit" class="btn btn-primary">Ingresar</button>
        
</div>
<div class="form-group" id="alert">
</div>

</form>
</div>
</div>
</div>

<div id="particles-js"></div>
<script src="particles.js"></script>
<script src="app.js"></script>
</body> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?=base_url('assets/js/auth/login.js')?>"></script>
</html>