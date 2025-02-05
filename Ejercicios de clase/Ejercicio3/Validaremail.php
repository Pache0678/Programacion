<?php
function validarEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Válido";
    } else {
        $error_message = "Error: Dirección de correo inválida - $email";
        file_put_contents("errores.log", date("Y-m-d H:i:s") . " - " . $error_message . "\n", FILE_APPEND);
        return "Error registrado en errores.log";
    }
}

echo "Ingrese una dirección de correo electrónico: ";
$email = trim(fgets(STDIN));

echo validarEmail($email) . PHP_EOL;
?>
