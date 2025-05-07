<?php
include 'includes/conectar.php';

// Verifica que se haya enviado el ID
if (!isset($_GET['id'])) {
    die("ID de producto no especificado.");
}

$id = $_GET['id'];

// Obtiene los datos del producto
$sql = "SELECT * FROM productos WHERE id = $id";
$resultado = $conexion->query($sql);

if ($resultado->num_rows === 0) {
    die("Producto no encontrado.");
}

$producto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<img src="assets/img/logo ascencio.png" alt="Logo de la Empresa" class="logo">

    <h1>Editar producto</h1>

<!-- Contenedor para centrar el botón de "Volver al listado" -->
<div class="boton-container">
        <a href="index.php">
            <button type="button" class="btn-volver">🔙 Volver al listado</button>
        </a>
    </div>

<div class="formulario-container"></div>
    <form action="actualizar.php" method="POST" class="formulario">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

        <label>Código:</label>
        <input type="text" name="codigo" value="<?php echo $producto['codigo']; ?>" required><br>

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br>

        <label>Categoría:</label>
        <input type="text" name="categoria" value="<?php echo $producto['categoria']; ?>"><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>"><br>

        <label>Estado:</label>
        <select name="estado">
            <option value="Nuevo" <?php if ($producto['estado'] == 'Nuevo') echo 'selected'; ?>>Nuevo</option>
            <option value="Usado" <?php if ($producto['estado'] == 'Usado') echo 'selected'; ?>>Usado</option>
            <option value="Dañado" <?php if ($producto['estado'] == 'Dañado') echo 'selected'; ?>>Dañado</option>
        </select><br>

        <label>Ubicación:</label>
        <input type="text" name="ubicacion" value="<?php echo $producto['ubicacion']; ?>"><br>

        <label>Fecha de ingreso:</label>
        <input type="date" name="fecha_ingreso" value="<?php echo $producto['fecha_ingreso']; ?>"><br>

        <label>Responsable:</label>
        <input type="text" name="responsable" value="<?php echo $producto['responsable']; ?>"><br>

        <button type="submit">Actualizar producto</button>
    </form>
    </div>    

    <br>
    <a href="index.php">Volver al listado</a>
</body>
</html>
