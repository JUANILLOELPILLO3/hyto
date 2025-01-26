<?php
require_once '../controladora/SociosController.php';
$controller = new socioscontroladora();
$socios = $controller->listarSocios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Socios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <h1 class="text-center mb-4" style="color:rgb(61, 52, 64);">Socios Registrados</h1>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>plan</th>
                    <th>suscripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($socios as $socio): ?>
                    <tr>
                        <td><?= $socio['id_socio'] ?></td>
                        <td><?= $socio['nombre'] ?></td>
                        <td><?= $socio['apellidos'] ?></td>
                        <td><?= $socio['email'] ?></td>
                        <td><?= $socio['edad'] ?></td>
                        <td><?= $socio['plan'] ?></td>
                        <td><?= $socio['suscripcion'] ?></td>
                        <td>
                            <a href="editar_socio.php?id=<?= $socio['id_socio'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_socio.php?id=<?= $socio['id_socio'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="alta_socio.php" class="btn btn-success">Agregar un nuevo socio</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>