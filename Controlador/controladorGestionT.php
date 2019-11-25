<?php

require_once '../Modelo/modeloGestionT.php';
$datos = $_GET;
switch ($_GET['accion']) {
    case 'editar':
        $tienda = new Tienda();
        $resultado = $tienda->editar($datos);
        $respuesta = array(
            'respuesta' => $resultado
        );
        echo json_encode($respuesta);
        break;

    case 'nuevo':
        $tienda = new Tienda();
        $resultado = $tienda->nuevo($datos);
        if ($resultado > 0) {
            $respuesta = array(
                'respuesta' => $resultado
            );
        } else {
            $respuesta = array(
                'respuesta' => $resultado
            );
        }
        echo json_encode($respuesta);
        break;

    case 'borrar':
        $tienda = new Tienda();
        $resultado = $tienda->borrar($datos['codigo']);
        if ($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $tienda = new Tienda();
        $tienda->consultar($datos['codigo']);

        if ($tienda->getId_local() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        } else {
            $respuesta = array(
                'codigo' => $tienda->getId_local(),
                'nombre_local' => $tienda->getNombre_local(),
                'direccion_local' => $tienda->getDireccion_local(),
                'telefono_local' => $tienda->getTelefono_local(),
                'nombre_ciudad' => $tienda->getNombre_ciudad(),
                'nombre_pais' => $tienda->getNombre_pais(),
               /*  'nombre'=> $Tienda->getNombre_empleado(), */
                
                'respuesta' => 'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $Tienda = new Tienda();
        $listado = $Tienda->listar();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

        case 'listarP':
        $tienda = new Tienda();
        $listado = $tienda->listarP();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'listarC':
        $tienda = new Tienda();
        $listado = $tienda->listarC();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'listarE':
        $tienda = new Tienda();
        $listado = $tienda->listarE();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;
}