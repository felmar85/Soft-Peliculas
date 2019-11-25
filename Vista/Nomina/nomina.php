<?php include_once ("../../Funciones/sessiones.php"); ?>

  <h1><b>Gestión de Nomina</b></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Nomina</li>
      </ol>

  <div id="nuevo-editar" class="hide">
  </div>

    <section class="content">
      <div class="row">

            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Listado de Nominas</h3>
                  <div class="box-tools pull-right">
                      <button class="btn btn-info btn-sm" id="nuevo"  data-toggle="tooltip" 
                          title="Nueva Nomina"><i class="fa fa-plus" aria-hidden="true"></i></button> 
                  </div>
                </div>

        <div class="box-body">
          <div id="editar"></div>
          <div id="listado">
            <table id="tabla" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">Id Nom</th>
                  <th class="text-center">Id Empl</th>
                  <th class="text-center">Fecha</th>
                  <th class="text-center">Sueldo Bas.</th>
                  <th class="text-center">HED</th>
                  <th class="text-center">HEN</th>
                  <th class="text-center">Aux transp</th>
                  <th class="text-center">Vlr HED</th>
                  <th class="text-center">Vlr HEN</th>
                  <th class="text-center">Dias Lab</th>
                  <th class="text-center">Sueldo Dev</th>
                  <th class="text-center">Pension</th>
                  <th class="text-center">Salud</th>
                  <th class="text-center">Sueldo Neto</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>

              <tbody>
              </tbody>

              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

<script src="./Recursos/js/funcionesNomina.js"></script>

<script>
    $(document).ready(nomina);
</script>