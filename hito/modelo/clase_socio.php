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
    public function elegirpack($id_socio,$edad,$plan,$suscripcion){
        if($edad<18){
            $query="UPDATE socios SET pack='infantil' WHERE id_socio=?";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("i",$id_socio);
            $stmt->execute();
            echo "Pack agregado correctamente: infantil";
            return;
        }
    
        $opciones = [];
        if($plan == 'basico' && $suscripcion == 'anual' && $edad > 18){
            $opciones = ['deportes', 'cine', 'infantil'];
        } elseif($plan == 'basico' && $suscripcion == 'mensual' && $edad > 18){
            $opciones = ['cine', 'infantil'];
        } elseif($plan == 'premium' && $suscripcion == 'anual' && $edad > 18){
            $opciones = ['deportes', 'cine', 'infantil'];
        } else {
            echo "No hay opciones disponibles para este usuario.";
            return;
        }
    
        echo "Estas son tus opciones: " . implode(", ", $opciones) . "\n";
    
        $seleccionados = [];
    
        while (true) {
            $opcion = $_POST['opcion'] ?? readline("Escribe el nombre del pack que deseas (o 'no' para salir): ");
            if (strtolower($opcion) === 'no') {
                echo "Proceso finalizado. Packs seleccionados: " . implode(", ", $seleccionados) . "\n";
                break;
            }
    
            if (in_array($opcion, $opciones) && !in_array($opcion, $seleccionados)) {
                $query = "UPDATE socios SET pack = ? WHERE id_socio = ?";
                $stmt = $this->conexion->conexion->prepare($query);
                $stmt->bind_param("si", $opcion, $id_socio);
                $stmt->execute();
                $seleccionados[] = $opcion;
                echo "Pack agregado correctamente: $opcion\n";
            } elseif (in_array($opcion, $seleccionados)) {
                echo "Este pack ya fue seleccionado.\n";
            } else {
                echo "Opción no válida. Intenta nuevamente.\n";
            }
    
            // Para entorno web, redefine $_POST['opcion'] para permitir múltiples iteraciones
            unset($_POST['opcion']);
        }
    }
}