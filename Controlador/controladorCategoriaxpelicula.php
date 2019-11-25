<?php
require_once '../Modelo/modeloCategoriaxpelicula.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $categoriaxpelicula = new Categoriaxpelicula();
		$resultado = $categoriaxpelicula->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $categoriaxpelicula = new Categoriaxpelicula();
        $resultado = $categoriaxpelicula->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => $resultado
            );
        }  else {
            $respuesta = array(
                'respuesta' => $resultado
            );
        }
        echo json_encode($respuesta);
        break;
       
    case 'borrar':
		$categoriaxpelicula = new Categoriaxpelicula();
		$resultado = $categoriaxpelicula->borrar($datos['codigo']);
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
            $categoriaxpelicula = new Categoriaxpelicula();
            $categoriaxpelicula->consultar($datos['codigo']);
        
            if($categoriaxpelicula->getId_pelicula() == null) {
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            }  else {
                $respuesta = array(
                    'id_pelicula' => $categoriaxpelicula->getId_pelicula(),
                    'id_categoria' => $categoriaxpelicula->getId_categoria(),
                    'last_update' => $categoriaxpelicula->getLast_update(),
                    'respuesta' =>'existe'
                );
            }
            echo json_encode($respuesta);
            break;
    
        case 'listar':
            $categoriaxpelicula = new Categoriaxpelicula();
            $listado = $categoriaxpelicula->listar();        
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
            break;
            
    }
    ?>
