<?php
 
require_once '../Modelo/modeloPelicula.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $pelicula = new Pelicula();
		$resultado = $pelicula->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $pelicula = new Pelicula();
		$resultado = $pelicula->nuevo($datos);
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
		$pelicula = new Pelicula();
		$resultado = $pelicula->borrar($datos['codigo']);
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
        $pelicula = new Pelicula();
        $pelicula->consultar($datos['codigo']);

        if($pelicula->getId_pelicula() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'id_pelicula' => $pelicula->getId_pelicula(),
                'nombre_pelicula' => $pelicula->getNombre_pelicula(),
                'descripcion_pelicula' => $pelicula->getDescripcion_pelicula(),
                'lenguaje' => $pelicula->getId_lenguaje(),
                'fecha_pelicula' => $pelicula->getFecha_pelicula(),
                'valor_pelicula' => $pelicula->getValor_pelicula(),
                'last_update' => $pelicula->getLast_update(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $pelicula = new Pelicula();
        $listado = $pelicula->listar();        
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;
        
}
?>