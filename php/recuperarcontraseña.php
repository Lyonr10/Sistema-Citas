<?php 
session_start();
if(isset($_SESSION['id_usuario'])){
    header("location:php/inicio.php");
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Clínica la paz</title>
    <link rel="shortcut icon" type="image/x-icon" href="public/multimedia/favicon.ico" />
     <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/login.css">
    <link rel="stylesheet" href="../public/css/sweetalert.css">
    <link rel="stylesheet" href="../public/css/sweetalert2.min.css">
    <style>
    .error{
        color: red;
    }
    </style>
</head>
<div class="logo">
    <img src="public/multimedia/1490268935705.jpg" alt="" width="100%">
</div>
<body style="background: #fff;">
    <div class="content_formulario" style="">
        <form action="" method="post" autocomplete name="" id="formulario_login">
          <div class="cabecera_login text-center">
              <h3  style="background: #17A48B;"> BIENVENIDO</h3>
              <img src="public/multimedia/avatar-login.png" alt="" width="200">
          </div>
           <div class="contenedor-inputs">
                <div class="form-group">
                 
                  
                </div>
                <div class="form-group">
                   
            
                </div>
            
            </div>
            <div class="btn-form">
                <button class="btn" type="submit" id="ingresar_form" name="ingresar_form" style="background: #17A48B;"><i class="fa fa-sign-in"></i>Recuperar</button>
            </div>
            <div id="error" class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button><center><h5 id="mensaje"></h5></center></div>
        </form>
    </div>

    <footer style="margin-top: 200px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 text-center">
        <h4 style="font-style: italic;"><strong>LCA Clinica "LA PAZ"</strong></h4>
        <p>Municipio José Felix Ribas<br>La Victoria, Aragua</p>
        <ul class="list-unstyled">
         
        </ul>
        <hr class="small">
        <p class="text-muted">Copyright &copy; Todos Los Derechos Reservados</p>
      </div>
    </div>
  </div>
</footer>
<script src="../public/js/jquery.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/sweetalert2.min.js"></script>
<script src="../public/js/jquery.validate.js"></script>
<script>
$(document).ready(function(){
});
</script>
</body>
</html>