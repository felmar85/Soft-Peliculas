<?php
require_once('modeloAbstractoDB.php');
class Categoria extends ModeloAbstractoDB
{
	public $id_categoria;
	public $nombre_categoria;
	public $last_update;

	function __construct()
	{ }

	public function getId_categoria()
	{
		return $this->id_categoria;
	}

	public function getNombre_categoria()
	{
		return $this->nombre_categoria;
	}

	public function getLast_update()
	{
		return $this->last_update;
	}

	public function consultar($id_categoria = '')
	{
		if ($id_categoria != '') :
			$this->query = "
				SELECT id_categoria, nombre_categoria, last_update  
				FROM tb_categoria
				WHERE id_categoria = '$id_categoria'
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
			SELECT id_categoria, nombre_categoria
			FROM tb_categoria
			order by nombre_categoria
			";
		$this->obtener_resultados_query();
		return $this->rows;
	}

	public function nuevo($datos = array())
	{
		if (array_key_exists('id_categoria', $datos)) :
			foreach ($datos as $campo => $valor) :
				$$campo = $valor;
			endforeach;
			$id_categoria = utf8_decode($id_categoria);
			$nombre_categoria = utf8_decode($nombre_categoria);
			$last_update = utf8_decode($last_update);
			$this->query = "
				INSERT INTO tb_categoria
				(id_categoria, nombre_categoria, last_update)
				VALUES
				('$id_categoria', '$nombre_categoria', NOW())
				";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		endif;
	}

	public function editar($datos = array())
	{
		foreach ($datos as $campo => $valor) :
			$$campo = $valor;
		endforeach;
		$this->query = "
			UPDATE tb_categoria
			SET nombre_categoria='$nombre_categoria'
			WHERE id_categoria = '$id_categoria'
			";
		$resultado = $this->ejecutar_query_simple();
		return $resultado;
	}

	public function borrar($id_categoria = '')
	{
		$this->query = "
			DELETE FROM tb_categoria
			WHERE id_categoria = '$id_categoria'
			";
		$resultado = $this->ejecutar_query_simple();

		return $resultado;
	}

	function __destruct()
	{ }
}
