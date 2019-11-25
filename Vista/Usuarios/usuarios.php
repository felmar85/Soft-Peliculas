<?php include_once("../../Funciones/sessiones.php"); ?>

<h1><b>Gestión de Usuarios</b></h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Usuario</li>
</ol>

<div id="nuevo-editar" class="hide">
</div>

<section class="content">
  <div class="row">
    <div class="box">
      <div id="usuario">
        <div class="box-header with-border">
          <h3 class="box-title">Listado de Usuarios</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo Usuarios"><i class="fa fa-plus" aria-hidden="true"></i></button>
          </div>
        </div>

        <div class="box-body">
          <table id="tabla" class="table table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Identificación</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Estado</th>
                <th>Rol</th>
                <th>Fecha creación</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<script src="./Recursos/js/funcionesUsuarios.js"></script>
