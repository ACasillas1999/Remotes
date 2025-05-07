<?php
include 'includes/conectar.php';

// Verifica que se haya pasado un ID por la URL
if (!isset($_GET['id'])) {
    die("ID de producto no especificado.");
}

$id = $_GET['id'];

// Ejecuta la eliminación
$sql = "DELETE FROM productos WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
    echo "🗑️ Producto eliminado correctamente.<br>";
    echo "<a href='index.php'>Volver al listado</a>";
} else {
    echo "❌ Error al eliminar: " . $conexion->error;
}

$conexion->close();
?>
