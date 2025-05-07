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
    <title>Consulta a Base de Datos</title>
    <!-- Enlace al archivo de estilos -->
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- Ícono de la página -->
    <link rel="icon" type="image/png" href="/Remotes/Img/R.png">
</head>
<body>

<!-- Barra lateral -->
<div class="sidebar">
    <h1>MENU</h1>
    <hr></hr>
    <ul>
        <li><a href="NuevoRegistroInicio.php">Agregar Equipo</a></li>
        <!--<li><a href="Toner.php">Toner</a></li>-->
     <!--   <li><a href="Toner.php">Toner</a></li>-->
     <li><a href="/Remotes/Registrar">Nuevo Usuario</a></li>  
     <li><a href="/Remotes/Inventario/Index.php">Inventario</a></li>  
     <!--   <div class="reg-button">
        <form action="/Remotes/Registrar" method="post">
            <input type="submit" value="Nuevo Usuario">
        </form>-->
   <hr></hr>
        
            <li class="logout-button">
            <form action="logout.php" method="post">
                <input type="submit" value="Cerrar sesión">
            </form>
        </li>
    </ul>
    
    </div>
    
  
    
</div>

    

<!-- Contenido principal -->
<div class="content">
    <!-- Contenido principal de tu página -->
</div>

<!-- Contenedor principal -->
<div class="container">
    <h2 class="titulo">
    <img src="/Remotes/Img/R.png" alt="icono-WP" class="icono-WP" style="max-width: 3%; height: auto;">     
    REMOTOS
       </h2>

    <!-- Formulario de consulta -->
    <form id="consultaForm" class="formulario">
        <label for="sucursal" class="label">Sucursal:</label>
        <select id="sucursal" name="sucursal">
            <option value="TODAS">TODAS</option>
            <option value="GABSA">GABSA</option>
            <option value="ILUMINACION">ILUMINACION</option>
            <option value="DIMEGSA">DIMEGSA</option>
            <option value="DEASA">DEASA</option>
            <option value="AIESA">AIESA</option>
            <option value="SEGSA">SEGSA</option>
            <option value="FESA">FESA</option>
            <option value="TAPATIA">TAPATIA</option>
            <option value="VALLARTA">VALLARTA</option>
            <option value="TALLER">TALLER</option>
            <option value="CEDIS">CEDIS</option>
            <option value="Bodega">Bodega</option>
        </select>
       <!-- <button type="submit" class="boton-consultar">Consultar</button>
--> </form>
    
    <p></p>

    <!-- Contenedor para mostrar resultados de la consulta -->
    <div id="resultado"></div>

</div>

<!-- Script de JavaScript -->

<script>
document.addEventListener("DOMContentLoaded", function() {
    const sucursalSelect = document.getElementById("sucursal");
    const resultadoDiv = document.getElementById("resultado");

    // Función para cargar la tabla automáticamente al cambiar la selección
    function cargarTabla() {
        var sucursal = sucursalSelect.value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "Consulta.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resultadoDiv.innerHTML = xhr.responseText;
            }
        };
        xhr.send("sucursal=" + encodeURIComponent(sucursal));
    }

    // Ejecutar la función inmediatamente al cargar la página
    cargarTabla();

    // Añadir evento para cuando cambie la selección
    sucursalSelect.addEventListener("change", cargarTabla);
});
</script>


</body>
</html>
