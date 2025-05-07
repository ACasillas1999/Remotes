<?php
include 'includes/conectar.php';

// Captura los datos del formulario
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];
$ubicacion = $_POST['ubicacion'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$responsable = $_POST['responsable'];

// Inserta en la base de datos
$sql = "INSERT INTO productos (codigo, nombre, categoria, cantidad, estado, ubicacion, fecha_ingreso, responsable)
        VALUES ('$codigo', '$nombre', '$categoria', '$cantidad', '$estado', '$ubicacion', '$fecha_ingreso', '$responsable')";

if ($conexion->query($sql) === TRUE) {
    echo "✅ Producto guardado correctamente.<br>";
    echo "<a href='index.php'>Ver listado</a> | <a href='agregar.php'>Agregar otro</a>";
} else {
    echo "❌ Error: " . $conexion->error;
}

$conexion->close();
?>
