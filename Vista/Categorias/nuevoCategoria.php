<?php include_once ("../../Funciones/sessiones.php"); ?>
<!-- quick email widget -->
<div id="seccion-categoria">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true">Gestión de Categorias</i>
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

                    <form class="form-horizontal" role="form" id="fcategoria" name="fcategoria" method="post">


                    <div class="form-group">
                            <label class="control-label col-sm-2" for="id_categoria">Codigo:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " id="id_categoria" name="id_categoria" placeholder="Automatico" value="" readonly="true" data-validation="length alphanumeric" data-validation-length="3-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre_categoria">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria"
                                    placeholder="Ingrese Nombre de categoria" value="" required>
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
                                <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip"
                                    title="Grabar categoria">Grabar categoria</button>
                                <button type="button" id="cerrar" class="btn btn-success btncerrar2"
                                    data-toggle="tooltip" title="Cancelar">Cancelar</button>
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