<?php
require_once '../modelo/clase_socio.php';

class socioscontroladora{
    private $modelo;

    public function __construct(){
        $this->modelo = new socio();
    }  
    public function agregarsocio($nombre,$apellidos,$email,$edad,$plan,$suscripcion){
        $this->modelo->agregarsocio($nombre,$apellidos,$email,$edad,$plan,$suscripcion);
    }

    public function listarsocios(){
        return $this->modelo->obtenersocios();
    }

    public function obtenerSocioPorId($id_socio) {
        return $this->modelo->obtenerSocioPorId($id_socio);
    }

    public function actualizarSocio($id_socio, $nombre, $apellidos, $email, $edad, $plan,$suscripcion) {
        $this->modelo->actualizarSocio($id_socio, $nombre, $apellidos, $email,$edad, $plan, $suscripcion);
    }

    public function eliminarSocio($id_socio) {
        $this->modelo->eliminarSocio($id_socio);
    }
}

