<?php
 
require_once '../Modelo/modeloCategoria.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $categoria = new Categoria();
		$resultado = $categoria->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $categoria = new Categoria();
		$resultado = $categoria->nuevo($datos);
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
		$categoria = new Categoria();
		$resultado = $categoria->borrar($datos['codigo']);
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
        $categoria = new Categoria();
        $categoria->consultar($datos['codigo']);

        if($categoria->getId_categoria() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'id_categoria' => $categoria->getId_categoria(),
                'nombre_categoria' => $categoria->getNombre_categoria(),
                'last_update' => $categoria->getLast_update(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $categoria = new Categoria();
        $listado = $categoria->listar();        
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
        
}
?>