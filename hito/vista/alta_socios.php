<?php
require '.o./config/conexion.php';
require_once '../cntroladora/sociosController.php';

$conexion = new Conexion();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre=$_POST['nombre'];
    $apeliidos=$_POST['apellidos'];
    $email=$_POST['email'];
    $edad=$_POST['edad'];
    $plan=$_POST['plan'];
    $suscripcion=$_POST['suscripcion'];
    $datos="INSERT INTO socios (nombre,apellidos,email,edad,plan,suscripcion) Values('$nombre','$apeliidos,'$email','$edad','$plan','$suscripcion')";
    if($conexion->conexion->query($datos)==TRUE){
        echo"<div class='alert alert-success'>operacion completada.</div>";
        
    }
}