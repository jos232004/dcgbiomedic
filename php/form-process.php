<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG .= "El nombre es requerido. ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "El correo es requerido. ";
} else {
    $email = $_POST["email"];
}

// PHONE
if (empty($_POST["number"])) {
    $errorMSG .= "El celular es requerido. ";
} else {
    $number = $_POST["number"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "El mensaje es requerido. ";
} else {
    $message = $_POST["message"];
}

// Configuración del correo
$EmailTo = "henryjosebecerraiman530@gmail.com"; // Cambia aquí al correo oficial de la empresa
$Subject = "Nuevo mensaje desde el formulario de contacto";

// Cuerpo del mensaje
$Body = "";
$Body .= "Nombre: " . $name . "\n";
$Body .= "Correo: " . $email . "\n";
$Body .= "Celular: " . $number . "\n";
$Body .= "Mensaje: " . $message . "\n";

// Enviar correo
$success = mail($EmailTo, $Subject, $Body, "From:" . $email);

// Respuesta
if ($success && $errorMSG == "") {
    echo "success";
} else {
    if ($errorMSG == "") {
        echo "Algo salió mal :(";
    } else {
        echo $errorMSG;
    }
}
