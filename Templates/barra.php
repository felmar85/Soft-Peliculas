<?php include_once ("./Funciones/sessiones.php"); ?>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <a href="adminper.php" class="logo">
      <span class="logo-mini"><b>On</b>line</span>
      <span class="logo-lg"><b>Pelicep</b>Online</span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="./Recursos/img/avatar5.png" class="user-image" alt="User Image">
            <span class="hidden-xs"> <?php echo $_SESSION["usuario"]; ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="./Recursos/img/avatar5.png" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['usuario']; ?>
                  <small>Pelicecep | Online</small>
                </p>
            </li>

            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Perfil</a>
              </div>
              <div class="pull-right">
                <a href="index.php?cerrar_session=true" class="btn btn-default btn-flat">Cerrar</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>



