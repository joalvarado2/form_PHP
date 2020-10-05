<?php

$errores = "";
$enviado = "";

if(isset($_POST["submit"])){                           // isset valor boleano en este caso valida true para proceder con la validación
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $mensaje = $_POST["mensaje"];

    if(!empty($nombre)){                                         // si el campo nombre no esta vacio  
        $nombre = trim($nombre);                                 // le quitamos espacios
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);   // le quitamos todo tipo de caracteres *-/+etc
    }else {
        $errores .= "por favor ingresa un nombre <br />";
    }

    if(!empty($correo)){
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);     // 

        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){          // validamos que sea un correo valido
            $errores .= "por favor ingresa un correo valido <br />";

        }
    }else{
            $errores .= "por favor ingresa un correo <br />" ;   
    }
    if(!empty($mensaje)){
        $mensaje = htmlspecialchars($mensaje);          // le quitamos la posibilidad de inyectar código a l cliente
        $mensaje = trim($mensaje);                      // quitamos espacios
        $mensaje = stripslashes($mensaje);              // quitamos slashes    
    } else {
        $errores .= "por favor ingresa el mensaje <br />";
    }

    if(!$errores){      // si no hay errores hacer
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