<?php

    require_once 'Conexion.php';
    require_once '../Modelo/Refugio.php';

    class RefugioDao{
        private $conexion;

        private function conectar(){
            try{
                $this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
            }
            catch(Exception $e)
            {
                die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
            }
        }

        public function obtenerTodos(){
            try {
                $this->conectar();
                $registro = null;
                $lista = array();
    
                $sentenciaSQL = $this->conexion->prepare("SELECT * FROM REFUGIOS;");
                $sentenciaSQL->execute([$id]);
    
                $sentenciaSQL->execute();
    
                foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila){
                    $registro = new Refugio(
                        $fila->ID_REFUGIO,
                        $fila->NOMBRE,
                        $fila->DIRECCION,
                        $fila->TELEFONO,
                        $fila->EMAIL,
                        $fila->SITIO_WEB
                    );
                    $lista[] = $registro;
                }
               
                return $lista;
            } catch(Exception $e){
                echo $e->getMessage();
                return null;
            }finally{
                Conexion::cerrarConexion();
            }
        }

        public function obtenerUno($id){
            try {
                $this->conectar();
                $registro = null;
    
                $sentenciaSQL = $this->conexion->prepare("SELECT * FROM REFUGIOS WHERE ID_REFUGIO = ?;");
                $sentenciaSQL->execute([$id]);
    
                $fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
                $registro = new Refugio(
                    $fila->ID_REFUGIO,
                    $fila->NOMBRE,
                    $fila->DIRECCION,
                    $fila->TELEFONO,
                    $fila->EMAIL,
                    $fila->SITIO_WEB
                );
                return $registro;
            } catch(Exception $e){
                echo $e->getMessage();
                return null;
            }finally{
                Conexion::cerrarConexion();
            }
        }

    }
?>