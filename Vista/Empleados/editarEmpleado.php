<?php include_once("../../Funciones/sessiones.php"); ?>
<div id="seccion-empleado">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true">Gestion de Empleados</i>

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

                    <form class="form-horizontal" role="form" id="fempleado">

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_empleado">Identificación:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_empleado" name="id_empleado" placeholder="Ingrese la identificación" value="" readonly="true" data-validation="length alphanumeric" data-validation-length="3-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre_empleado">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" placeholder="Ingrese el nombre del empleado" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="apellido_empleado">Apellido:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="apellido_empleado" name="apellido_empleado" placeholder="Ingrese el apellido del empleado" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cargo_empleado">Cargo:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cargo_empleado" name="cargo_empleado" placeholder="Ingrese el cargo del empleado" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_pais">Pais:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="id_pais" name="id_pais">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_ciudad">Ciudad:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="id_ciudad" name="id_ciudad">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="direccion_empleado">Dirección:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="direccion_empleado" name="direccion_empleado" placeholder="Ingrese el cargo del empleado" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="telefono_empleado">Telefono:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefono_empleado" name="telefono_empleado" placeholder="Ingrese el cargo del empleado" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email_empleado">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email_empleado" name="email_empleado" placeholder="Ingrese el cargo del empleado" value="">
                            </div>
                        </div>


                        <div class="form-group">
                        <label class="control-label col-sm-2" for="id_local">Local:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_local" name="id_local">
                            <option value="" selected>Seleccione ...</option>
								<?php foreach($listaLocales as $fila){ ?>
								<option value="<?php echo trim($fila['id_local']); ?>" >
								<?php echo utf8_encode(trim($fila['nombre_local'])); ?> </option>

								<?php } ?>
							</select>	
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Empleado"
                                    class="btn btn-primary">Actualizar</button>
                                <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición"
                                    class="btn btn-success btncerrar2"> Cancelar </button>
                            </div>

                        </div>

                        <input type="hidden" id="editar" value="editar" name="accion" />
                        </fieldset>

                    </form>
                </div>
                <input type="hidden" id="pagina" value="editar" name="editar" />
            </div>
        </div>
    </div>
</div>