<?php
	require_once('modeloAbstractoDB.php');
	class Pelicula extends ModeloAbstractoDB {
		public $id_pelicula;
		public $nombre_pelicula;
		public $descripcion_pelicula;
		public $id_lenguaje;
		public $fecha_pelicula;
		public $valor_pelicula;
		public $last_update;
		
		function __construct() {
		}
		
		public function getId_pelicula(){
			return $this->id_pelicula;
		}

		public function getNombre_pelicula(){
			return $this->nombre_pelicula;
		}
		
		public function getDescripcion_pelicula(){
			return $this->descripcion_pelicula;
		}

		public function getId_lenguaje(){
			return $this->id_lenguaje;
		}

		public function getFecha_pelicula(){
			return $this->fecha_pelicula;
		}

		public function getValor_pelicula(){
			return $this->valor_pelicula;
		}

		public function getLast_update(){
			return $this->last_update;
		}

		public function consultar($id_pelicula='') {
			if($id_pelicula != ''):
				$this->query = "
				SELECT id_pelicula, nombre_pelicula, descripcion_pelicula, id_lenguaje, fecha_pelicula, valor_pelicula, last_update  
				FROM tb_pelicula
				WHERE id_pelicula = '$id_pelicula'
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
		public function listar() {
			$this->query = "
			SELECT id_pelicula, nombre_pelicula, descripcion_pelicula,
			l.nombre_lenguaje , fecha_pelicula, valor_pelicula
			FROM tb_pelicula as p
			INNER JOIN tb_lenguaje as l ON (p.id_lenguaje = l.id_lenguaje)
			order by nombre_pelicula
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_pelicula', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_pelicula= utf8_decode($id_pelicula);
                $nombre_pelicula= utf8_decode($nombre_pelicula); 
				$descripcion_pelicula= utf8_decode($descripcion_pelicula);
				$id_lenguaje= utf8_decode($id_lenguaje);
				$fecha_pelicula= utf8_decode($fecha_pelicula);
				$valor_pelicula= utf8_decode($valor_pelicula);
				$last_update= utf8_decode($last_update);
				$this->query = "
				INSERT INTO tb_pelicula
				(id_pelicula, nombre_pelicula, descripcion_pelicula, id_lenguaje, fecha_pelicula, valor_pelicula, last_update)
				VALUES
				('$id_pelicula', '$nombre_pelicula', '$descripcion_pelicula', '$id_lenguaje', '$fecha_pelicula', '$valor_pelicula', NOW())
				";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "
			UPDATE tb_pelicula
			SET nombre_pelicula='$nombre_pelicula',  
			descripcion_pelicula='$descripcion_pelicula',
			id_lenguaje='$id_lenguaje', 
			fecha_pelicula='$fecha_pelicula',
			valor_pelicula='$valor_pelicula'
			WHERE id_pelicula = '$id_pelicula'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_pelicula='') {
			$this->query = "
			DELETE FROM tb_pelicula
			WHERE id_pelicula = '$id_pelicula'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
		}
	}
?>