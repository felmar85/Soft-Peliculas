<?php
require_once('modeloAbstractoDB.php');
class Categoriaxpelicula extends ModeloAbstractoDB
{
	public $id_pelicula;
	public $id_categoria;
	public $last_update;

	function __construct()
	{ }

	public function getId_pelicula()
	{
		return $this->id_pelicula;
	}

	public function getId_categoria()
	{
		return $this->id_categoria;
	}

	public function getLast_update()
	{
		return $this->last_update;
	}

	public function consultar($id_pelicula = '')
	{
		if ($id_pelicula != '') :
			$this->query = "
				SELECT id_pelicula, id_categoria, last_update  
				FROM tb_categoriaxpelicula
				WHERE id_pelicula = '$id_pelicula'
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
			SELECT u.id_pelicula, p.nombre_pelicula, c.nombre_categoria
			FROM tb_categoriaxpelicula as a
			INNER JOIN tb_pelicula as u ON (a.id_pelicula = u.id_pelicula)
			INNER JOIN tb_pelicula as p ON (a.id_pelicula = p.id_pelicula)
			INNER JOIN tb_categoria as c ON (a.id_categoria = c.id_categoria)
			order by nombre_pelicula
			";
		$this->obtener_resultados_query();
		return $this->rows;
	}

	public function nuevo($datos = array())
	{
	/* 	if (array_key_exists('id_pelicula', $datos)) : */
			foreach ($datos as $campo => $valor) :
				$$campo = $valor;
			endforeach;
			$id_pelicula = utf8_decode($id_pelicula);
			$id_categoria = utf8_decode($id_categoria);
			$last_update = utf8_decode($last_update);
			$this->query = "
				INSERT INTO tb_categoriaxpelicula
				(id_pelicula, id_categoria, last_update)
				VALUES
				('$id_pelicula', '$id_categoria', NOW())
				";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
/* 		endif; */
	}

	public function editar($datos = array())
	{
		foreach ($datos as $campo => $valor) :
			$$campo = $valor;
		endforeach;
		$this->query = "
			UPDATE tb_categoriaxpelicula
			SET id_pelicula='$id_pelicula',
			id_categoria='$id_categoria'
			WHERE id_pelicula = '$id_pelicula'
			";
		$resultado = $this->ejecutar_query_simple();
		return $resultado;
	}

	public function borrar($id_pelicula = '')
	{
		$this->query = "
			DELETE FROM tb_categoriaxpelicula
			WHERE id_pelicula = '$id_pelicula'
			";
		$resultado = $this->ejecutar_query_simple();

		return $resultado;
	}

	function __destruct()
	{ }
}
