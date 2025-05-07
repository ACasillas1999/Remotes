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
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
<link rel="icon" type="image/png" href="/Remotes/Img/R.png">
     
    
</head>
<body>
   
    <header class="header">
        <div class="logo">Registro de usuario</div>
        <nav class="navbar">
            <ul>
                <li class="nav-item"><a href='../Home.php' class="nav-link">Volver</a></li>
              </ul>
        </nav>
    </header>

<div class="container">
    <h2>Registro de Usuario</h2>
    <form action="registrar_usuario.php" method="post">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required>
        
         <label for="Rol">Rol:</label>
         <select id="Rol" name="Rol" required>
        <option value="">Selecciona Rol</option>
             <option value="Admin">Sistemas</option>
              
            </select><br><br>
        
    
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        
       
        
        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        
      
        
        <input type="submit" value="Registrar">
        
        <!-- Aquí se mostrarán los mensajes de error -->
        <div class="error-message">
            <?php if (isset($error_message)) echo $error_message; ?>
        </div>
    </form>
</div>

</body>
</html>
