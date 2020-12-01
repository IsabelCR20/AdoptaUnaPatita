<?php
    class Mascota{
        public $Id_Mascota;
        public $Nombre;
        public $Raza;
        public $Color;
        public $Sexo;
        public $Edad;
        public $Peso;
        public $Tamanio;
        public $Esterilizado;
        public $Descripcion;
        public $Historia;
        public $Imagen1;
        public $Imagen2;
        public $Imagen3;
        public $Id_Refugio;
        
        public function __construct(){}
        public function __construct1(
            $Nombre,
            $Raza,
            $Color,
            $Sexo,
            $Edad,
            $Peso,
            $Tamanio,
            $Esterilizado,
            $Descripcion,
            $Historia,
            $Id_Refugio){
                $this->Nombre = $Nombre;
                $this->Raza = $Raza;
                $this->Color = $Color;
                $this->Sexo = $Sexo;
                $this->Edad = $Edad;
                $this->Peso = $Peso;
                $this->Tamanio = $Tamanio;
                $this->Esterilizado = $Esterilizado;
                $this->Descripcion = $Descripcion;
                $this->Historia = $Historia;
                $this->Id_Refugio = $Id_Refugio;
        }
        public function __construct2($Id_Mascota,
        $Nombre,
        $Raza,
        $Color,
        $Sexo,
        $Edad,
        $Peso,
        $Tamanio,
        $Esterilizado,
        $Descripcion,
        $Historia,
        $Imagen1,
        $Imagen2,
        $Imagen3,
        $Id_Refugio){
            $this->Id_Mascota = $Id_Mascota;
            $this->Nombre = $Nombre;
            $this->Raza = $Raza;
            $this->Color = $Color;
            $this->Sexo = $Sexo;
            $this->Edad = $Edad;
            $this->Peso = $Peso;
            $this->Tamanio = $Tamanio;
            $this->Esterilizado = $Esterilizado;
            $this->Descripcion = $Descripcion;
            $this->Historia = $Historia;
            $this->Imagen1 = $Imagen1;
            $this->Imagen2 = $Imagen2;
            $this->Imagen3 = $Imagen3;
            $this->Id_Refugio = $Id_Refugio;
        }
    }
?>