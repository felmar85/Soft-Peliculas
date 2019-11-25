<?php
require_once("modeloAbstractoDB.php");

class Empleado extends ModeloAbstractoDB
{
	private $id_empleado;
	private $id_local;
	private $nombre_empleado;
	private $apellido_empleado;
	private $cargo_empleado;
	private $id_pais;
	private $id_ciudad;
	private $direccion_empleado;
	private $telefono_empleado;
	private $email_empleado;
	private $nombre_local;

	function __construct()
	{
		//$this->db_name = '';
	}

	public function getId_empleado()
	{
		return $this->id_empleado;
	}
	public function getId_local()
	{
		return $this->id_local;
	}
	public function getNombre_empleado()
	{
		return $this->nombre_empleado;
	}

	public function getApellido_empleado()
	{
		return $this->apellido_empleado;
	}

	public function getCargo_empleado()
	{
		return $this->cargo_empleado;
	}

	public function getId_pais()
	{
		return $this->id_pais;
	}

	public function getId_ciudad()
	{
		return $this->id_ciudad;
	}

	public function getDireccion_empleado()
	{
		return $this->direccion_empleado;
	}

	public function getTelefono_empleado()
	{
		return $this->telefono_empleado;
	}

	public function getEmail_empleado()
	{
		return $this->email_empleado;
	}
	public function getNombre_local()
	{
		return $this->nombre_local;
	}
	public function consultar($id_empleado = '')
	{
		if ($id_empleado != '') :
			$this->query = "
                SELECT id_empleado, nombre_empleado, apellido_empleado, cargo_empleado, id_pais, id_ciudad,
                direccion_empleado, telefono_empleado, email_empleado
				FROM tb_empleados
				WHERE id_empleado = '$id_empleado'
				";
			$this->obtener_resultados_query();
		endif;
		if (count($this->rows) == 1) :
			foreach ($this->rows[0] as $propiedad => $valor) :
				$this->$propiedad = $valor;
			endforeach;
		endif;
	}

	public function listar()
	{
		$this->query = "
			SELECT id_empleado, nombre_empleado, apellido_empleado, cargo_empleado, p.nombre_pais, l.nombre_local,
			c.nombre_ciudad, direccion_empleado, telefono_empleado, email_empleado
			FROM tb_empleados as e
			inner join tb_paises as p ON (e.id_pais = p.id_pais) 
			inner join tb_ciudades as c ON (e.id_ciudad = c.id_ciudad)
			inner join tb_locales as l ON (e.id_local = l.id_local)
			ORDER BY nombre_empleado
			";
		$this->obtener_resultados_query();
		return $this->rows;
	}

	public function listarE()
	{
		$this->query = "
			SELECT id_empleado, nombre_empleado, apellido_empleado
            FROM tb_empleados
			";

		$this->obtener_resultados_query();
		return $this->rows;
	}
	public function listarL()
	{
		$this->query = "
			SELECT id_local, nombre_local
            FROM tb_locales
			";

		$this->obtener_resultados_query();
		return $this->rows;
	}
	public function listarP()
	{
		$this->query = "
			SELECT id_pais, nombre_pais
			FROM tb_paises
			ORDER BY nombre_pais
			";

		$this->obtener_resultados_query();
		return $this->rows;
	}

	public function listarC()
	{
		$this->query = "
			SELECT id_ciudad, nombre_ciudad
			FROM tb_ciudades
			ORDER BY nombre_ciudad
			";

		$this->obtener_resultados_query();
		return $this->rows;
	}

	public function nuevo($datos = array())
	{
		if (array_key_exists('id_empleado', $datos)) :
			foreach ($datos as $campo => $valor) :
				$$campo = $valor;
			endforeach;
			$id_empleado = utf8_decode($id_empleado);
			$nombre_empleado = utf8_decode($nombre_empleado);
			$apellido_empleado = utf8_decode($apellido_empleado);
			$cargo_empleado = utf8_decode($cargo_empleado);
			$id_pais = utf8_decode($id_pais);
			$id_ciudad = utf8_decode($id_ciudad);
			$direccion_empleado = utf8_decode($direccion_empleado);
			$telefono_empleado = utf8_decode($telefono_empleado);
			$email_empleado = utf8_decode($email_empleado);
			$id_local = utf8_decode($id_local);
			$this->query = "
					INSERT INTO tb_empleados
                    (id_empleado,nombre_empleado,apellido_empleado,cargo_empleado,id_pais,id_ciudad,direccion_empleado,telefono_empleado,email_empleado,id_local)
					VALUES
                    ('$id_empleado','$nombre_empleado','$apellido_empleado','$cargo_empleado','$id_pais','$id_ciudad','$direccion_empleado','$telefono_empleado','$email_empleado','$id_local')
					";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		endif;
	}

	public function editar($datos = array()) {
		foreach ($datos as $campo => $valor) :
			$$campo = $valor;
		endforeach;
		$this->query = "
			UPDATE tb_empleados
			SET nombre_empleado ='$nombre_empleado',
			apellido_empleado ='$apellido_empleado',
            cargo_empleado = '$cargo_empleado',
            id_pais = '$id_pais',
            id_ciudad = '$id_ciudad',
            direccion_empleado = '$direccion_empleado',
            telefono_empleado = '$telefono_empleado',
			email_empleado = '$email_empleado',
			id_local = '$id_local'
			WHERE id_empleado = '$id_empleado'
			";
		$resultado = $this->ejecutar_query_simple();
		return $resultado;
	}

	public function borrar($id_empleado = '')
	{
		$this->query = "
			DELETE FROM tb_empleados
			WHERE id_empleado = '$id_empleado'
			";
		$resultado = $this->ejecutar_query_simple();

		return $resultado;
	}

	function __destruct()
	{

	}
}
