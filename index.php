<?php
  session_start();

  if(isset($_GET["cerrar_session"]) and $_GET["cerrar_session"]==true){
    session_destroy();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pelicep | Log in</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="Recursos/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Recursos/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="Recursos/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" href="Recursos/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="Recursos/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body background="Recursos/img/Fondo1.png">
<div class="login-box">
  <div class="login-logo">
    <a href="#" style="color:black"><b>Peliculas</b>Online</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg" style="color:black">Autenticarse para iniciar sesión</p>

    <form id="login-form" action="" method="post">
      <div class="form-group has-feedback">
        <input type="type" id="usuario" name="usuario" class="form-control" placeholder="Usuario">
        <span class="form-control-feedback"><i class="fas fa-user-tie"></i></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" name="password" class="form-control" placeholder="Clave">
        <span class="form-control-feedback"> <i class="fas fa-key"></i></span>             
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" id="ingresar" class="btn btn-primary btn-block">Ingresar</button>
        </div>
        <!-- /.col -->
        <input type="hidden" value="login" name="accion">
      </div>
    </form>

   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>
<script src="./Recursos/js/funcionesLogin.js"></script>
<!-- Funciones de Lógica de neogcio -->
<script>
    $(document).ready(login);
</script>

</body>
</html>