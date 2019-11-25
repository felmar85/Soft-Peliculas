<?php include_once ("../../Funciones/sessiones.php"); ?>

    <h1><b>Gestión de Lenguajes</b></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lenguaje</li>
        </ol>

    <div id="nuevo-editar" class="hide">
    </div>

    <section class="content">
        <div class="row">
            <div class="box">
                <div id="lenguaje">
                    <div class="box-header with-border">
                        <h3 class="box-title">Listado de Lenguajes</h3>
                        <div class="pull-right box-tools">
                            <button class="btn btn-info btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo Lenguaje">
                                <i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="tabla" class="table table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Codigo</th>
                                    <th class="text-center">Lenguaje</th>
                                    <th class="text-center">Fecha creacion</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
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

    <script src="./Recursos/js/funcionesLenguaje.js"></script>