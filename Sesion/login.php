<?php
session_start();
require_once __DIR__ . "/../Conexiones/Conexion.php";

// Verificar si se han enviado los datos de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de usuario y la contraseña del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cifrar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar y ejecutar la consulta SQL utilizando una consulta preparada
    $sql = "SELECT id, password FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si se encontró un usuario con ese nombre de usuario
    if ($stmt->num_rows == 1) {
        // Vincular variables de resultado
        $stmt->bind_result($id, $stored_password);
        $stmt->fetch();

        // Verificar si la contraseña coincide
        if (password_verify($password, $stored_password)) {
            // Las credenciales son correctas, iniciar sesión
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            // Redirigir al usuario a Pedidos_GA.php
            header("location: ../Home.php");
            exit;
        } else {
            // Las credenciales son incorrectas, mostrar un mensaje de error
           header("location: Error.html");
            exit;
        }
    } else {
        // Las credenciales son incorrectas, redirigir a Error.html
        header("location: Error.html");
        exit;
    }

    // Cerrar la consulta preparada
    $stmt->close();
}
?>
