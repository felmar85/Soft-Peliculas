<?php include_once("../../Funciones/sessiones.php"); ?>

<h1><b>Gestión de Empleados</b></h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Empleado</li>
</ol>

<div id="nuevo-editar" class="hide">
</div>

<section class="content">
  <div class="row">
    <div class="box">
      <div id="empleado">
        <div class="box-header with-border">
          <h3 class="box-title">Listado de Empleados</h3>
          <div class="pull-right box-tools">
            <button class="btn btn-info btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo empleado">
              <i class="fa fa-plus" aria-hidden="true"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="tabla" class="table table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center">Identificación</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Cargo</th>
                <th class="text-center">Pais</th>
                <th class="text-center">Ciudad</th>
                <th class="text-center">Dirección</th>
                <th class="text-center">Telefono</th>
                <th class="text-center">Email</th>
                <th class="text-center">local</th>
                <th class="text-center">&nbsp;</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


<script src="./Recursos/js/funcionesEmpleado.js"></script>