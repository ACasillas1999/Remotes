<?php
// Iniciar la sesión
session_start();

// Verificar si se han enviado los datos de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (reemplaza los valores con los tuyos)
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "remotos";

    // Crear la conexión
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $Rol = $_POST["Rol"];

    // Verificar si las contraseñas coinciden
    if ($password != $confirm_password) {
        $error_message = "Las contraseñas no coinciden.";
    } else {
        // Cifrar la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Obtener la fecha actual
        

        // Insertar el usuario en la base de datos
        $sql = "INSERT INTO login (username, password, Rol) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hashed_password, $Rol);

        if ($stmt->execute()) {
            // Usuario registrado correctamente
            header("location: registro_exitoso.html"); // Redirigir a la página de registro exitoso
            exit;
        } else {
            $error_message = "Error al registrar el usuario.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>
