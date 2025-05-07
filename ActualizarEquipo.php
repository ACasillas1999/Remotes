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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles3.css">
<link rel="icon" type="image/png" href="/Remotes/Img/R.png">
    <title>Formulario de Equipos</title>
</head>
<body>
    <header class="header">
        <div class="logo">Actualizar Equipo</div>
        <nav class="navbar">
            <ul>
                <li class="nav-item"><a href='Home.php' class="nav-link">Volver</a></li>
            </ul>
        </nav>
    </header>
    
    <p></p>
    <?php
    // Conexión a la base de datos
    require_once __DIR__ . "/Conexiones/Conexion.php";

    // Obtener el ID del equipo a actualizar
    $id_equipo = $_GET['id'];

    // Consulta SQL para obtener los datos del equipo
    $sql = "SELECT * FROM equipos WHERE ID = $id_equipo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar el formulario con los datos del equipo para su actualización
        $row = $result->fetch_assoc();
        ?>
        <form action="FuncionActualizarEquipo.php" method="POST">
            <input type="hidden" name="id_equipo" value="<?php echo $id_equipo; ?>">
            
            <label for="sucursal">Sucursal:</label><br>
            <input type="text" id="sucursal" name="sucursal" value="<?php echo $row['Sucursal']; ?>" required><br><br>
            
            <label for="fecha_realizado">Fecha Realizado:</label><br>
            <input type="date" id="fecha_realizado" name="fecha_realizado" value="<?php echo $row['Fecha_Realizado']; ?>" required><br><br>
            
            <label for="usuario_de_pc">Usuario de PC:</label><br>
            <input type="text" id="usuario_de_pc" name="usuario_de_pc" value="<?php echo $row['Usuario_de_PC']; ?>" required><br><br>
            
            <label for="host_name">Host Name:</label><br>
            <input type="text" id="host_name" name="host_name" value="<?php echo $row['Host_Name']; ?>" required><br><br>
            
            <label for="remoto">Remoto:</label><br>
            <input type="text" id="remoto" name="remoto" value="<?php echo $row['Remoto']; ?>" required><br><br>
            
            <label for="mac">MAC:</label><br>
            <input type="text" id="mac" name="mac" value="<?php echo $row['MAC']; ?>" required><br><br>
            
            <label for="ram">RAM:</label><br>
            <input type="text" id="ram" name="ram" value="<?php echo $row['RAM']; ?>" required><br><br>
            
            <label for="disco_duro">Disco Duro:</label><br>
            <input type="text" id="disco_duro" name="disco_duro" value="<?php echo $row['Disco_Duro']; ?>" required><br><br>
            
            <label for="procesador">Procesador:</label><br>
            <input type="text" id="procesador" name="procesador" value="<?php echo $row['Procesador']; ?>" required><br><br>
            
            <label for="extension">Extensión:</label><br>
            <input type="text" id="extension" name="extension" value="<?php echo $row['Extension']; ?>"><br><br>
            
            <label for="extension">Link:</label><br>
            <input type="text" id="Link" name="Link" value="<?php echo $row['Link']; ?>" required><br><br>
            

            <input type="submit" value="Actualizar Equipo">
        </form>

        <!-- Formulario para eliminar el registro -->
        <form action="FuncionEliminarEquipo.php" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este registro? Esta acción no se puede deshacer.');">
            <input type="hidden" name="id_equipo" value="<?php echo $id_equipo; ?>">
            <input type="submit" value="Eliminar Registro" style="background-color: #ff0000; color: white;">
        </form>

        <?php
    } else {
        echo "No se encontró el equipo.";
    }

    $conn->close();
    ?>
</body>
</html>
