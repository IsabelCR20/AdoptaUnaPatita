<?php
    require_once 'Conexion.php';
    require_once '../Modelo/Mascota.php';

    class MascotaDao{
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
            try{
                $this->conectar();
                $lista = array();

                $sentenciaSQL = "SELECT * FROM MASCOTAS;";
                $sentenciaSQL->execute();

                foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila){
                    $obj = new Mascota(
                        $fila->ID_MASCOTA,
                        $fila->NOMBRE,
                        $fila->RAZA,
                        $fila->COLOR,
                        $fila->SEXO,
                        $fila->EDAD,
                        $fila->PESO,
                        $fila->TAMANIO,
                        $fila->ESTERILIZADO,
                        $fila->DESCRIPCION,
                        $fila->HISTORIA,
                        $fila->IMGAGEN1,
                        $fila->IMGAGEN2,
                        $fila->IMGAGEN3,
                        $fila->ID_REFUGIO
                    );
                    $lista[] = $obj;
                }
                return $lista;
            }catch(Exception $e){
                echo $e->getMessage();
                return null;
            }finally{
                Conexion::cerrarConexion();
            }
        }
    }

    public function obtenerUno($id){
        try {
            $this->conectar();
            $registro = null;

            $sentenciaSQL = "SELECT * FROM MASCOTAS WHERE ID_MASCOTA = ?;";
            $sentenciaSQL->execute([$id]);

            $fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
            $registro = new Mascota(
                $fila->ID_MASCOTA,
                $fila->NOMBRE,
                $fila->RAZA,
                $fila->COLOR,
                $fila->SEXO,
                $fila->EDAD,
                $fila->PESO,
                $fila->TAMANIO,
                $fila->ESTERILIZADO,
                $fila->DESCRIPCION,
                $fila->HISTORIA,
                $fila->IMGAGEN1,
                $fila->IMGAGEN2,
                $fila->IMGAGEN3,
                $fila->ID_REFUGIO
            );
            return $registro;
        } catch(Exception $e){
            echo $e->getMessage();
            return null;
		}finally{
            Conexion::cerrarConexion();
        }
    }

    public function eliminar($id)
	{
		try 
		{
			$this->conectar();
            $sentenciaSQL = $this->conexion->prepare("DELETE FROM MASCOTAS WHERE ID_MASCOTA = ?;");			          
            $sentenciaSQL->execute(array($id));
            return true;
		} catch (Exception $e) 
		{
            return false;
		}finally{
            Conexion::cerrarConexion();
        }
    }
    
    public function agregar(Mascota $nuevo){
        try {
            $sql = "INSERT INTO MASCOTAS VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $this->conectar();
            $this->conexion->prepare($sql)->execute(array(
                $nuevo->Nombre,
                $nuevo->Raza,
                $nuevo->Color,
                $nuevo->Sexo,
                $nuevo->Edad,
                $nuevo->Peso,
                $nuevo->Tamanio,
                $nuevo->Esterilizado,
                $nuevo->Descripcion,
                $nuevo->Historia,
                $nuevo->Imagen1,
                $nuevo->Imagen2,
                $nuevo->Imagen3,
                $nuevo->Id_Refugio
            ));
            return true;
        } catch (Exception $e){
			echo $e->getMessage();
			return false;
		}finally{
            Conexion::cerrarConexion();
        }
    }
?>