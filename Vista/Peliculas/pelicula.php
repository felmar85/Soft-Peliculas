<?php include_once("../../Funciones/sessiones.php"); ?>

<h1><b>Gestión de Peliculas</b></h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Peliculas</li>
</ol>

<div id="nuevo-editar" class="hide">
</div>


<section class="content">
	<div class="row">
		<div class="box">
			<div id="pelicula">
				<div class="box-header with-border">
					<h3 class="box-title">Listado de Peliculas</h3>
					<div class="pull-right box-tools">
						<button class="btn btn-info btn-sm" id="nuevo" data-toggle="tooltip" title="Nueva Pelicula">
							<i class="fa fa-plus" aria-hidden="true"></i></button>
					</div>
				</div>
				<div class="box-body">
					<table id="tabla" class="table table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="text-center">Codigo</th>
								<th class="text-center">Nombre Pelicula</th>
								<th class="text-center">Descripcion</th>
								<th class="text-center">Lenguaje</th>
								<th class="text-center">fecha pelicula</th>
								<th class="text-center">valor pelicula</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="./Recursos/js/funcionesPelicula.js"></script>