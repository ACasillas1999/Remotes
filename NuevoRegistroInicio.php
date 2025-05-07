<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles3.css">
<link rel="icon" type="image/png" href="/Remotes/Img/R.png">
    <title>Nuevo Equipo</title>
</head>
<body>
    
<header class="header">
    <div class="logo">Agregar Nuevo Equipo</div>
    <nav class="navbar">
        <ul>
            <li class="nav-item"><a href='Home.php' class="nav-link">Volver</a></li>
        </ul>
    </nav>
</header>
 
<p></p>
    
<form action="NuevoRegistro.php" method="POST">
    
    <label for="sucursal">Sucursal:</label><br>
    <select id="sucursal" name="sucursal" required>
        <option value="">Selecciona una sucursal</option>
        <option value="DIMEGSA">DIMEGSA</option>
        <option value="DEASA">DEASA</option>
        <option value="AIESA">AIESA</option>
        <option value="SEGSA">SEGSA</option>
        <option value="FESA">FESA</option>
        <option value="TAPATIA">TAPATIA</option>
        <option value="GABSA">GABSA</option>
        <option value="ILUMINACION">ILUMINACION</option>
        <option value="VALLARTA">VALLARTA</option>
    </select><br><br>

    <label for="fecha_realizado">Fecha Realizado:</label>
    <input type="date" id="fecha_realizado" name="fecha_realizado" required><br><br>

    <label for="usuario_pc">Usuario de PC:</label>
    <input type="text" id="usuario_pc" name="usuario_pc" required><br><br>

    <label for="host_name">Host Name:</label>
    <input type="text" id="host_name" name="host_name" required><br><br>

    <label for="remoto">Remoto:</label>
    <select id="remoto" name="remoto" required>
        <option value="">Selecciona una opción</option>
        <option value="rdpgas">rdpgas</option>
        <option value="rdpgas2">rdpgas2</option>
        <option value="rdpgas3">rdpgas3</option>
        <option value="rdpgas4">rdpgas4</option>
        <option value="rdpgas6">rdpgas6</option>
    </select><br><br>

    <label for="mac">MAC:</label>
    <input type="text" id="mac" name="mac" required><br><br>

    <label for="ram">RAM:</label>
    <input type="text" id="ram" name="ram" required><br><br>

    <label for="disco_duro">Disco Duro:</label>
    <input type="text" id="disco_duro" name="disco_duro" required><br><br>

    <label for="procesador">Procesador:</label>
    <input type="text" id="procesador" name="procesador" required><br><br>

    <label for="extension">Extension:</label>
    <input type="text" id="extension" name="extension" required><br><br>
    
    <label for="extension">Link:</label>
    <input type="text" id="Link" name="Link" required><br><br>

    <input type="submit" value="Agregar Pedido">
</form>

</body>
</html>
