<?php include_once("../../Funciones/sessiones.php"); ?>
<!-- quick email widget -->
<div id="seccion-pelicula">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true">Gestión de Peliculas</i>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">

        <div align="center">
            <div id="actual">
            </div>
        </div>


        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" id="fpelicula">


                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_pelicula">Codigo:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " id="id_pelicula" name="id_pelicula" placeholder="Automatico" value="" readonly="true" data-validation="length alphanumeric" data-validation-length="3-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre_pelicula">Nombre pelicula:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_pelicula" name="nombre_pelicula" placeholder="Ingrese nombre del pelicula" data-validation="length alphanumeric" data-validation-length="3-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="descripcion_pelicula">descripcion:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="descripcion_pelicula" name="descripcion_pelicula" placeholder="Ingrese descripcion" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_lenguaje">lenguaje:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="id_lenguaje" name="id_lenguaje">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fecha_pelicula">fecha de pelicula:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="fecha_pelicula" name="fecha_pelicula" placeholder="Ingrese fecha" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="valor_pelicula">valor pelicula:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="valor_pelicula" name="valor_pelicula" placeholder="Ingrese valor" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="last_update"></label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="last_update" name="last_update" placeholder="Ingrese valor" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar pelicula">Grabar pelicula</button>
                                <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                            </div>
                        </div>

                        <input type="hidden" id="nuevo" value="nuevo" name="accion" />
                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>