<?php

// Iniciar la sesión de forma segura
ini_set('session.cookie_httponly', true); // Sólo permitir cookies de sesión vía HTTP
ini_set('session.cookie_secure', true); // Solo enviar cookies de sesión a través de conexiones HTTPS
session_start();

// Verificar si el usuario no está logeado
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // Si no está logeado, redirigir al formulario de inicio de sesión
    header("location: /Remotes/Sesion/login.html");
    exit;
}
include 'includes/conectar.php';

// Obtener todos los productos
$sql = "SELECT * FROM productos ORDER BY id DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<img src="assets/img/logo ascencio.png" alt="Logo de la Empresa" class="logo">
    <h1>Inventario de Sistemas</h1>

    

    <!-- Contenedor para centrar el botón -->
    <div class="botones-wrapper">
    <div class="boton-container">
        <a href="../Home.php">
            <button type="button" class="btn-agregar">Volver</button>
        </a>  
    </div>

    <div class="boton-container">
        <a href="agregar.php">
            <button type="button" class="btn-agregar">➕ Agregar nuevo producto</button>
        </a>
    </div>
</div>


    <br>

    <!-- Contenedor con fondo semitransparente -->
    <div class="contenedor-tabla">
        <table>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Ubicación</th>
                <th>Fecha Ingreso</th>
                <th>Responsable</th>
                <th>Acciones</th>
            </tr>

            <?php if ($resultado->num_rows > 0): ?>
                <?php while($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $fila['id']; ?></td>
                        <td><?php echo $fila['codigo']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['categoria']; ?></td>
                        <td><?php echo $fila['cantidad']; ?></td>
                        <td><?php echo $fila['estado']; ?></td>
                        <td><?php echo $fila['ubicacion']; ?></td>
                        <td><?php echo $fila['fecha_ingreso']; ?></td>
                        <td><?php echo $fila['responsable']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $fila['id']; ?>">✏️ Editar</a> |
                            <a href="eliminar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este producto?');">🗑️ Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="10">No hay productos en el inventario.</td></tr>
            <?php endif; ?>
        </table>
    </div>

    <?php $conexion->close(); ?>
    <?php include 'includes/footer.php'; ?>

</body>
</html>
