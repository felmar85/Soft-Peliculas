<?php
	require_once('modeloAbstractoDB.php');
	class Lenguaje extends ModeloAbstractoDB {
		public $id_lenguaje;
		public $nombre_lenguaje;
		public $last_update;
		
		function __construct() {
		}
		
		public function getId_lenguaje(){
			return $this->id_lenguaje;
		}

		public function getNombre_lenguaje(){
			return $this->nombre_lenguaje;
		}

		public function getLast_update(){
			return $this->last_update;
		}
		
		public function consultar($id_lenguaje='') {
			if($id_lenguaje != ''):
				$this->query = "
				SELECT id_lenguaje, nombre_lenguaje, last_update
				FROM tb_lenguaje
				WHERE id_lenguaje = '$id_lenguaje'
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
			SELECT id_lenguaje, nombre_lenguaje, last_update
			FROM tb_lenguaje ORDER BY nombre_lenguaje
			";
			$this->obtener_resultados_query();
			return $this->rows;
		}

		public function nuevo($datos=array()) {
			if(array_key_exists('id_lenguaje', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$id_lenguaje= utf8_decode($id_lenguaje);
				$nombre_lenguaje= utf8_decode($nombre_lenguaje);
				$this->query = "
				INSERT INTO tb_lenguaje
				(id_lenguaje, nombre_lenguaje, last_update)
				VALUES
				('$id_lenguaje', '$nombre_lenguaje', NOW())
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
			UPDATE tb_lenguaje
			SET nombre_lenguaje='$nombre_lenguaje'
			WHERE id_lenguaje = '$id_lenguaje'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_lenguaje='') {
			$this->query = "
			DELETE FROM tb_lenguaje
			WHERE id_lenguaje = '$id_lenguaje'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
		}
	}
?>