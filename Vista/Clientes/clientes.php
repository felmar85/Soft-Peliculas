<?php include_once("../../Funciones/sessiones.php"); ?>

<h1><b>Gestión de Clientes</b></h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Cliente</li>
</ol>

<div id="nuevo-editar" class="hide">
</div>

<section class="content">
  <div class="row">
    <div class="box">
      <div id="cliente">
        <div class="box-header with-border">
          <h3 class="box-title">Listado de Clientes</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo Cliente"><i class="fa fa-plus" aria-hidden="true"></i></button>
          </div>
        </div>

        <div class="box-body">
          <table id="tabla" class="table table-bordered table-striped" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Identificación</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Pais</th>
                <th>Ciudad</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="./Recursos/js/funcionesCliente.js"></script>

