<?php
    class Refugio{

        public $Id_Refugio;
        public $Nombre;
        public $Direccion;
        public $Telefono;
        public $Email;
        public $Sitio_web;

        public function __construct(
            $Id_Refugio
            $Nombre
            $Direccion
            $Telefono
            $Email
            $Sitio_web
        ){
            $this->Id_Refugio = $Id_Refugio;
            $this->Nombre = $Nombre;
            $this->Direccion = $Direccion;
            $this->Telefono = $Telefono;
            $this->Email = $Email;
            $this->Sitio_web = $Sitio_web;
        }
    }
?>