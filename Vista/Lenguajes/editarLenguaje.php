<?php include_once ("../../Funciones/sessiones.php"); ?>
<div id="seccion-lenguaje">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true">Gestion de lenguaje</i>

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

                    <form class="form-horizontal" role="form" id="flenguaje">


                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_lenguaje">Codigo:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_lenguaje" name="id_lenguaje"
                                    placeholder="Ingrese Codigo" value="" readonly="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre_lenguaje">Lenguaje:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_lenguaje" name="nombre_lenguaje"
                                    placeholder="Ingrese Nombre del lenguaje" value="">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for="last_update"></label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="last_update" name="last_update"
                                    placeholder="fecha de creacion" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar lenguaje"
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