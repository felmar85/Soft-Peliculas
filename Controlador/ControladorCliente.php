<?php
 
require_once '../Modelo/modeloCliente.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $cliente = new Cliente();
		$resultado = $cliente->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $cliente = new Cliente();
		$resultado = $cliente->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;
    case 'borrar':
		$cliente = new Cliente();
		$resultado = $cliente->borrar($datos['codigo']);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $cliente = new Cliente();
        $cliente->consultar($datos['codigo']);

        if($cliente->getId_cliente() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $cliente->getId_cliente(),
                'nombre' => $cliente->getNombre_cliente(),
                'apellido' => $cliente->getApellido_cliente(),
                'direccion' => $cliente->getDireccion_cliente(),
                'telefono' => $cliente->getTelefono_cliente(),
                'pais' => $cliente->getId_pais(),
                'ciudad' => $cliente->getId_ciudad(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $cliente = new Cliente();
        $listado = $cliente->listar();        
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'listarP':
        $cliente = new Cliente();
        $listado = $cliente->listarP();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
    break;

    case 'listarC':
    $cliente = new Cliente();
    $listado = $cliente->listarC();
    echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
break;
}
?>