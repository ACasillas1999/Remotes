<?php
// Establecer la conexión a la base de datos
require_once __DIR__ . "/Conexiones/Conexion.php";

// Verificar si se ha enviado información de filtrado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sucursal = $_POST['sucursal'];
    $rdpgas = isset($_POST['rdpgas']) ? $_POST['rdpgas'] : false;
    $rdpgas2 = isset($_POST['rdpgas2']) ? $_POST['rdpgas2'] : false;
    $rdpgas3 = isset($_POST['rdpgas3']) ? $_POST['rdpgas3'] : false;
    $rdpgas4 = isset($_POST['rdpgas4']) ? $_POST['rdpgas4'] : false;
    $rdpgas6 = isset($_POST['rdpgas6']) ? $_POST['rdpgas6'] : false;

    // Construir la parte de la consulta SQL para los checkboxes seleccionados
    $rdpgasConditions = [];
    if ($rdpgas) $rdpgasConditions[] = "Remoto='rdpgas'";
    if ($rdpgas2) $rdpgasConditions[] = "Remoto='rdpgas2'";
    if ($rdpgas3) $rdpgasConditions[] = "Remoto='rdpgas3'";
    if ($rdpgas4) $rdpgasConditions[] = "Remoto='rdpgas4'";
    if ($rdpgas6) $rdpgasConditions[] = "Remoto='rdpgas6'";
    $rdpgasCondition = count($rdpgasConditions) > 0 ? "AND (" . implode(" OR ", $rdpgasConditions) . ")" : "";

    // Construir la consulta SQL con el filtrado por sucursal y checkboxes
    $sucursalCondition = ($sucursal != 'TODAS') ? "WHERE Sucursal='$sucursal'" : "";

    $sql = "SELECT * FROM Equipos $sucursalCondition $rdpgasCondition ORDER BY Fecha_Realizado DESC";
    $result = $conn->query($sql);

    // Verificar si la consulta fue exitosa
    if ($result === false) {
        echo "Error en la consulta: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            // Mostrar los datos encontrados en forma de tabla
            echo "<table class='mi-tabla' border='1'>";
            echo "<tr><th>ID</th><th>Sucursal</th><th>Fecha Realizado</th><th>Usuario de PC</th><th>Host Name</th><th>Remoto</th><th>MAC</th><th>RAM</th><th>Disco Duro</th><th>Procesador</th><th>Extension</th><th>Link</th><th>Accion</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Sucursal"] . "</td>";
                echo "<td>" . $row["Fecha_Realizado"] . "</td>";
                echo "<td>" . $row["Usuario_de_PC"] . "</td>";
                echo "<td>" . $row["Host_Name"] . "</td>";
                echo "<td>" . $row["Remoto"] . "</td>";
                echo "<td>" . $row["MAC"] . "</td>";
                echo "<td>" . $row["RAM"] . "</td>";
                echo "<td>" . $row["Disco_Duro"] . "</td>";
                echo "<td>" . $row["Procesador"] . "</td>";
                echo "<td>" . $row["Extension"] . "</td>";
                echo "<td><a href='" . $row["Link"] . "'><img src='/Remotes/img/RemotoImg.png' alt='Enlace' style='width: 50px; height: 50px;'></a></td>"; // Cambiar 'ruta/a/tu/imagen.jpg' por la ruta de tu imagen
                echo "<td><a href='ActualizarEquipo.php?id=" . $row["ID"] . "'>Modificar</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }
} else {
    echo "Por favor, seleccione una sucursal.";
}

$conn->close();
?>
