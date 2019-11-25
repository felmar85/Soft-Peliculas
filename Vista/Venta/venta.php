<?php include_once ("../../Funciones/sessiones.php"); ?>

	<h1><b>Gestión de Ventas</b></h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Venta</li>
			</ol>

	<div id="nuevo-editar" class="hide">
	</div>

	<section class="content">
        <div class="row">
            <div class="box">
				<div id="venta">
					<div class="box-header with-border">
						<h3 class="box-title">Listado de Ventas</h3>
							<div class="pull-right box-tools">
								<button class="btn btn-info btn-sm" id="nuevo"  data-toggle="tooltip" title="Nueva venta">
								<i class="fa fa-plus" aria-hidden="true"></i></button> 
							</div>
					</div>
					<div class="box-body">
						<table id="tabla" class="table table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center">Id Fact</th>
									<th class="text-center">Id Cli</th>
									<th class="text-center">Id Usuario</th>
									<th class="text-center">F Factura</th>
									<th class="text-center">Vlr Factura</th>
									<th class="text-center">Dto Factura</th>
									<th class="text-center">Iva Factura</th>
									<th class="text-center">Neto Factura</th>
									<th class="text-center">Forma Pago</th>
									<th class="text-center">Online</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </section>

<script src="./Recursos/js/funcionesVenta.js"></script>
</div>