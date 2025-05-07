<?php
// Datos de conexión a la base de datos
$host = "localhost";
$usuario = "root";
$clave = ""; // Deja en blanco si no tienes contraseña en XAMPP
$base_de_datos = "remotos";

// Crear conexión
$conexion = new mysqli($host, $usuario, $clave, $base_de_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
