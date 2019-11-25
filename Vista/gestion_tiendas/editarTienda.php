<?php include_once ("../../Funciones/sessiones.php"); ?>
<!-- quick email widget -->
<div id="seccion-tienda">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true">Gestión de Tienda</i>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i
                    class="fa fa-times"></i></button>
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

                    <form class="form-horizontal" role="form" id="ftienda">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_local">codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_local" name="id_local" 
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_local">Nombre Tienda:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_local" name="nombre_local" placeholder="Ingrese el Nombre de la Tienda"
                            value = "">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="direccion_local">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion_local" name="direccion_local" placeholder="Ingrese la direccion del local"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="telefono_local">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono_local" name="telefono_local" placeholder="Ingrese el telefono del local"
                            value = "">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_pais">Pais:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_pais" name="id_pais">
                            <option value="" selected>Seleccione ...</option>
								<?php foreach($listaPais as $fila){ ?>
								<option value="<?php echo trim($fila['id_pais']); ?>" >
								<?php echo utf8_encode(trim($fila['nombre_pais'])); ?> </option>

								<?php } ?>
							</select>	
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_ciudad">Ciudad:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_ciudad" name="id_ciudad">
                            <option value="" selected>Seleccione ...</option>
								<?php foreach($listaPais as $fila){ ?>
								<option value="<?php echo trim($fila['id_ciudad']); ?>" >
								<?php echo utf8_encode(trim($fila['nombre_ciudad'])); ?> </option>

								<?php } ?>
							</select>	
                        </div>
                    </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" id="actualizar" class="btn btn-primary" data-toggle="tooltip"
                                        title="Actualizar tienda">Actualizar</button>
                                    <button type="button" id="cerrar" class="btn btn-success btncerrar2"
                                        data-toggle="tooltip" title="Cancelar">Cancelar</button>
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