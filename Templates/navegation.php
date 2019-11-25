<?php include_once ("./Funciones/sessiones.php");?>
  <aside class="main-sidebar">
      
    <section class="sidebar">
      
      <div class="user-panel">
        <div class="pull-left image">
          <img src="./Recursos/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["usuario"]; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Pelicep | Online</a>
        </div>   
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÚ DE ADMINISTRACIÓN</li>
          <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i>
                <span>MENÚ</span>
              </a>
              <ul class="treeview-menu">
                <li style="visibility: visible; display: <?php echo $_SESSION["1NA"]; ?>;"><a href="./Vista/Ciudades/ciudad.php"><i class="fa fa-globe"></i> <span>Ciudades</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["10NA"]; ?>;"><a href="./Vista/Paises/pais.php"><i class="fa fa-globe"></i> <span>Paises</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["2NA"]; ?>;"><a href="./Vista/Clientes/clientes.php"><i class="fa fa-user"></i> <span>Clientes</span></a></li>  
                <li style="visibility: visible; display: <?php echo $_SESSION["3NA"]; ?>;"><a href="./Vista/Empleados/empleados.php"><i class="fa fa-male"></i> <span>Empleados</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["15NA"]; ?>;"><a href="./Vista/Usuarios/usuarios.php"><i class="fa fa-user-plus"></i> <span>Usuarios</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["16NA"]; ?>;"><a href="./Vista/roles/roles.php"><i class="fa fa-users"></i> <span>Roles</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["4NA"]; ?>;"><a href="./Vista/Lenguajes/lenguaje.php"><i class="fa fa-flask"></i> <span>Lenguajes</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["11NA"]; ?>;"><a href="./Vista/Peliculas/pelicula.php"><i class="fa fa-film"></i> <span>Peliculas</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["12NA"]; ?>;"><a href="./Vista/Categorias/Categoria.php"><i class="fa fa-align-justify"></i> <span>Categorias</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["14NA"]; ?>;"><a href="./Vista/Categoriaxpelicula/categoriaxpelicula.php"><i class="fa fa-align-justify"></i> <span>Categorias Por Pelicula</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["5NA"]; ?>;"><a href="./Vista/Venta/venta.php"><i class="fa  fa-money"></i> <span>Ventas</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["6NA"]; ?>;"><a href="./Vista/gestion_tiendas/tienda.php"><i class="fa fa-hospital-o"></i> <span>Gestion de Tiendas</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["9NA"]; ?>;"><a href="./Vista/Nomina/nomina.php"><i class="fa fa-usd"></i> <span>Nomina</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["13NA"]; ?>;"><a href="./Vista/Propietario/propietario.php"><i class="fa fa-black-tie"></i> <span>Propietarios</span></a></li>
                <li style="visibility: visible; display: <?php echo $_SESSION["14NA"]; ?>;"><a href="./Vista/Proveedor/proveedor.php"><i class="fa fa-flask"></i> <span>Proveedores</span></a></li>
              </ul>  
           </li> 
    </section>
  </aside>