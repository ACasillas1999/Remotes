<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    
    
</body>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<img src="assets/img/logo ascencio.png" alt="Logo de la Empresa" class="logo">

    <h1>Agregar nuevo producto</h1>

    <!-- Contenedor para centrar el botón de "Volver al listado" -->
    <div class="boton-container">
        <a href="index.php">
            <button type="button" class="btn-volver">🔙 Volver al listado</button>
        </a>
    </div>

    <div class="formulario-container">
        <form action="guardar.php" method="POST" class="formulario">
            <label>Código:</label>
            <input type="text" name="codigo" required>

            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Categoría:</label>
            <input type="text" name="categoria">

            <label>Cantidad:</label>
            <input type="number" name="cantidad" min="0">

            <label>Estado:</label>
            <select name="estado">
                <option value="Nuevo">Nuevo</option>
                <option value="Usado">Usado</option>
                <option value="Dañado">Dañado</option>
            </select>

            <label>Ubicación:</label>
            <input type="text" name="ubicacion">

            <label>Fecha de ingreso:</label>
            <input type="date" name="fecha_ingreso">

            <label>Responsable:</label>
            <input type="text" name="responsable">

            <button type="submit" class="btn-guardar">💾 Guardar producto</button>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>

    