<?php
require_once 'Clases.php';

$lista = [];
$error = "";

try {
    // Creamos los objetos pedidos
    $lista[] = new Admin("Dr. José Aguilar", "jaguilar@uabc.edu.mx");
    $lista[] = new Alumno("Ana López", "ana.lopez@alumno.com", "1278456");

    // Este es el que va a fallar para probar el catch
    $pruebaFallo = new Alumno("Juan Pérez", "correo-mal", "001122");

} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Examen Unidad 1</title>
    <style>
        table { width: 70%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        .mensaje { color: red; font-weight: bold; border: 1px solid red; padding: 10px; width: fit-content; }
    </style>
</head>
<body>

    <h2>Lista de Usuarios</h2>

    <?php if ($error): ?>
        <p class="mensaje">Atención: <?php echo $error; ?></p>
    <?php endif; ?>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Matrícula</th>
        </tr>
        <?php foreach ($lista as $u): ?>
            <tr>
                <td><?php echo $u->getNombre(); ?></td>
                <td><?php echo $u->getCorreo(); ?></td>
                <td><?php echo $u->getRol(); ?></td>
                <td>
                    <?php 
                        // Verificamos si tiene el método getMatricula
                        echo (method_exists($u, 'getMatricula')) ? $u->getMatricula() : '---'; 
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>

