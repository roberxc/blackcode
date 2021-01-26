<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Registro|</title>
</head>
<body>

  
<div class="container" style="magin-top:4em">
    <div class="row justify-content-lg-center align-items-lg-center">
        <div class="col-lg-6 align-self-center">
    <h1>Registro</h1>
    <div class="form-group">
    
<?php echo validation_errors(); ?>
<?php
    echo form_open('registro/create',array('method' => 'POST'));
    
    echo form_label('Nombre de usuario');
    echo form_input('username');

    echo "<br>";
    echo form_label('Correo electrónico');
    echo form_input(array('type' => 'email', 'name' => 'email'));
    echo "<br>";
    
    echo form_label('Contraseña');
    echo form_password('password');
    echo "<br>";
    echo form_label('Confirmacion de contraseña');
    echo form_password('password_confirm');
    echo "<br>";
    
    echo form_submit('submit', 'Enviar datos');
    echo form_close();
?> 

<?= isset($msg) ? $msg : '' ?>
</body>
</html>
