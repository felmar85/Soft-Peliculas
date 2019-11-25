<?php include_once("../../Funciones/sessiones.php"); ?>
<div id="seccion-roles">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true">Gestion de Roles</i>

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

                    <form class="form-horizontal" role="form" id="frol">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_rol"></label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id_rol" name="id_rol" value="" readonly="true" data-validation="length alphanumeric" data-validation-length="3-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre_rol">Descripción:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" placeholder="Ingrese la descripcion del rol" value="">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_rolxpermiso">Privilegios:</label>
                            <div class="col-sm-10">
                                <input type="checkbox" name="1" value="1" id="1P"> Ciudades<br>
                                <input type="checkbox" name="2" value="2" id="2P"> Clientes<br>
                                <input type="checkbox" name="3" value="3" id="3P"> Empleados<br>
                                <input type="checkbox" name="4" value="4" id="4P"> Lenguajes<br>
                                <input type="checkbox" name="5" value="5" id="5P"> Ventas<br>
                                <input type="checkbox" name="6" value="6" id="6P"> Farmacias<br>
                                <input type="checkbox" name="7" value="7" id="7P"> Inventario<br>
                                <input type="checkbox" name="8" value="8" id="8P"> Ofertas<br>
                                <input type="checkbox" name="9" value="9" id="9P"> Nomina<br>
                                <input type="checkbox" name="10" value="10" id="10P"> Paises<br>
                                <input type="checkbox" name="11" value="11" id="11P"> Peliculas<br>
                                <input type="checkbox" name="12" value="12" id="12P"> Categorias<br>
                                <input type="checkbox" name="13" value="13" id="13P"> Propietarios<br>
                                <input type="checkbox" name="14" value="14" id="14P"> Proveedores<br>
                                <input type="checkbox" name="15" value="15" id="15P"> Usuarios<br>
                                <input type="checkbox" name="16" value="16" id="16P"> Roles<br>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Rol" class="btn btn-primary">Actualizar</button>
                                <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
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