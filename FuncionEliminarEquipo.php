<?php
// Conexión a la base de datos
require_once __DIR__ . "/Conexiones/Conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del equipo a eliminar
    $id_equipo = $_POST['id_equipo'];

    // Consulta SQL para eliminar el equipo
    $sql = "DELETE FROM equipos WHERE ID = $id_equipo";

    if ($conn->query($sql) === TRUE) {
        // Redirigir después de eliminar
        echo '<script>alert("Se ha eliminado el equipo correctamente.");</script>';
        header("location: Home.php");
        exit;
    } else {
        echo "Error al eliminar el equipo: " . $conn->error;
    }
} else {
    echo "No se ha recibido ningún dato para eliminar.";
}

$conn->close();
?>
