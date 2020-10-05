<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario contacto</title>
    <link rel="stylesheet" type="text/css" href="css/syles.css">
</head>
<body>
    <div class="wrap">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre:" value="<?php if(!$enviado && isset($nombre)) echo $nombre ?>">
        <input type="email" class="form-control" id="correo" name="correo" placeholder="correo:" value="<?php if(!$enviado && isset($correo)) echo $correo ?>">
   
        <textarea name="mensaje" id="mensaje" placeholder="mensaje:" class="form-control"><?php if(!$enviado && isset($mensaje)) echo $mensaje ?></textarea>

        <?php if(!empty($errores)):?>
            <div class="alert error">
                <?php echo $errores;?>
            </div>
        <?php elseif ($enviado):?>
            <div class="alert success">
                <p>Se ha enviado correctamente</p>
            </div>
        <?php endif?>

        <input type="submit" name="submit" class="btn btn-primay" value="enviar">
    </form>
    </div>
</body>
</html>