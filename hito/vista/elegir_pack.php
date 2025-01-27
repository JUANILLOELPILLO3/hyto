<?php
// Incluir el archivo donde está definida la clase con la función elegirpack
require_once '../config/conexion.php'; 
require_once '../controladora/sociosController.php';
// Cambia por la ruta real del archivo

// Verificar que los datos necesarios se hayan enviado
if (isset($_POST['id_socio'], $_POST['edad'], $_POST['plan'], $_POST['suscripcion'], $_POST['opcion'])) {
    $id_socio = intval($_POST['id_socio']);
    $edad = intval($_POST['edad']);
    $plan = $_POST['plan'];
    $suscripcion = $_POST['suscripcion'];
    $opcion = $_POST['opcion'];

    // Crear una instancia de la clase que contiene la función elegirpack
    $conexion = new Conexion(); // Cambia por la clase que gestiona tu conexión
    $socioManager = new socioscontroladora($conexion);

    try {
        // Llamar a la función elegirpack
        $socioManager->elegirpack($id_socio, $edad, $plan, $suscripcion);

        echo "<p>Proceso completado. Revisa los cambios en la base de datos.</p>";
        echo "<a href='llamar_funcion_elegirpack.html'>Volver</a>";
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
        echo "<a href='llamar_funcion_elegirpack.html'>Volver</a>";
    }
} else {
    echo "<p>Faltan datos en el formulario. Por favor, vuelve e intenta nuevamente.</p>";
    echo "<a href='llamar_funcion_elegirpack.html'>Volver</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegir Pack</title>
</head>
<body>
    <h1>Selecciona tu Pack</h1>
    <form action="procesar_pack.php" method="POST">
        <label for="id_socio">ID del Socio:</label>
        <input type="number" id="id_socio" name="id_socio" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>

        <label for="plan">Plan:</label>
        <select id="plan" name="plan" required>
            <option value="basico">Básico</option>
            <option value="premium">Premium</option>
        </select><br><br>

        <label for="suscripcion">Suscripción:</label>
        <select id="suscripcion" name="suscripcion" required>
            <option value="mensual">Mensual</option>
            <option value="anual">Anual</option>
        </select><br><br>

        <label for="opcion">Elige el pack:</label>
        <select id="opcion" name="opcion">
            <option value="deportes">Deportes</option>
            <option value="cine">Cine</option>
            <option value="infantil">Infantil</option>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>