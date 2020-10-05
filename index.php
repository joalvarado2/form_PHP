<?php

$errores = "";
$enviado = "";

if(isset($_POST["submit"])){
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $mensaje = $_POST["mensaje"];

    if(!empty($nombre)){
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    }else {
        $errores .= "por favor ingresa un nombre <br />";
    }

    if(!empty($correo)){
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errores .= "por favor ingresa un correo valido <br />";

        }
    }else{
            $errores .= "por favor ingresa un correo <br />" ;   
    }
    if(!empty($mensaje)){
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripslashes($mensaje);
    } else {
        $errores .= "por favor ingresa el mensaje <br />";
    }

    if(!$errores){
        $enviar_a = "jonathanalva92@gmail.com";
        $asunto = "Correo enviado desde Mipagina.com";
        $mensaje_preparado = "De: $nombre \n";
        $mensaje_preparado = "Correo: $correo \n";
        $mensaje_preparado = "Mensaje $mensaje \n";

        mail($enviar_a, $asunto, $mensaje_preparado);
        $enviado = "true";
    }
}

require "index_view.php"
?>