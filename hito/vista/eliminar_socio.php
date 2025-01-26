<?php
require_once '../controladora/socioscontroller.php';
if (isset($_GET['id'])){
    $id_socio=$_GET['id'];
    $controller=new socioscontroladora();
    $controller->eliminarSocio($id_socio);
    header("location:lista_socios.php");
    exit();
    
}