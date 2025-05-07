<?php
// Conexión a la base de datos
require_once __DIR__ . "/Conexiones/Conexion.php";

// Obtener los datos del formulario
$sucursal = $_POST['sucursal'];
$fecha_realizado = $_POST['fecha_realizado'];
$usuario_pc = $_POST['usuario_pc'];
$host_name = $_POST['host_name'];
$remoto = $_POST['remoto'];
$mac = $_POST['mac'];
$ram = $_POST['ram'];
$disco_duro = $_POST['disco_duro'];
$procesador = $_POST['procesador'];
$extension = $_POST['extension'];
$link = $_POST['Link'];

// Consulta SQL para insertar los datos
$sql = "INSERT INTO equipos (ID, Sucursal, Fecha_Realizado, Usuario_de_PC, Host_Name, Remoto, MAC, RAM, Disco_Duro, Procesador, Extension,Link) 
        VALUES (NULL, '$sucursal', '$fecha_realizado', '$usuario_pc', '$host_name', '$remoto', '$mac', '$ram', '$disco_duro', '$procesador', '$extension','$link')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Agregado correctamente.");';
    echo 'window.location.href = "Home.php";</script>';
} else {
    echo "Error al agregar el equipo: " . $conn->error;
}

$conn->close();
?>
