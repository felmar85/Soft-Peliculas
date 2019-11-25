<?php include_once ("../../Funciones/sessiones.php"); ?>
<div id="seccion-cliente">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true">Gestion de Clientes</i>

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

                <form class="form-horizontal" role="form"  id="fcliente">
                     
                <div class="form-group">
                        <label class="control-label col-sm-2" for="id_cliente">Identificación:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="Ingrese la identificación"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_cliente">Nombres:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Ingrese los nombres del cliente"
                            value = "">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="apellido_cliente">Apellidos:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellido_cliente" name="apellido_cliente" placeholder="Ingrese los apellidos del cliente"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="direccion_cliente">Dirección:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" placeholder="Ingrese la dirección del cliente"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="telefono_cliente">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" placeholder="Ingrese el telefono del cliente"
                            value = "">
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
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Cliente"
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