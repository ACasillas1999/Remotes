<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Toner por Sucursal</title>
    <style>
        /* Aquí pega los estilos CSS */
        /* Estilos para la tabla de inventario por sucursal */
        .mi-tabla-inventario {
            margin: 20px auto;
            width: 80%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        .mi-tabla-inventario th, .mi-tabla-inventario td {
            border: 1px solid #dddddd; /* Borde gris claro */
            padding: 12px;
            text-align: left; /* Alineación de texto a la izquierda */
        }

        .mi-tabla-inventario th {
            background-color: #1a237e; /* Azul oscuro */
            color: #ffffff; /* Texto blanco */
        }

        .mi-tabla-inventario tr:nth-child(even) {
            background-color: #f2f2f2; /* Fondo gris claro para filas pares */
        }

        .mi-tabla-inventario tr:hover {
            background-color: #dddddd; /* Fondo gris más oscuro al pasar el ratón */
        }

        .titulo-tabla {
            color: #1a237e; /* Azul oscuro */
            font-size: 24px; /* Tamaño de fuente grande */
            font-weight: bold; /* Texto en negrita */
            text-align: center;
            margin-bottom: 20px; /* Espacio entre el título y el contenido */
        }
    </style>
     <link rel="stylesheet" href="styles3.css">
    
    <header class="header">
    <div class="logo">Toner</div>
    <nav class="navbar">
        <ul>
            <li class="nav-item"><a href='Home.php' class="nav-link">Volver</a></li>
        </ul>
    </nav>
</header>
</head>
<body>

<?php
// Aquí va tu código PHP
require_once __DIR__ . "/Conexiones/Conexion.php";

// Consulta para obtener los datos por sucursal
$sql = "SELECT sucursal, tipo_toner, cantidad FROM inventario_toner ORDER BY sucursal";

// Ejecutar consulta
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    $sucursal_actual = '';
    while($row = $result->fetch_assoc()) {
        // Verificar si la sucursal ha cambiado
        if ($row['sucursal'] !== $sucursal_actual) {
            // Si la sucursal ha cambiado, cerrar la tabla anterior (si hay alguna) y abrir una nueva
            if ($sucursal_actual !== '') {
                echo '</table><br>';
            }
            echo '<h2 class="titulo-tabla">' . $row['sucursal'] . '</h2>';
            echo '<table class="mi-tabla-inventario">';
            echo '<tr><th>Tipo de Toner</th><th>Cantidad</th></tr>';
            // Actualizar la sucursal actual
            $sucursal_actual = $row['sucursal'];
        }
        // Imprimir cada fila de la tabla
        echo '<tr>';
        echo '<td>' . $row['tipo_toner'] . '</td>';
        echo '<td>' . $row['cantidad'] . '</td>';
        echo '</tr>';
    }
    // Cerrar la última tabla
    echo '</table>';
} else {
    echo "No hay resultados";
}
// Cerrar la conexión
$conn->close();
?>

</body>
</html>
