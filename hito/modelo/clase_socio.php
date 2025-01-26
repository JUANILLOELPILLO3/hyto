<?php
require_once '../config/conexion.php';

class socio {
    private $conexion;

    public function __construct(){
        $this->conexion = new Conexion();
    }

    public function agregarsocio($nombre,$apellidos,$email,$edad,$plan,$suscripcion){
        $query ="INSERT INTO socios(nombre,apellidos,email,edad,plan,suscripcion) VALUES (?,?,?,?,?,?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssssss",$nombre,$apellidos,$email,$edad,$plan,$suscripcion);
        
        if ($stmt->execute()){
            echo "socio agregado con exito. ";
        }else{
            echo " error al agregar socio: " .$stmt->error;
        }
        $stmt->close();
    }

    public function obtenersocios(){
        $query="SELECT * FROM socios";
        $salida=$this->conexion->conexion->query($query);
        $socios =[];
        while ($fila =$salida->fetch_assoc()){
            $socios[]=$fila;
        }
        return $socios;
    }
    public function obtenersocioporid($id_socio){
        $query = "SELECT * FROM socios WHERE id_socio = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_socio);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
    public function actualizarsocio($id_socio,$nombre,$apellidos,$email,$edad,$plan,$suscripcion){
        $query="UPDATE socios SET nombre = ?, apellidos =?,email=?,edad=?,plan=?,suscripcion=? WHERE id_socio=?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssssssi",$nombre,$apellidos,$email,$edad,$plan,$suscripcion,$id_socio);
        
        if ($stmt->execute()){
            echo "socio actualizado con exito.";
        }else{
            echo "error al actualizar socio: ". $stmt->error;
        }
        $stmt->close();
    }

    public function eliminarsocio($id_socio){
        $query="DELETE FROM socios WHERE id_socio=?";
        $stmt= $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i",$id_socio);
        if ($stmt->execute()) {
            echo "Socio eliminado con éxito.";
        } else {
            echo "Error al eliminar socio: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>