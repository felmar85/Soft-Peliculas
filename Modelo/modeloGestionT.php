<?php
    require_once("modeloAbstractoDB.php");
    class Tienda extends ModeloAbstractoDB {
        private $id_empleado;
        private $id_local;
        private $nombre_ciudad;
        private $pais;
        private $nombre_pais;
        private $direccion_local;
        private $telefono_local;
        private $nombre_local;

        public function __construct()
        {
        }
	/**
         * Get the value of pais
         */ 
        public function getPais()
        {
                return $this->pais;
        }
        /**
         * Get the value of id_empleado
         */ 
        public function getId_empleado()
        {
                return $this->id_empleado;
        }

      
        /**
         * Get the value of id_local
         */ 
        public function getId_local()
        {
                return $this->id_local;
        }

        /**
         * Get the value of nombre_ciudad
         */ 
        public function getNombre_ciudad()
        {
                return $this->nombre_ciudad;
        }

         /**
         * Get the value of direccion_local
         */ 
        public function getDireccion_local()
        {
                return $this->direccion_local;
        }
      
         /**
         * Get the value of telefono_local
         */ 
        public function getTelefono_local()
        {
                return $this->telefono_local;
        }
 
            /**
         * Get the value of nombre_local
         */ 
        public function getNombre_local()
        {
                return $this->nombre_local;
        }
        
        /**
         * Get the value of nombre_pais
         */ 
        public function getNombre_pais()
        {
                return $this->nombre_pais;
        }
            ////////////////////// FIN GETERS//////////////////////////////   

            public function consultar($id_local='') {
                if($id_local !=''):
                    $this->query = "
                    SELECT id_local, nombre_local,telefono_local, direccion_local, nombre_ciudad, nombre_pais 
                  
                    FROM tb_locales AS L
                    
                    INNER JOIN tb_ciudades as C ON (L.id_ciudad = C.id_ciudad)
                    INNER JOIN tb_paises as P ON (L.id_pais = P.id_pais)
                    WHERE id_local = '$id_local'               
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
                SELECT L.id_local, L.nombre_local,L.direccion_local,L.telefono_local, C.nombre_ciudad, P.nombre_pais
                FROM tb_locales AS L
                INNER JOIN tb_ciudades as C ON (L.id_ciudad = C.id_ciudad)
                INNER JOIN tb_paises as P ON (L.id_pais = P.id_pais)
                    ORDER BY id_local              
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
            public function listarE()
            {
                $this->query = "
                    SELECT id_empleado,concat_ws(' ',  nombre_empleado, apellido_empleado) AS nombre_empleado
                    FROM tb_empleados
                    ";
        
                $this->obtener_resultados_query();
                return $this->rows;
            }
            public function nuevo($datos=array()) {
                if(array_key_exists('id_local', $datos)):
                    foreach ($datos as $campo=>$valor):
                        $$campo = $valor;
                    endforeach;
                    $nombre_local = utf8_decode($nombre_local);
                    $direccion_local = utf8_decode($direccion_local);
                    $telefono_local = utf8_decode($telefono_local);
                    $id_pais = utf8_decode($id_pais);
                    $id_ciudad = utf8_decode($id_ciudad);
                    $this->query = "
                    INSERT INTO `tb_locales` (`id_local`, `nombre_local`, `direccion_local`, `telefono_local`, `id_pais`, `id_ciudad`) 
                    VALUES ('$id_local', '$nombre_local', '$direccion_local', '$telefono_local', '$id_pais', '$id_ciudad')";
                        $resultado = $this->ejecutar_query_simple();
                        return $resultado;
                endif;
                
            }
            
        	public function editar($datos = array()) {
                foreach ($datos as $campo => $valor) :
                    $$campo = $valor;
                endforeach;
                $this->query = "
                    UPDATE tb_locales
                    SET id_local ='$id_local',
                    nombre_local ='$nombre_local',
                    direccion_local = '$direccion_local',
                    telefono_local = '$telefono_local',
                    id_ciudad = '$id_ciudad',
                    id_pais = '$id_pais'
                    WHERE id_local = '$id_local'
                    ";
                $resultado = $this->ejecutar_query_simple();
                return $resultado;
            }
            
            public function borrar($id_local='') {
                $this->query = "
                DELETE FROM tb_locales
                WHERE id_local = '$id_local'
                ";
                $resultado = $this->ejecutar_query_simple();
    
                return $resultado;
            }



            public function __destruct() {
                //unset($this);
            } 
    }

    ?>