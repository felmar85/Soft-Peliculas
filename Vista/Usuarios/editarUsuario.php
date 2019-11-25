<?php include_once("../../Funciones/sessiones.php"); ?>
<div id="seccion-usuario">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true">Gestion de usuarios</i>
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

                    <form class="form-horizontal" role="form" id="fusuario">

                        <div class="form-group">
                            <label class="control-label col-sm-1" for="id_usuario">Codigo:</label>
                            <div class="input-group col-sm-10">
                                <input type="text" class="form-control " id="id_usuario" name="id_usuario" placeholder="Automatico" value="" readonly="true" data-validation="length alphanumeric" data-validation-length="3-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1" for="nombre_usuario">usuario:</label>
                            <div class="input-group col-sm-10">
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Ingrese usuario" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1" for="clave_usuario">Clave:</label>
                            <div class="input-group col-sm-10">
                                <input type="password" class="form-control" id="clave_usuario" name="clave_usuario" placeholder="Ingrese Clave" value="">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1" for="id_estado">Estado:</label>
                            <div class="input-group col-sm-10">
                                <select class="form-control" id="id_estado" name="id_estado">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1" for="id_rol">Rol:</label>
                            <div class="input-group col-sm-10">
                                <select class="form-control" id="id_rol" name="id_rol">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1" for="fechacreacion_usuario">fecha creacion:</label>
                            <div class="input-group col-sm-10">
                            <input type="date" class="form-control " id="fechacreacion_usuario" name="fechacreacion_usuario"  value="" readonly="true" data-validation="length alphanumeric" >
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