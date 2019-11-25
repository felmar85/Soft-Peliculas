<?php
    require_once("modeloAbstractoDB.php");
	
    class Usuario extends ModeloAbstractoDB {
		private $id_usuario;
		private $nombre_usuario;
        private $clave_usuario;
        private $id_estado;
        private $id_rol;
        private $fechacreacion_usuario;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getId_usuario(){
			return $this->id_usuario;
		}

		public function getNombre_usuario(){
			return $this->nombre_usuario;
		}
		
		public function getClave_usuario(){
			return $this->clave_usuario;
        }
        
        public function getId_estado(){
			return $this->id_estado;
        }

        public function getId_rol(){
			return $this->id_rol;
        }

        public function getFechacreacion_usuario(){
			return $this->fechacreacion_usuario;
        }


		public function generarPassword($pass){

			$opciones = [
				'cost'=> 12,
			];
			$passwordHased = password_hash($pass, PASSWORD_BCRYPT, $opciones);

			return $passwordHased;
		}
		public function consultar($id_usuario='') {
			if($id_usuario !=''):
				$this->query = "
                SELECT id_usuario, nombre_usuario, clave_usuario, id_estado, id_rol, fechacreacion_usuario 
                FROM tb_usuarios 
                WHERE id_usuario = '$id_usuario'
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
            SELECT u.id_usuario, u.nombre_usuario, u.clave_usuario, e.nombre_estado , r.nombre_rol, 
            u.fechacreacion_usuario 
            FROM tb_usuarios u 
            INNER JOIN tb_estados e ON (u.id_estado = e.id_estado) 
            INNER JOIN tb_roles r ON (u.id_rol = r.id_rol);
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}

		public function listarE() {
			$this->query = "
			SELECT id_estado, nombre_estado
			FROM tb_estados
			ORDER BY nombre_estado
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}

		public function listarR() {
			$this->query = "
			SELECT id_rol, nombre_rol
			FROM tb_roles
			ORDER BY nombre_rol
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_usuario', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$encriptado=$this->generarPassword($clave_usuario);//encriptacion de la clave de usuario
				$id_usuario= utf8_decode($id_usuario);
				$nombre_usuario= utf8_decode($nombre_usuario);
				$clave_usuario= utf8_decode($clave_usuario);
				$id_estado= utf8_decode($id_estado);
				$id_rol= utf8_decode($id_rol);
				$fechacreacion_usuario= utf8_decode($fechacreacion_usuario);
				$this->query = "
				INSERT INTO tb_usuarios
				(id_usuario, nombre_usuario, clave_usuario, id_estado, id_rol, fechacreacion_usuario)
				VALUES
				(NULL, '$nombre_usuario', '$encriptado','$id_estado','$id_rol',NOW())
				";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$encriptado=$this->generarPassword($clave_usuario);//encriptacion de la clave de usuario
			$this->query = "
			UPDATE tb_usuarios
			SET nombre_usuario ='$nombre_usuario',
            clave_usuario ='$encriptado',
            id_estado ='$id_estado',
            id_rol ='$id_rol',
			fechacreacion_usuario = '$fechacreacion_usuario'
			WHERE id_usuario = '$id_usuario'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}

		public function editarconC($id_usuario='',$nombre_usuario='',$clave_usuario='',$id_estado='',
		$id_rol='',$fechacreacion_usuario='') {
			
			$this->query = "
			UPDATE tb_usuarios
			SET nombre_usuario ='$nombre_usuario',
            clave_usuario ='$clave_usuario',
            id_estado ='$id_estado',
            id_rol ='$id_rol',
			fechacreacion_usuario = '$fechacreacion_usuario'
			WHERE id_usuario = '$id_usuario'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_usuario='') {
			$this->query = "
			DELETE FROM tb_usuarios
			WHERE id_usuario = '$id_usuario'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function identificarM(){

			$this->query = "
			SELECT MAX(id_usuario) id_usuario
			FROM tb_usuarios
			";

			$this->obtener_resultados_query();

			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}

		public function generarContraseña($clave_usuario=''){
			$opciones = [
				'cost' => 12,
			];
			$resultado = password_hash($clave_usuario, PASSWORD_BCRYPT, $opciones);
		
			return $resultado;
		}

		function __destruct() {
			//unset($this);
		}
	}
?>