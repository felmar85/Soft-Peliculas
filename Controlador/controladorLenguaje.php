<?php
 
require_once '../Modelo/modeloLenguaje.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $lenguaje = new Lenguaje();
		$resultado = $lenguaje->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $lenguaje = new Lenguaje();
		$resultado = $lenguaje->nuevo($datos);
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
		$lenguaje = new Lenguaje();
		$resultado = $lenguaje->borrar($datos['codigo']);
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
        $lenguaje = new Lenguaje();
        $lenguaje->consultar($datos['codigo']);

        if($lenguaje->getId_lenguaje() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $lenguaje->getId_lenguaje(),
                'lenguaje' => $lenguaje->getNombre_lenguaje(),
                'last_update' => $lenguaje->getLast_update(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $lenguaje = new Lenguaje();
        $listado = $lenguaje->listar();        
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
}
?>