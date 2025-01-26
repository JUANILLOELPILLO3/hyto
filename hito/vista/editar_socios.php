<?php
require_once '../controladora/socioscontroller.php';
if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['id'])){
    $id_socio=$_POST['id_socio'];
    $nombre=$_POST['nombre'];
    $apeliidos=$_POST['apellidos'];
    $email=$_POST['email'];
    $plan=$_POST['plan'];
    $suscripcion=$_POST['suscripcion'];

    $controller=new socioscontroladora();
    $controller->actualizarsocio($id_socio,$nombre,$apellidos,$email,$edad,$plan,$suscripcion);
    header("location:lista_socios.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Socio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">editar socio</h1>
        <form method="POST" action="editar_socio.php" classs="mx-auto" style="max-width: 500px;">
            <input type="hidden" name="id_socio" value="<?=$socio['id_socio']?>">
            <div class="mb-3">
                <label for="nombre" class="for-label">nombre:</label>
                <input type="text"id="nombre"name="nombre" class="form-control"value="<?=$socio['nombre']?>"required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="for-label">apellido:</label>
                <input type="text"id="apellidos"name="apellidos" class="form-control"value="<?=$socio['apellidos']?>"required>
            </div>
            <div class="mb-3">
                <label for="email" class="for-label">email:</label>
                <input type="text"id="email"name="email" class="form-control"value="<?=$socio['email']?>"required>
            </div>
            <div class="mb-3">
                <label for="edad" class="for-label">edad:</label>
                <input type="text"id="edad"name="edad" class="form-control"value="<?=$socio['edad']?>"required>
            </div>
            <div class="mb-3">
                <label for="plan" class="for-label">plan:</label>
                <input type="text"id="plan"name="plan" class="form-control"value="<?=$socio['plan']?>"required>
            </div>
            <div class="mb-3">
                <label for="suscripcion" class="for-label">suscripcion:</label>
                <input type="text"id="suscripcion"name="suscripcion" class="form-control"value="<?=$socio['suscripcion']?>"required>
            </div>
            <button type="submit"class="btn btn-primary w-100">actualizar</button>
        </form>
        <div class="text-center mt-3">
            <a href="lista_socios.php"class="btn btn-secondary">cancelar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</head>
</html>


