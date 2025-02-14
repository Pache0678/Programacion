<?php
session_start(); // Inicia o reanuda la sesión existente.
session_unset(); // Elimina todas las variables de sesión actuales.
session_destroy(); // Destruye la sesión actual, eliminando cualquier dato de sesión en el servidor.
setcookie("usuario", "", time() - 3600, "/"); // Establece la cookie del usuario con un tiempo de expiración en el pasado
header("Location: ../Login/login.php"); // Redirige al usuario a la página de inicio de sesión (login.php) después de cerrar la sesión.
exit(); // Finaliza el script
?>