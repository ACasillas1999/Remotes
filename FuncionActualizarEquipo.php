<?php
// Conexión a la base de datos
require_once __DIR__ . "/Conexiones/Conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_equipo = $_POST['id_equipo'];
    $sucursal = $_POST['sucursal'];
    $fecha_realizado = $_POST['fecha_realizado'];
    $usuario_de_pc = $_POST['usuario_de_pc'];
    $host_name = $_POST['host_name'];
    $remoto = $_POST['remoto'];
    $mac = $_POST['mac'];
    $ram = $_POST['ram'];
    $disco_duro = $_POST['disco_duro'];
    $procesador = $_POST['procesador'];
    $extension = $_POST['extension'];
    $link = $_POST['Link'];

    // Consulta SQL para actualizar los datos del equipo
    $sql = "UPDATE equipos SET 
            Sucursal = '$sucursal', 
            Fecha_Realizado = '$fecha_realizado', 
            Usuario_de_PC = '$usuario_de_pc', 
            Host_Name = '$host_name', 
            Remoto = '$remoto', 
            MAC = '$mac', 
            RAM = '$ram', 
            Disco_Duro = '$disco_duro', 
            Procesador = '$procesador', 
            Extension = '$extension', 
            Link = '$link' 
            WHERE ID = $id_equipo";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Equipo actualizado correctamente.");</script>';
        echo '<script>window.location.href = "Home.php";</script>';
    } else {
        echo "Error al actualizar el equipo: " . $conn->error;
    }
} else {
    echo "No se ha recibido ningún dato para actualizar.";
}

$conn->close();
?>
