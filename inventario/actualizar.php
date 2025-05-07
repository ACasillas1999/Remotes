<?php
include 'includes/conectar.php';

// Captura los datos enviados por POST
$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];
$ubicacion = $_POST['ubicacion'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$responsable = $_POST['responsable'];

// Actualiza el producto
$sql = "UPDATE productos SET 
            codigo = '$codigo',
            nombre = '$nombre',
            categoria = '$categoria',
            cantidad = '$cantidad',
            estado = '$estado',
            ubicacion = '$ubicacion',
            fecha_ingreso = '$fecha_ingreso',
            responsable = '$responsable'
        WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
    echo "✅ Producto actualizado correctamente.<br>";
    echo "<a href='index.php'>Volver al listado</a>";
} else {
    echo "❌ Error al actualizar: " . $conexion->error;
}

$conexion->close();
?>
