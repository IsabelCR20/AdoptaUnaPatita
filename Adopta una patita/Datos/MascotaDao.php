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

                $sentenciaSQL = $this->conexion->prepare("SELECT * FROM MASCOTAS;");
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
                        $fila->IMAGEN1,
                        $fila->IMAGEN2,
                        $fila->IMAGEN3,
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

        public function obtenerFiltro($refugio, $tamanio, $sexo, $edad){
            try{
                $this->conectar();
                $lista = array();

                $sentenciaSQL = $this->conexion->prepare("SELECT * FROM MASCOTAS WHERE 
                                                ID_REFUGIO like ? and
                                                TAMANIO like ? and
                                                SEXO like ? and
                                                EDAD like ?;");
                $sentenciaSQL->execute(array($refugio, $tamanio, $sexo, $edad));
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
                        $fila->IMAGEN1,
                        $fila->IMAGEN2,
                        $fila->IMAGEN3,
                        $fila->ID_REFUGIO
                    );
                    $lista[] = $obj;
                }
                return $lista;
            } catch (Exception $ex){
                echo 'Error al ver filtro: '.$ex->getMessage();
                return null;   
            } finally{
                Conexion::cerrarConexion();
            }
        }

        public function obtenerUno($id){
            try {
                $this->conectar();
                $registro = null;

                $sentenciaSQL = $this->conexion->prepare("SELECT * FROM MASCOTAS WHERE ID_MASCOTA = ?;");
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
                    $fila->IMAGEN1,
                    $fila->IMAGEN2,
                    $fila->IMAGEN3,
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

        public function eliminar($id){
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
        
        public function agregar(Mascota $nuevo, $archivos){
            try {
                $this->conectar();
                $this->conexion->beginTransaction();
                $sql = "INSERT INTO MASCOTAS VALUES(NULL,?,?,?,?,?,?,?,?,?,?,NULL,NULL,NULL,?);";
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
                    $nuevo->Id_Refugio
                ));
                $clave = $this->conexion->lastInsertId();

                $dir_subida = "database/";
                if($archivos['imagen']['size'][0] > 0){
                    $ext = pathinfo($archivos['imagen']['name'][0], PATHINFO_EXTENSION);
                    move_uploaded_file($archivos['imagen']['tmp_name'][0], $dir_subida.$clave."-1.".$ext);
                    $update1 = "UPDATE MASCOTAS SET IMAGEN1 = ? WHERE ID_MASCOTA = ?";
                    $this->conexion->prepare($update1)->execute(array(
                        $dir_subida.$clave."-1.".$ext,
                        $clave  // ISABEL: quité un ; que estaba aquí
                    ));
                }
                if($archivos['imagen']['size'][1] > 0){
                    $ext = pathinfo($archivos['imagen']['name'][1], PATHINFO_EXTENSION);
                    move_uploaded_file($archivos['imagen']['tmp_name'][1], $dir_subida.$clave."-2.".$ext);
                    $update1 = "UPDATE MASCOTAS SET IMAGEN2 = ? WHERE ID_MASCOTA = ?";
                    $this->conexion->prepare($update1)->execute(array(
                        $dir_subida.$clave."-2.".$ext,
                        $clave   // ISABEL: quité un ; que estaba aquí
                    ));
                }
                if($archivos['imagen']['size'][2] > 0){
                    $ext = pathinfo($archivos['imagen']['name'][2], PATHINFO_EXTENSION);
                    move_uploaded_file($archivos['imagen']['tmp_name'][2], $dir_subida.$clave."-3.".$ext);
                    $update1 = "UPDATE MASCOTAS SET IMAGEN3 = ? WHERE ID_MASCOTA = ?";
                    $this->conexion->prepare($update1)->execute(array(
                        $dir_subida.$clave."-1.".$ext,
                        $clave      // ISABEL: quité un ; que estaba aquí
                    ));
                }
                $this->conexion->commit();
            } catch (Exception $e){
                echo $e->getMessage();
                $this->conexion->rollBack();
                return false;
            }finally{
                Conexion::cerrarConexion();
            }
        }
    }
?>